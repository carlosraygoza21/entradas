<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view ('admin/index_admin');
    }

    public function guardia(){
        return view ('admin/guardia_registro');
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        // $usuarios = auth()->user()-> 
        return view ('admin/usuarios', compact('usuarios'));
    }
}
