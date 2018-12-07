<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UsuarioCucei;
use App\LogsUsuarios;
use App\LogVisitante;
use App\Puerta;
use Config;

class CIAController extends Controller
{
  public function login(Request $request)
  {
    $data = [];
  //  $pass = Hash::make($request->password);
    $usuario = UsuarioCucei::where('id',$request->id_l)->where('password',$request->password)->get(); //first();


   if(!empty($usuario))
    {
      $data = [
                'data' => $usuario,
                'mensaje' => 'Usuario encontrado'
              ];
    }
    else
    {
      $data = [
                'data' => '',
                'mensaje' => 'Usuario no encontrado'
              ];
    }

    return response()->json($data);
  }

  public function spacesAvailables(Request $request)
  {
      $data = [];
      $today = date('Y-m-d');
      $cupoTotal = DB::table('puerta')->where('id', $request->id_l)->value('cupo');

      $ocupados = LogsUsuarios::where('is_entry',1)->where('id_puerta', $request->id_l)->where('fecha', 'like', $today.'%')->count();
      $libres = LogsUsuarios::where('is_exit',1)->where('id_puerta', $request->id_l)->where('fecha', 'like', $today.'%')->count();
      $ocupadoVis = LogVisitante::where('is_entry',1)->where('id_puerta', $request->id_l)->where('fecha_registro', 'like', $today.'%')->count();
      $libreVis = LogVisitante::where('is_exit',1)->where('id_puerta', $request->id_l)->where('fecha_registro', 'like', $today.'%')->count();

      $cupoTotal = $cupoTotal + ($libres+$libreVis) - ($ocupados+$ocupadoVis);


    $data = [
              'data' => $cupoTotal,
              'mensaje' => ''
    ];

    return response()->json($data);

  }
}
