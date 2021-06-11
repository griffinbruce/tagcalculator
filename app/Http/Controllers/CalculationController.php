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

    public function getResult() {

        //store input in DB
        $calculation = new Calculation();

        //Check for correct integer inputs
        if(preg_match("/^[0-9]+$/", request('first')) && preg_match("/^[0-9]+$/", request('second'))){
            //check for dividing by 0
            if(request('type') == '/' && request('second') == 0){
                return redirect('/')->with('flash_message', "When Choosing to Divide the second integer must not be 0");
            }
            $calculation->first = request('first');
            $calculation->second = request('second');
            $calculation->type = request('type');
            
            $calculation->result = $calculation->calculate();

            $calculation->save();

            return redirect('/')->with('flash_message', "The answer is: $calculation->result");
        }else{
            return redirect('/')->with('flash_message', "Please enter numbers only");
        }
    }
};
