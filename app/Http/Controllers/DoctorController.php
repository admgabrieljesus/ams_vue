<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; 

class DoctorController extends Controller
{

    public function storeSpecialities(Request $request){
        $doctor = Doctor::find($request->doctor_id);
        $speciality = Speciality::find($request->speciality_id);
        $doctor->specialities()->save($speciality);
        $doctors = Doctor::all();
        return Redirect::route('users.detail');
    }


    public function deleteSpecialities($doctor, $speciality){
        $doctor = Doctor::find($doctor);
        $doctor->specialities()->detach($speciality);
        return Redirect::route('users.detail');
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'name' => 'required|min:10',
            'cpf' => 'nullable|required|min:14|max:14',
            'type_document' => 'required|present',
            'number_document' => 'required',
            'partner_id' => 'required'
        ]);
        
        $doctor = Doctor::create($request->all());

        return Redirect::route('users.detail');
    
    }

    

}