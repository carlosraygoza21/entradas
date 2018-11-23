<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\GuardiaPuerta;


class AdminController extends Controller
{
    public function index(){
        return view ('admin/index_admin');
    }

    public function index_guardia(){

        

        // return view ('/registro_guardia');
    }

    public function guardia(){
        $asignarGuardia = DB::table('users')->select('name','id')->where('id_perfil','=','2')->get();
        
        $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
        ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')->get();
        
        $guardias = DB::table('guardia_puerta')->select('users.id', 'users.name', 'users.email','guardia_puerta.id', 'guardia_puerta.tiempo', 'puerta.domicilio', 'perfil_puerta.nombre')
        ->join('users', 'guardia_puerta.id_usuario', '=', 'users.id')
        ->join('puerta', 'guardia_puerta.id_puerta', '=', 'puerta.id')
        ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
        ->where('guardia_puerta.eliminado', 0)->get();

        // $data = [
        //     'asignarGuardia'  => $asignarGuardia,
        //     'puertas'   => $puertas,
        //     'guardias' => $guardias
        // ];

// return View::make('user')->with($data);

        return view ('admin/guardia_registro')->with(compact('asignarGuardia', 'puertas', 'guardias'));
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        // $usuarios = auth()->user()-> 
        return view ('admin/usuarios', compact('usuarios'));
    }


    public function guardia_puerta_store(){
        $usuarios = new GuardiaPuerta();
        
        $usuarios->id = request('id');
        $usuarios->id_usuario = request('id_usuario');
        $usuarios->tiempo = request('tiempo');
        $usuarios->id_puerta = request('id_puerta');
        $usuarios->eliminado = 0; //$request->input('iscoordi');

        $usuarios->save();
        // return view ('registro_guardia');
        // return redirect()->action('AdminController@index_guardia');
        return redirect()->action('AdminController@guardia');
    }

    public function show_registros_estacionamiento(){

        // $guardias = DB::table('guardia_puerta')->select('users.id', 'users.name', 'users.email', 'guardia_puerta.tiempo')
        // ->join('users', 'guardia_puerta.id_usuario', '=', 'users.id')
        // ->where('guardia_puerta.eliminado', 0)->get();


//SELECT logs_usuarios.hora, logs_usuarios.fecha, users.name, puerta.domicilio FROM logs_usuarios
// JOIN users ON logs_usuarios.id_usuario = users.id
// JOIN puerta ON logs_usuarios.id_puerta = puerta.id
// WHERE logs_usuarios.id_puerta = 1

            $registros = DB::table('logs_usuarios')->select('logs_usuarios.hora','logs_usuarios.fecha', 'users.name', 'puerta.domicilio')
            ->join('users', 'logs_usuarios.id_usuario', '=', 'users.id')
            ->join('puerta', 'logs_usuarios.id_puerta', 'puerta.id')
            ->where('logs_usuarios.id_puerta', 1)->get();

            $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
            ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
            ->WHERE('id_perfil_puerta','=','1')
            ->get();

        return view ('admin/estacionamiento')->with(compact('registros', 'puertas'));


    }


}
