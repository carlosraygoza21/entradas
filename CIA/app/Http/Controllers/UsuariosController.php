<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
{
    public function index(){

        $usuarios = Usuario::all();
        // $usuarios = auth()->user()->
        
        return view ('admin/usuarios', compact('usuarios'));
    }
}
