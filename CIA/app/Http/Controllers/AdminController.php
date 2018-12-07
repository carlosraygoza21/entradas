<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\GuardiaPuerta;
use App\LogVisitante;
use Dotenv\Exception\ValidationException;


class AdminController extends Controller
{
    public function index(){
        // $data = [];
        // $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
        //     ->join('perfil_puerta', 'puerta.id_perfil_puerta', '=', 'perfil_puerta.id')
        //     ->where('perfil_puerta.id', '=', '1')
        //     ->get();

        // return view ('admin/index_admin')->with(compact('puertas'));
    }

    public function index_guardia(){

        

        // return view ('/registro_guardia');
    }

    public function guardia(){
        $segunda_base = env('DB_CONNECTION_dos');
        $fallo = 0;
        //PRIMERA BASE DE DATOS  
        try {
            // dato para tabla
            $guardias = DB::connection($segunda_base) 
                ->table('guardia_puerta')->select('users.id', 'users.name', 'users.email', 'guardia_puerta.id', 'guardia_puerta.tiempo', 'puerta.domicilio', 'perfil_puerta.nombre')
                ->join('users', 'guardia_puerta.id_usuario', '=', 'users.id')
                ->join('puerta', 'guardia_puerta.id_puerta', '=', 'puerta.id')
                ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
                ->where('guardia_puerta.eliminado', '=', '0')
                ->where('users.eliminado', '=', '0')
                ->where('puerta.eliminado', '=', '0')
                ->get();
            // datos para modal
            $asignarGuardia = DB::connection($segunda_base) 
                ->table('users')->select('name', 'id')
                ->where('id_perfil', '=', '2')
                ->where('users.eliminado', '=', '0')
                ->get();

            $puertas = DB::connection($segunda_base)
                ->table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
                ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
                ->where('puerta.eliminado', '=', '0')
                ->orderBy('id_perfil_puerta', 'asc')
                ->get();

            $total = DB::connection($segunda_base) 
                ->table('guardia_puerta')
                ->where('eliminado', '=', '0')
                ->count();

        } catch (ValidationException $e) {    
            throw $e;
            $fallo = 1;
        } catch (\Exception $e) {
            throw $e;
            $fallo = 1;
        }

        //SEGUNDA BASE SI FALLÓ 
        if ($fallo == 1) {
            try {
                // dato para tabla
                $guardias = DB::table('guardia_puerta')->select('users.id', 'users.name', 'users.email', 'guardia_puerta.id', 'guardia_puerta.tiempo', 'puerta.domicilio', 'perfil_puerta.nombre')
                    ->join('users', 'guardia_puerta.id_usuario', '=', 'users.id')
                    ->join('puerta', 'guardia_puerta.id_puerta', '=', 'puerta.id')
                    ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
                    ->where('guardia_puerta.eliminado', '=', '0')
                    ->where('users.eliminado', '=', '0')
                    ->where('puerta.eliminado', '=', '0')
                    ->get();
        
                // datos para modal
                $asignarGuardia = DB::table('users')->select('name', 'id')
                    ->where('id_perfil', '=', '2')
                    ->where('users.eliminado', '=', '0')
                    ->get();

                $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
                    ->join('perfil_puerta', 'id_perfil_puerta', '=', 'perfil_puerta.id')
                    ->where('puerta.eliminado', '=', '0')
                    ->orderBy('id_perfil_puerta', 'asc')
                    ->get();

                $total = DB::table('guardia_puerta')
                    ->where('eliminado', '=', '0')
                    ->count();

            } catch (ValidationException $e) {
                return redirect()->action('HomeController@index');
            } catch (\Exception $e) {
                return redirect()->action('HomeController@index');
            // throw $e;
            // $fallo = true;
            }
        }

        return view ('admin/guardia_registro')->with(compact('asignarGuardia', 'puertas', 'guardias', 'total'));
    }

    public function guardia_puerta_store(){
        $segunda_base = env('DB_CONNECTION_dos'); 
        //OBTENCIÓN DE DATOS DEL FORM
        $insert = new GuardiaPuerta();
        // $insert->id = request('id');
        $insert->id_usuario = request('id_usuario');
        $insert->tiempo = request('tiempo');
        $insert->id_puerta = request('id_puerta');
        $insert->eliminado = 0;

        //TRANSACCIÓN PARA GUARDAR EN AMBAS BASES
        DB::beginTransaction();
        try {
            //PRIMERA INSERCIÓN
            DB::connection($segunda_base)->table('guardia_puerta')->insert(
                [
                    // 'id' => $insert->id,
                    'id_usuario' => $insert->id_usuario,
                    'id_puerta' => $insert->id_puerta,
                    'tiempo' => $insert->tiempo,
                    'eliminado' => $insert->eliminado,
                ]
            );
            //SEGUNDA INSERCIÓN
            $insert->save();
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('AdminController@guardia')->with('message', 'error');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('AdminController@guardia')->with('message', 'error');;
        }
        DB::commit();
        return redirect()->action('AdminController@guardia');
    }

    public function entradas(){
        $segunda_base = env('DB_CONNECTION_dos');
        $fallo = 0;
        //PRIMERA BASE DE DATOS  
        try {
            $entradas_visitante = DB::connection($segunda_base)
                ->table('visitante_logs')
                ->join('puerta', 'visitante_logs.id_puerta', '=', 'puerta.id')
                ->where('puerta.eliminado', '=', '0')
                ->get();

            $entradas_usuarios = DB::connection($segunda_base)
                ->table('logs_usuarios')
                ->join('puerta', 'logs_usuarios.id_puerta', '=', 'puerta.id')
                ->join('users', 'logs_usuarios.id_usuario', '=', 'users.id')
                ->where('puerta.eliminado', '=', '0')
                ->where('users.eliminado', '=', '0')
                ->get();
        } catch (ValidationException $e) {    
            throw $e;
            $fallo = 1;
        } catch (\Exception $e) {
            throw $e;
            $fallo = 1;
        }

        //SEGUNDA BASE SI FALLÓ 
        if ($fallo == 1) {
            try {
                $entradas_visitante = DB::table('visitante_logs')
                    ->join('puerta', 'visitante_logs.id_puerta', '=', 'puerta.id')
                    ->where('puerta.eliminado', '=', '0')
                    ->get();

                $entradas_usuarios = DB::table('logs_usuarios')
                    ->join('puerta', 'logs_usuarios.id_puerta', '=', 'puerta.id')
                    ->join('users', 'logs_usuarios.id_usuario', '=', 'users.id')
                    ->where('puerta.eliminado', '=', '0')
                    ->where('users.eliminado', '=', '0')
                    ->get();

            } catch (ValidationException $e) {
                throw $e;
                return redirect()->action('HomeController@index');
            } catch (\Exception $e) {
                throw $e;
                return redirect()->action('HomeController@index');
                
            // $fallo = true;
            }
        }

        return view('admin/entradas')->with(compact('entradas_visitante', 'entradas_usuarios'));
    }

    public function estacionamiento()
    {
        $registros = DB::table('logs_usuarios')->select('logs_usuarios.hora', 'logs_usuarios.fecha', 'users.name', 'puerta.domicilio')
            ->join('users', 'logs_usuarios.id_usuario', '=', 'users.id')
            ->join('puerta', 'logs_usuarios.id_puerta', 'puerta.id')
            ->join('perfil_puerta', 'puerta.id_perfil_puerta', 'perfil_puerta.id')
            ->where('perfil_puerta.id', '=', '1')
            ->orderBy('logs_usuarios.fecha','desc')
            ->get();

        return view('admin/estacionamiento')->with(compact('registros', 'puertas'));
    }


    
}
