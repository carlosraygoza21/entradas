<?php

namespace App\Http\Controllers;
use App\User;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\LogVisitante;
use Dotenv\Exception\ValidationException;

class GuardiaController extends Controller
{
    public function index(){
        return view ('guardia/index_guardia');
    }
    
//GUARDIA SECCION
    public function guardar_visitante()
    {
        $segunda_base = env('DB_CONNECTION_dos'); 
        //OBTENCIÓN DE DATOS DEL FORM
        $insert = new LogVisitante();
        // $insert->id = request('id');
        $insert->nombre = request('nombre_visitante');
        $insert->motivo_visita = request('destinatario_visitante');
        $insert->asunto = request('asunto');
        $insert->id_puerta = request('id_puerta');
        $insert->fecha_registro = date('Y-m-d');
        $insert->hora = date('G:i:s');
        $insert->isEntry = 1;
        $insert->isExit = 0;
        // $insert->eliminado = 0;

        //TRANSACCIÓN PARA GUARDAR EN AMBAS BASES
        DB::beginTransaction();
        try {
            //PRIMERA INSERCIÓN
            DB::connection($segunda_base)->table('visitante_logs')->insert(
                [
                    'nombre' => $insert->nombre,
                    'motivo_visita' => $insert->motivo_visita,
                    'asunto' => $insert->asunto,
                    'id_puerta' => $insert->id_puerta,
                    'fecha_registro' => $insert->fecha_registro,
                    'hora' => $insert->hora,
                    'isEntry' => 1,
                    'isExit' => 0
                    // 'eliminado' => 0
                ]
            );
            $newid = DB::connection()->table('e_s_visitante')->select('id')->count();

            DB::connection($segunda_base)->table('e_s_visitante')->insert(
                [
                    'is_entry' => 1,
                    'is_exit' => 0,
                    'id_log' => $newid+1
                ]
                );

            

            // PDATE `e_s_visitante` SET `id_log` = '7' WHERE `e_s_visitante` . `id` = 7;
            // SELECT COUNT(id) FROM e_s_visitante
            //SEGUNDA INSERCIÓN
            $insert->save();

            DB::table('e_s_visitante')->insert(
                [
                    'is_entry' => 1,
                    'is_exit' => 0,
                    'id_log' => $newid+1
                ]
            );
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('HomeController@index')->with('message', 'error');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('HomeController@index')->with('message', 'error');;
        }
        DB::commit();
        return redirect()->action('HomeController@index');
    }
 
    public function entradas(){
        $segunda_base = env('DB_CONNECTION_dos');
        $fallo = 0;
        $today = date('Y-m-d');
        //PRIMERA BASE DE DATOS  
        try {
            $entradas_visitante = DB::table('visitante_logs')
                ->join('puerta', 'visitante_logs.id_puerta', '=', 'puerta.id')
                ->join('e_s_visitante', 'visitante_logs.id', '=', 'e_s_visitante.id_log')
                ->where('puerta.eliminado', '=', '0')
                ->where('fecha_registro', 'like', $today.'%')
                ->orderBy('fecha_registro', 'DESC')
                ->orderBy('hora', 'DESC')
                ->get();

            $entradas_usuarios = DB::table('logs_usuarios')
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
                $entradas_visitante = DB::connection($segunda_base)
                    ->table('visitante_logs')
                    ->join('puerta', 'visitante_logs.id_puerta', '=', 'puerta.id')
                    ->join('e_s_visitante', 'visitante_logs.id', '=', 'e_s_visitante.id_log')
                    ->where('puerta.eliminado', '=', '0')
                    ->orderBy('fecha_registro', 'DESC')
                    ->orderBy('hora', 'DESC')
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
                return redirect()->action('HomeController@index');
            } catch (\Exception $e) {
                throw $e;
                return redirect()->action('HomeController@index');
                
            // $fallo = true;
            }
        }

        return view('guardia/entradas_g')->with(compact('entradas_visitante', 'entradas_usuarios'));


    }


public function salida_visitante(){


            



    
        $segunda_base = env('DB_CONNECTION_dos'); 
       
        

        //TRANSACCIÓN PARA GUARDAR EN AMBAS BASES
        DB::beginTransaction();
        try {
            //PRIMERA INSERCIÓN
            DB::connection($segunda_base)->table('visitante_logs')
                ->where('e_s_visitante.id', $id)
                ->update(['is_entry' => 0]
            );
            
            

            

            // PDATE `e_s_visitante` SET `id_log` = '7' WHERE `e_s_visitante` . `id` = 7;
            // SELECT COUNT(id) FROM e_s_visitante
            //SEGUNDA INSERCIÓN
            $insert->save();

            DB::table('e_s_visitante')->insert(
                [
                    'is_entry' => 1,
                    'is_exit' => 0,
                    'id_log' => $newid + 1
                ]
            );
        } catch (ValidationException $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('HomeController@index')->with('message', 'error');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->action('HomeController@index')->with('message', 'error');;
        }
        DB::commit();
        return redirect()->action('HomeController@index');
    


   
}
}
