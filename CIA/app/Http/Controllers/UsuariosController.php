<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = User::all();
        // $usuarios = DB::connection('mysql_local')->table('users')->select('name')->get();
        return view ('admin/usuarios', compact('usuarios'));
    }

    public function store(){
        //TRANSACCIÓN
        DB::beginTransaction();
        try{
            //OBTENCIÓN DE DATOS DEL FORM
            $usuarios = new User();
            $usuarios->name = request('name');
            $usuarios->email = request('email');
            $usuarios->id = request('id');
            $usuarios->password = Hash::make(request('password'));
            $usuarios->id_perfil = request('id_perfil');
            $usuarios->eliminado = 0;
            $usuarios->iscoordi = 0; //= $request->input('iscoordi');

            //PRIMERA INSERCIÓN
            $segunda = DB::connection('mysql_local')->table('users')->insert(
                ['id' => $usuarios->id,
                'name' => $usuarios->name,
                'password' => $usuarios->password,
                'iscoordi' => $usuarios->iscoordi,
                'eliminado' => $usuarios->eliminado,
                'email' => $usuarios->email,
                'id_perfil' => $usuarios->id_perfil
                ]
            );

            //SEGUNDA INSERCIÓN
            $usuarios->save();


        } catch(ValidationException $e){
            // ROLLBACK Y REGRESA A LA PANTALLA ANTERIOR CON MUESTRA DE ERROR
            DB::rollback();
            // throw $e;
            return redirect()->action('UsuariosController@index')->with('message','error');
            // return Redirect::to('/form')
                //  ->withErrors( $e->getErrors() )
                //  ->withInput();

        }catch(\Exception $e){
            // ROLLBACK POR CUALQUIER EXCEPCIÓN QUE SE PUEDA CAUSAR
            DB::rollback();
            // throw $e;
            return redirect()->action('UsuariosController@index')->with('message','error');;
        }

        //COMMIT
        DB::commit();
        return redirect()->action('UsuariosController@index');
    }
}
