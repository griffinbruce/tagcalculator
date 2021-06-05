<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculationController extends Controller
{
    public function index(){

        //query DB for last 10
        $calculations = Calculation::orderBy('created_at', 'desc')->take(10)->get();
        //query DB for most recent
        $currentCalc = Calculation::orderBy('created_at', 'desc')->take(1)->get();

        return view('index', [
            'calculations' => $calculations,
            'currentCalc' => $currentCalc
        ]);
    }

    public function store() {

        //store input in DB
        $calculation = new Calculation();

        $calculation->first = request('first');
        $calculation->second = request('second');
        $calculation->type = request('type');

        $calculation->save();

        return redirect('/')->with('flash_message', 'The answer is: ');
    }
};
