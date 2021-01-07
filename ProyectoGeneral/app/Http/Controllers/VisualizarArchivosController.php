<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;

class VisualizarArchivosController extends Controller
{
    public function index()
    {
        $establecimientos = \DB::table('establecimientos')
                    ->select('establecimientos.*')
                    ->orderBy('id','DESC')
                    ->get();

        $ultimaCaga = \DB::select('SELECT MONTH(Max(fecha)) as "mes", YEAR(Max(fecha)) as "anio" FROM registros');
        $auxMes = $ultimaCaga[0]->mes;
        $auxAnio = $ultimaCaga[0]->anio;
        $cadena = "SELECT * FROM registros WHERE MONTH(fecha) = ".$auxMes;

        $registros = \DB::select($cadena);
           
        if(Auth::user()->rol != 'Admin'){return redirect('home');}
        return view('visualizarArchivos')->with('establecimientos', $establecimientos)
                                        ->with('registros', $registros);
    }

    public function mostrar(Request $request){


        $establecimientos = \DB::table('establecimientos')
                    ->select('establecimientos.*')
                    ->orderBy('id','DESC')
                    ->get();

        $idestablecimientos = \DB::table('establecimientos')
                    ->select('establecimientos.id')
                    ->where('nombre','=', $request->nombre)
                    ->get();


        $registros = \DB::table('registros')
                    ->select('registros.*')
                    ->where('idEstablecimiento','=', $idestablecimientos[0]->id)
                    ->where('fecha','>', $request->inicio)
                    ->where('fecha','<', $request->fin)
                    ->get();
        

        return view('visualizarArchivos')->with('establecimientos', $establecimientos)
                                        ->with('registros', $registros);
    }
}
