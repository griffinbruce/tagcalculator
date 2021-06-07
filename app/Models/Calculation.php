<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    public function calculate($first=null, $second=null, $type=null){
        if(isset($this->first)) $first=$this->first;
        if(isset($this->second)) $second=$this->second;
        if(isset($this->type)) $type=$this->type;

        switch($type){
            case '+': 
                $output = $first + $second;
                break;
            case '-':
                $output = $first - $second;
                break;
            case '*':
                $output = $first * $second;
                break;
            case '/':
                $output = $first / $second;
                break;
        }

        return $output;
    }

    public function fullResult() {
        return "$this->first $this->type $this->second = $this->result";
    }
}
