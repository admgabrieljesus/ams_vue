<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\Card;
use App\Models\Dependent;
use App\Models\Kindship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DependentController extends Controller
{

    public function index() {
        dd('index');
    }

    public function create() {
        $kindships = Kindship::where('id', '>', 0)->orderBy('title')->get();
        return Inertia::render('Dependent/Create',[
            'kindships' => $kindships
        ]);
    }

    public function store(Request $request) {
      
        $request->validate(
        [
            'name' => 'required',
            'cpf' => 'required',
            'kindship_id' => 'required',
        ]
        );

        $associate = Associate::where('name' , Auth::user()->name )->get();
      
        $dependents = Dependent::where('associate_id', $associate[0]->id)->get();
        
        $number = 0;

        foreach ($dependents as $d) {
            $number = (int) $d->code ;
        }

        $code = ++$number;
        
        $dependent = Dependent::create([
            "name" => $request->name, 
            "cpf" => $request->cpf, 
            "rg" => $request->rg, 
            "birth" => $request->birth, 
            "code" => $code, 
            "associate_id" => $associate[0]->id,
            "kindship_id" => $request->kindship_id,
            "comment" => '',
        ]);

        $file = new FileController();
        $file->addDocuments($request, $dependent->id, 'dependents');

        return Redirect::route('associates.dependents');

    }

    public function list() {
        $dependents = Dependent::all();
        return Inertia::render('Dependent/List',[
            'dependents' => $dependents
        ]);
    }

    public function detail($id)
    {
        $dependent = Dependent::find($id);
        $kindship = $dependent->kindship;
        $files = Storage::disk('public')->allFiles('documents/dependents/' . $id);

        return Inertia::render('Dependent/Detail',[
            'dependent' => $dependent,
            'kindship' => $kindship,
            'files' => $files,
        ]);
    }

    public function check(Request $request) {
        $dependent = Dependent::find($request->id);
        $dependent->active = 1;
        $dependent->save();

        $issue = date('Ymd');
        $expiration = date('Ymd', strtotime($issue. ' + 365 days'));
        
        $card = Card::create([
            "associate_id" => $dependent->associate_id,
            "dependent_id" => $dependent->id,
            "issue" => $issue,
            "expiration" => $expiration,
            "active" => 1,
            "comment" => $request->comment,
        ]);

        IncidentController::addNew($request, $dependent->id, Partner::class);
        
        $file = new FileController();
        $file->addDocuments($request, $dependent->id, 'partners');
         
        //Mail::bcc('bahia@aepet.org.br')->to($email)->send(new PartnerCheck($partner));
 
        $message = 'Validação de Cadastro do(a) Dependente(a) ' . $dependent->name . ' realizada com sucesso.';
        
        $dependents = Dependent::all();
       
        return Inertia::render('Dependent/List',[
            'dependents' => $dependents
        ]);

    }

}
