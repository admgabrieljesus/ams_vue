<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use App\Models\Associate;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
            'field' => ['in:name']
        ]);

        $query = User::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }

        if (request('role')) {
            $query->where('role_id', '=', request('role'));
        }
        
        if (request('active') != null) {
            $query->where('active', '=', request('active'));
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('User/Index', [
            'users' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);
     
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'role_id' => 'required',
            ]
        );
        $user = $request->all();
        $user['active'] = 1;
        $user['password'] = Hash::make('AMS.2022');
        User::create($user);
        return Redirect::route('users.index')->with('message', 'Usuário criado com sucesso.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return Redirect::route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            User::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }

     /**
     * Show the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {

        $user = User::find(Auth::id());
        
        $person = null;
        $doctors = null;

        $files = Storage::disk('public')->allFiles('documents/partners/' . $user->userable->id);

        if ( $user->userable_type == Partner::class ) {
            $person= Partner::find($user->userable->id);
            if ( $person->type == 'COMPANIES') :
                $doctors = $person->doctors;
                for ($i=0; $i < count($doctors) ; $i++) :
                    $doctor = Doctor::find($doctors[$i]['id']);
                    $doctors[$i]['specialities']= $doctor->specialities;
                endfor;
            endif;
        }
         else {
             $person = Associate::find($user->userable->id);
         }

        $emails = $person->emails()->get();
        $phones = $person->phones()->get();
        $addresses = $person->addresses()->get();
        $specialities = Speciality::all();
        
        return Inertia::render('User/Detail',[
            'user' => $user,
            'person' => $person,
            'emails' => $emails,
            'phones' => $phones,
            'addresses' => $addresses,
            'doctors' => $doctors,
            'specialities' => $specialities,
            'files' => $files
        ]);
    }

}
