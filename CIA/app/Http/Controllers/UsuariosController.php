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

        $segunda_base = env('DB_CONNECTION_dos'); 
        $fallo = 0;
        //PRIMERA BASE DE DATOS        
        try{
            // $usuarios = User::all();
            $usuarios = DB::connection($segunda_base)
                ->table('perfil')
                ->join('users','users.id_perfil','=', 'perfil.id')
                ->where('users.eliminado', '=', '0')
                ->orderBy('name', 'asc')
                ->get();

            $total = DB::connection($segunda_base)
                ->table('users')
                ->where('users.eliminado', '=', '0')
                ->count();

        }catch (ValidationException $e){    
            // throw $e;
            $fallo = 1;
        } catch (\Exception $e) {
            // throw $e;
            $fallo = 1;
        }

        //SEGUNDA BASE SI FALLÓ 
        if($fallo == 1){ 
            try {
                $usuarios = DB::table('perfil')
                    ->join('users', 'users.id_perfil', '=', 'perfil.id')
                    ->orderBy('name', 'asc')
                    ->get();

                $total = DB::table('users')
                    ->where('users.eliminado', '=', '0')
                    ->count();

            } catch (ValidationException $e) {
                return redirect()->action('HomeController@index');
            } catch (\Exception $e) {
                return redirect()->action('HomeController@index');
            // throw $e;
            // $fallo = true;
            }
        }
        return view('admin/usuarios', compact('usuarios', 'total'));        
    }

    public function store(){
        $segunda_base =  env('DB_CONNECTION_dos'); 

        //OBTENCIÓN DE DATOS DEL FORM
        $usuarios = new User();
        $usuarios->name = request('name');
        $usuarios->email = request('email');
        $usuarios->id = request('id');
        $usuarios->password = Hash::make(request('password'));
        $usuarios->id_perfil = request('id_perfil');
        $usuarios->eliminado = 0;
        $usuarios->iscoordi = 0; //= $request->input('iscoordi');    
        
        //CORROBORAR DUPLICIDAD DE CORREO
        $email_corroboracion = DB::table('users')->select('*')->where('email', '=', $usuarios->email)->get();
        $email_corroboracion_dos = DB::connection($segunda_base)->table('users')->select('*')->where('email', '=', $usuarios->email)->get();

        if ($email_corroboracion->count() > 0) {
            return "Correo existe actualmente";
        } else { //CORREO NO EXISTE
            //TRANSACCIÓN PARA GUARDAR EN AMBAS BASES
            DB::beginTransaction();
            try {
            //PRIMERA INSERCIÓN
                DB::connection($segunda_base)->table('users')->insert(
                    [
                        'id' => $usuarios->id,
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
            } catch (ValidationException $e) {
            // ROLLBACK Y REGRESA A LA PANTALLA ANTERIOR CON MUESTRA DE ERROR
                DB::rollback();
                // throw $e;
                return redirect()->action('UsuariosController@index')->with('message', 'error');
            } catch (\Exception $e) {
            // ROLLBACK POR CUALQUIER EXCEPCIÓN QUE SE PUEDA CAUSAR
                DB::rollback();
                // throw $e;
                return redirect()->action('UsuariosController@index')->with('message', 'error');;
            }
            //COMMIT
            DB::commit();
            return redirect()->action('UsuariosController@index');
        }
        

        

        
    }
}
