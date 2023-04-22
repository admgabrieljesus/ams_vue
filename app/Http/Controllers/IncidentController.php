<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{

    public static function addNew(Request $request, $id, $class){
        return Incident::create([
            "date" => date('ymd'),
            "user_id" => Auth::user()->id,
            "comment" => $request->comment,
            "incidentable_id" => $id,
            "incidentable_type" => $class,
        ]);
    }

}
