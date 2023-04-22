<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\Dependent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssociateConfirm;
use App\Mail\AssociateAdd;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;

class AssociateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:name,code']
        ]);

        $query = Associate::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }

        if (request('level')) {
            $query->where('level_id', '=', request('level'));
        }
        
        if (request('active') != null) {
            $query->where('active', '=', request('active'));
        } else {
            $query->where('active', '=', 1);
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Associate/Index', [
            'associates' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);

        // return Inertia::render('Associate/Index', [
        //     'associates' => Associate::paginate()
        // ]);

        // if ( $request->status == '' ) { $request->status=1; }
      
        // return Inertia::render('Associate/Index', [
        //     'associates' => Associate::when($request, function($query, $r){
        //         $query->orderBy('name', 'asc')
        //             ->where('name', 'LIKE', '%'. $r->term .'%')
        //             ->where('level_id', $r->status);
        //     })->paginate()
        // ]);
        // //$associates = Associate::orderBy('name', 'asc')->paginate(30);
        //
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Associate/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $validated = $request->validate([
                'name' => 'required|min:6',
                'cpf' => 'nullable|required|min:14|max:14',
                'code' => 'required|min:4'
                // 'zipcode' => 'required|min:8|max:8',
                // 'state' => 'required',
                // 'city' => 'required',
                // 'district' => 'required',
                // 'address' => 'required',
                //'ddd' => 'required',
                //'phone' => 'required',
                //'email' => 'required',
            ]);
    
            $associate = Associate::create($request->all());
                   
            
            AddressController::addNew($request, $associate->id, Associate::class);
            PhoneController::addNew($request, $associate->id, Associate::class);
            EmailController::addNew($request, $associate->id, Associate::class);
              
            $associate->email = $request->email;
            Mail::bcc('bahia@aepet.org.br')->to($associate->email)->send(new AssociateAdd($associate));
    
            $message = 'Cadastro de ' . $associate->name . ' realizado com sucesso.';
            
            //$associates = Associate::orderBy('name', 'asc')->paginate(10);
            //return Inertia::render('Associate/Index', ['associates' => $associates]);
            return Redirect::route('associates.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function show(Associate $associate)
    {
        $addresses = $associate->addresses;
        if ( count($addresses)==0 ) {
            $addresses[0] = new Address();
        }

        $phones = $associate->phones;
        if ( count($phones)==0 ) {
            $phones[0] = new Phone();
        }

        $emails = $associate->emails;
        if ( count($emails)==0 ) {
            $emails[0] = new Email();
        }
            
        return Inertia::render('Associate/Show', [
            'associate' => $associate,
            'addresses' => $addresses,
            'phones' => $phones,
            'emails' => $emails,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function edit(Associate $associate)
    {
        
        $address = $associate->addresses;
        
        return Inertia::render('Associate/Edit', [
            'associate' => $associate,
            'address' => $address,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Associate $associate)
    {
    
        $validated = $request->validate([
            'name' => 'required|min:6',
            'cpf' => 'nullable|required|min:14|max:14',
            // 'zipcode' => 'required|min:8|max:8',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'district' => 'required',
            // 'address' => 'required',
            // 'ddd' => 'required',
            // 'phone' => 'required',
            // 'email' => 'required',
        ]);
        $associate->update( $request->all() );

        $address = $associate->addresses;
        if (count($address)>0 ) {
            $address = $address[0];
            $address->update( $request->all() );
        }
        

        // $phone = $associate->phones[0];
        // $phone->update([
        //     'ddd'    => $request->ddd,
        //     'number' => $request->phone,
        // ]);

        // $email = $associate->emails[0];
        // $email->update( $request->all() );
    
       // $associates = Associate::orderBy('name', 'asc')->paginate(10);
        return Redirect::route('associates.show', ['associate' => $associate->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Associate $associate)
    {
        // $associate->delete();

        return Redirect::route('associate.index');
    }

    public function list(){
        dd('ok');
    }

    public function dependents() {

        $user = User::find(Auth::id());
        
        $associate = Associate::find($user->userable_id);

        $dependents = Dependent::where('associate_id', $associate->id)->with('kindship')->get();
                
        return Inertia::render('Associate/Dependent',[
            'associate' => $associate,
            'dependents' => $dependents,

        ]);
    }

    public function valid() {
        return Inertia::render('Associate/Valid');
    }

    public function confirm(Request $request){
       
        $associate = Associate::where('cpf', $request->cpf)->where('active', 1)->get();
       
        try {
            if ( count($associate) <> 0 ) :
                $user = User::create([
                    "name" => $associate[0]->name, 
                    "email" => $request->email, 
                    "document" => $request->cpf, 
                    "password" => Hash::make('AMS.2022'),
                    "userable_id" => $associate[0]->id,
                    "userable_type" => Associate::class,
                    "role_id" => 5
                ]);
            else:
                return 'Erro: Associado(a) não Cadastrado!';    
            endif;
        } catch (\Throwable $th) {
            return 'Erro: Associado(a) Inválido ou já Cadastrado!';
        }

        try {
             Mail::bcc('bahia@aepet.org.br')->to($request->email)->send(new AssociateConfirm($associate[0]));
        } catch (\Throwable $th) {
            return 'Erro: Problemas ao enviar email!';
        }
        
        $message = 'Validação de Cadastro do(a) Associado(a) ' . $associate[0]->name . ' realizada com sucesso.';
      
        //return Redirect::route('associates.validated');

        return 'success';
    }

    public function storePhones(Request $request){
        $phone = Phone::create([
            "ddd" => $request->ddd, 
            "number" => $request->number, 
            "phoneable_id" => $request->associate_id,
            "phoneable_type" => Associate::class,
        ]);
        return Redirect::route('associates.show', ['associate' => $request->associate_id]);
    }


    public function deletePhones(Request $request){
        $phone = Phone::find($request->phone_id);
        $phone->delete();
        return Redirect::route('associates.show', ['associate' => $request->associate_id]);
    }


    public function storeEmails(Request $request){
        $email = Email::create([
            "email" => $request->email, 
            "emailable_id" => $request->associate_id,
            "emailable_type" => Associate::class,
        ]);
        return Redirect::route('associates.show', ['associate' => $request->associate_id]);
    }


    public function deleteEmails(Request $request){
        $email = Email::find($request->email_id);
        $email->delete();
        return Redirect::route('associates.show', ['associate' => $request->associate_id]);
    }


}

