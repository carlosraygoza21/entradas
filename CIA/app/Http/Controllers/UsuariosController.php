<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(){

        $usuarios = User::all();
        // $usuarios = auth()->user()-> 
        return view ('admin/usuarios', compact('usuarios'));
    }

    public function store(){
        $usuarios = new User();

        $usuarios->name = request('name');
        $usuarios->email = request('email');
        $usuarios->id = request('id');
        $usuarios->password = Hash::make(request('password'));
        $usuarios->id_perfil = request('id_perfil');
        // $usuarios->iscoordi = $request->input('iscoordi');

        $usuarios->save();
    }
}
