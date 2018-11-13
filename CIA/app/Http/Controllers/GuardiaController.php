<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    public function index(){
        return view ('guardia/index_guardia');
    }

}
