<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Associate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Report/Index');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssociates(Request $request)
    {
        $query = Associate::query();

    
        if ($request->level) {
            $query->where('level_id', '=', $request->level);
        }

        if ($request->active==1 || $request->active==0) {
            $query->where('active', '=', $request->active);
        }
        
        if ($request->type) {
            if ( $request->type == 'email') {
                $associates = $query->with('emails')->get();
        
                return Inertia::render('Report/Associate/Email', [
                    'associates' => $associates
                ]);
            }
            elseif ( $request->type == 'phone') {
                $associates = $query->with('phones')->get();
        
                return Inertia::render('Report/Associate/Phone', [
                    'associates' => $associates
                ]);
            }
            elseif ( $request->type == 'address') {
                $associates = $query->with('addresses')->get();
        
                return Inertia::render('Report/Associate/Address', [
                    'associates' => $associates
                ]);
            }
            else {
                $associates = $query->with('phones','emails', 'addresses')->get();
        
                return Inertia::render('Report/Associate/All', [
                    'associates' => $associates
                ]);
            }
        }

     

    }

    public function reportEmails()
    {
        try {
            $associates = Associate::with('phones')->get();
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadView('reports.associates.email', compact('associates'));
            return $pdf->download('associates.pdf');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
