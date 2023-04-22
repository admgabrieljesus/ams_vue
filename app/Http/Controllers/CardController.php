<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Associate;
use App\Models\Dependent;
use App\Models\Kindship;
use Inertia\Inertia;

class CardController extends Controller
{

    public function show($id) {

        $cards = Card::where('dependent_id', $id)->get();
       
        $card = '';

        foreach ($cards as $c) {
            if (  $c->active == 1 ) {
                $card = $c;
            }
        }
        
        if ( $card ==  '' ) {
            $message = 'Erro: Carteira não emitida';
            dd($message);
            //return view('app.error', compact('message') );
        }

        $associate = Associate::find($c->associate_id);
        $dependent = Dependent::find($c->dependent_id);
        $kindship = Kindship::find($dependent->kindship_id);

        return Inertia::render('Card/Show',[
            'associate' => $associate,
            'dependent' => $dependent,
            'kindship' => $kindship,
            'card' => $card,
        ]);
        
    }
    

}
