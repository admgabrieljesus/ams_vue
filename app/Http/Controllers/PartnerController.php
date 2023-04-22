<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Responsible;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerCheck;
use App\Mail\PartnerAdd;
use App\Models\Speciality;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{

    public function menu() {
        return Inertia::render('Partner/Menu');
    }

    public function add($type) {
        return Inertia::render('Partner/Add', ['type' => $type]);
    }

    public function include(Request $request){
    
        try {
            DB::beginTransaction();
            
            $validated = $request->validate([
                'name' => 'required|min:10',
                'zipcode' => 'required|min:8|max:8',
                'state' => 'required',
                'city' => 'required',
                'district' => 'required',
                'address' => 'required',
                'ddd' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ]);

            if ( $request->type == 'doctors') {
                $validated = $request->validate(['cpf' => 'nullable|required|min:14|max:14']);
                $request->fantasy = '';
            }
            else {
                $validated = $request->validate(['cnpj' => 'nullable|required|min:18|max:18']);
                $validated = $request->validate(['cpf_responsible' => 'nullable|required|min:14|max:14']);
            }

            if ($request->document_pagamento != null )      $validated =  $request->validate(['document_pagamento' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_credenciamento != null ) $validated =  $request->validate(['document_credenciamento' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_registro != null )       $validated =  $request->validate(['document_registro' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_certificado != null )    $validated =  $request->validate(['document_certificado' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_contrato != null )       $validated =  $request->validate(['document_contrato' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_identidade != null )     $validated =  $request->validate(['document_identidade' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_cpf != null )            $validated =  $request->validate(['document_cpf' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_alvara != null )         $validated =  $request->validate(['document_alvara' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
            if ($request->document_autorizacao != null )    $validated =  $request->validate(['document_autorizacao' => 'required|mimes:png,jpg,jpeg,pdf|max:51200']);
          
            if ( $request->type == 'doctors') {
                $partner = Partner::create([
                    "name" => $request->name,
                    "cpf" => $request->cpf,
                    "type_document" => $request->type_document,
                    "number_document" => $request->number_document,
                    "type" => strtoupper($request->type),
                    "website" => $request->website,
                    "comment" => $request->comment, 
                ]);
            } else {
                $partner = Partner::create([
                    "name" => $request->name,
                    "fantasy" => $request->fantasy,
                    "cnpj" => $request->cnpj,
                    "type" => strtoupper($request->type),
                    "website" => $request->website,
                    "comment" => $request->comment, 
                ]);
                $responsible = Responsible::create([
                    "partner_id" => $partner->id, 
                    "name" => $request->name_responsible,
                    "cpf" => $request->cpf_responsible,
                    "type_document" => $request->type_document,
                    "number_document" => $request->number_document,
                ]);
            }
        
            AddressController::addNew($request, $partner->id, Partner::class);
            PhoneController::addNew($request, $partner->id, Partner::class);
            EmailController::addNew($request, $partner->id, Partner::class);

            $file = new FileController();
            $file->addDocuments($request, $partner->id, 'partners');
        
            $partner->email = $request->email;
            Mail::bcc('bahia@aepet.org.br')->to($partner->email)->send(new PartnerAdd($partner));

            $message = 'Solicitação de Cadastro de ' . $partner->name . ' adicionada com sucesso.';
            
            DB::commit();

            return Inertia::render('Partner/Confirm');
            
        
        } catch (\Exception $exception) {
            
            DB::rollBack();
            
            dd($exception);
            //dd($exception->getMessage());

            return redirect()->back()->withErrors($exception->getMessage());

            //return redirect()->back()->withErrors($exception->message);

            //return Inertia::render('Error', [ 'error' => $exception->errorInfo ] );
            //return Inertia::renderException($request, $exception);
        }
        
    }

    public function contract($type) {
        $contract = 'documents.contracts.' . $type;
        return view($contract);
    }
        
    public function index() {
        $partners = Partner::all();
        return Inertia::render('Partner/Index',[
            'partners' => $partners
        ]);
    }

    public function detail($id)
    {
        $partner = Partner::find($id);
        $emails = $partner->emails ;
        $phones = $partner->phones ;
        $addresses = $partner->addresses ;
        $responsible = $partner->responsible ;
        $specialities = $partner->specialities ;
        $specialities_all = Speciality::all(); 
        $doctors = $partner->doctors ;
        $user = $partner->user;

        $files = Storage::disk('public')->allFiles('documents/partners/' . $id);
        return Inertia::render('Partner/Detail',[
            'partner' => $partner,
            'emails' => $emails,
            'phones' => $phones,
            'addresses' => $addresses,
            'responsible' => $responsible,
            'specialities' => $specialities,
            'specialities_all' => $specialities_all,
            'doctors' => $doctors,
            'user' => $user,
            'files' => $files,
        ]);
    }

    public function findUser($id)
    {
        $partner = Partner::find($id);
        $user = $partner->user;
        return $user;    
    }
  
    public function show($id)
    {
         $partner = Partner::find($id);
         return $partner;
        // $files = Storage::files('documents/partners/' . $id);
        // return view('partners.show', compact('partner', 'files'));
    }

    public function addUser(Request $request) {
        $partner = Partner::find($request->id);
        $email = $partner->emails[0]['email'];
        $document = $partner->cnpj;
        
        if ($partner->cpf <> null ) $document = $partner->cpf;

        $user = User::create([
            "name" => $partner->name, 
            "userable_id" => $partner->id,
            "userable_type" => Partner::class,
            "email" => $email, 
            "document" => $document,
            "password" => Hash::make('AMS.2022'),
            "role_id" => 7,
        ]);
       
        Mail::bcc('bahia@aepet.org.br')->to($email)->send(new PartnerCheck($partner));
        
        return view('partners.addUser', compact('user'));
    }

    public function check(Request $request) {
        $partner = Partner::find($request->id);
        $email = $partner->emails[0]['email'];
        $number_document = $partner->cpf != '' ?  $partner->cpf  : $partner->cnpj; 
        $partner->active = $request->active;
        $partner->save();

        if ( $request->comments <> '' )
            IncidentController::addNew($request, $partner->id, Partner::class);

        $file = new FileController();
        $file->addDocuments($request, $partner->id, 'partners');

       // Mail::bcc('bahia@aepet.org.br')->to($email)->send(new PartnerCheck($partner));
        $message = 'Validação de Cadastro do(a) Conveniado(a) ' . $partner->name . ' realizada com sucesso.';

        $partners = Partner::all();

        return Inertia::render('Partner/Index',[
            'partners' => $partners
        ]);

        //return Redirect::route('partners.list')->with('success', $message);
    }

    public function contracts() {
        $user = User::find(Auth::id());
        $partner = Partner::find($user->userable_id);
        
        $email = $partner->emails[0];
        $phone = $partner->phones[0];
        $address = $partner->addresses[0];
        $responsible = $partner->responsible;

        $view = 'Partner/Contract';

        switch ($partner->type) {
            case 'DOCTORS':
                $view = 'Partner/ContractDoctor';
                break;
            case 'COMPANIES':
                $view = 'Partner/ContractCompany';
                break;
            case 'LABORATORIES':
                $view = 'Partner/ContractLaboratory';
                break;
            case 'RADIOLOGIES':
                $view = 'Partner/ContractRadiology';
                break;
            default:
                dd('erro');
                break;
        }
       
        return Inertia::render($view,  [
            'partner' => $partner,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'responsible' => $responsible,
        ]);
    }
    
    public function terms() {

        $user = User::find(Auth::id());
        $partner = Partner::find($user->userable_id);
        $email = $partner->emails[0];
        $phone = $partner->phones[0];
        
        return Inertia::render('Partner/Term', [
            'partner' => $partner,
            'email' => $email,
            'phone' => $phone,
        ]);

    }

    public function addSpecialities($id){
        $partner = Partner::find($id);
        $specialities = Speciality::all();
        return Inertia::render('Partner/Speciality',  [
            'partner' => $partner,
            'specialities' => $specialities,
        ]);
    }

    public function storeSpecialities(Request $request){
        $partner = Partner::find($request->partner_id);
        $speciality = Speciality::find($request->speciality_id);
        $partner->specialities()->save($speciality);
        $partners = Partner::all();
        return Redirect::route('partners.detail', ['id' => $request->partner_id]);
    }


    public function deleteSpecialities($partner, $speciality){
        $partner = Partner::find($partner);
        $partner->specialities()->detach($speciality);
        return Redirect::route('partners.detail', ['id' => $partner->id]);
    }


    public function search() {
        $specialities = Speciality::has('partners')->get();
        $specialities = $specialities->concat(Speciality::has('doctors')->get());

        return Inertia::render('Partner/Search', [
            'specialities' => $specialities
        ]);
    }

    public function result(Request $request) {
        $speciality = Speciality::find($request->specialities);
        $partners = $speciality->partners;
        $doctors = $speciality->doctors;

        for ($i=0; $i < count($partners); $i++) { 
            $partners[$i]["phones"] = $partners[$i]->phones;
            $partners[$i]["emails"] = $partners[$i]->emails;
            $partners[$i]["addresses"] = $partners[$i]->addresses;
        }
 
        for ($i=0; $i < count($doctors); $i++) { 
            $doctors[$i]["partners"] = $doctors[$i]->partner;
            $doctors[$i]["partners"]["phones"] = $doctors[$i]->partner->phones;
            $doctors[$i]["partners"]["emails"] = $doctors[$i]->partner->emails;
            $doctors[$i]["partners"]["addresses"] = $doctors[$i]->partner->addresses;
        }

       
        return Inertia::render('Partner/Result', [
            'partners' => $partners,
            'doctors' => $doctors,
        ]);
    }
}