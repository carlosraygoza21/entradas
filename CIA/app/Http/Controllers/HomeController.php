<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // User role
        if (Auth::check()){
            $id_perfil = Auth::user()->id_perfil; 
            // dd($id_perfil);
            // Check user role
            switch ($id_perfil) {
                case '1':
                    $data = [];
                    $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
                        ->join('perfil_puerta', 'puerta.id_perfil_puerta', '=', 'perfil_puerta.id')
                        ->where('perfil_puerta.id', '=', '1')
                        ->get();

                    // obtener fecha de hoy
                    $today = date('Y-m-d');
                    $estacionamiento = 1;

                    //obtener id de puertas que sean estacionamiento
                    $puertas_estacionamiento = DB::table('puerta')->where('id_perfil_puerta', $estacionamiento)->get();
                    
                    foreach($puertas_estacionamiento as $puerta){
                        $cupo = DB::table('puerta')->where('id', $puerta->id)->first();
                        $cupoTotal = $cupo->cupo;
                        $domicilio = $cupo->domicilio;
                    
                        $ocupados = DB::table('logs_usuarios')->where('is_entry', 1)->where('id_puerta', $puerta->id)->where('fecha', 'like', $today.'%')->count();                    
                        $libres = DB::table('logs_usuarios')->where('is_exit', 1)->where('id_puerta', $puerta->id)->where('fecha', 'like', $today . '%')->count();
                        $ocupadoVis = DB::table('visitante_logs')->where('is_entry', 1)->where('id_puerta', $puerta->id)->where('fecha_registro', 'like', $today . '%')->count();
                        $libreVis = DB::table('visitante_logs')->where('is_exit', 1)->where('id_puerta', $puerta->id)->where('fecha_registro', 'like', $today . '%')->count();

                        $libre_total = $libres + $libreVis;
                        $ocupado_total = $ocupados + $ocupadoVis;
                        $cupoTotal = $cupoTotal + ($libre_total) - ($ocupado_total);
                        // $data = array_merge($data, array("id" => $puerta->id, "cupoTotal" => $cupoTotal , "libre_total" => $libre_total, "ocupado_total" => $ocupado_total));
                        array_push($data, ['id' => $puerta->id, 'domicilio' => $domicilio, 'cupoTotal' => $cupoTotal, 'libre_total' => $libre_total, 'ocupado_total' => $ocupado_total]);
                    }
                    
                    // return view('admin/index_admin');
                        return view('admin.index_admin')->with(compact('puertas', 'data'));
                    break;
                case '2':
                    $data = [];
                    $puertas = DB::table('puerta')->select('puerta.id', 'puerta.domicilio', 'perfil_puerta.nombre')
                        ->join('perfil_puerta', 'puerta.id_perfil_puerta', '=', 'perfil_puerta.id')
                        
                        ->get();

                    // obtener fecha de hoy
                    $today = date('Y-m-d');
                    $estacionamiento = 1;

                    //obtener id de puertas que sean estacionamiento
                    $puertas_estacionamiento = DB::table('puerta')->where('id_perfil_puerta', $estacionamiento)->get();

                    foreach ($puertas_estacionamiento as $puerta) {
                        $cupo = DB::table('puerta')->where('id', $puerta->id)->first();
                        $cupoTotal = $cupo->cupo;
                        $domicilio = $cupo->domicilio;

                        $ocupados = DB::table('logs_usuarios')->where('is_entry', 1)->where('id_puerta', $puerta->id)->where('fecha', 'like', $today . '%')->count();
                        $libres = DB::table('logs_usuarios')->where('is_exit', 1)->where('id_puerta', $puerta->id)->where('fecha', 'like', $today . '%')->count();
                        $ocupadoVis = DB::table('visitante_logs')->where('is_entry', 1)->where('id_puerta', $puerta->id)->where('fecha_registro', 'like', $today . '%')->count();
                        $libreVis = DB::table('visitante_logs')->where('is_exit', 1)->where('id_puerta', $puerta->id)->where('fecha_registro', 'like', $today . '%')->count();

                        $libre_total = $libres + $libreVis;
                        $ocupado_total = $ocupados + $ocupadoVis;
                        $cupoTotal = $cupoTotal + ($libre_total) - ($ocupado_total);
                        // $data = array_merge($data, array("id" => $puerta->id, "cupoTotal" => $cupoTotal , "libre_total" => $libre_total, "ocupado_total" => $ocupado_total));
                        array_push($data, ['id' => $puerta->id, 'domicilio' => $domicilio, 'cupoTotal' => $cupoTotal, 'libre_total' => $libre_total, 'ocupado_total' => $ocupado_total]);
                    }
                    

                        return view ('guardia.index_guardia')->with(compact('puertas', 'data'));
                    break; 
                default:                
                        return view ('login'); 
                    break;
            }
        }
    }
}
