<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VisualizarEstablecimientosController extends Controller
{
    public function index(Request $request)
    {
        $establecimientos = DB::table('establecimientos')
        ->select('establecimientos.*')
        ->orderBy('id','DESC')
        ->get();
        
        return view('visualizarEstablecimientos')->with('establecimientos', $establecimientos);
                              
    }



}
