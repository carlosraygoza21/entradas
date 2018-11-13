<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
                        return view('admin.index_admin');
                    break;
                case '2':
                        return view ('guardia.index_guardia');
                    break; 
                default:
                        return view ('login'); 
                    break;
            }
        }
    }
}
