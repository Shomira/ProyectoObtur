<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class VisualizarEstablecimientosController extends Controller
{
    public function index(Request $request)
    {
        $establecimientos = DB::table('establecimientos')
                                    ->select('establecimientos.*')
                                    ->orderBy('id','DESC')
                                    ->get();
        
        if(!isset(Auth::user()->rol)){return redirect('login');}
        
        if(Auth::user()->rol != 'Administrador'){return redirect('home');}
        return view('visualizarEstablecimientos')->with('establecimientos', $establecimientos);
                              
    }

}
