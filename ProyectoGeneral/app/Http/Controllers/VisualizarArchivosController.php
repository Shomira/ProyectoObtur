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

        $ultimaCaga = \DB::select('SELECT DAY(Max(fecha)) as "dia", MONTH(Max(fecha)) as "mes", YEAR(Max(fecha)) as "anio" FROM registros');
        $auxDia = $ultimaCaga[0]->dia;
        $auxMes = $ultimaCaga[0]->mes;
        $auxAnio = $ultimaCaga[0]->anio;
        $cadena = "SELECT * FROM registros WHERE MONTH(fecha) = ".$auxMes;

        $registros = \DB::select($cadena);
        $mensaje = "Establecimiento: Todos.  Desde: 1-".$auxMes."-".$auxAnio." Hasta: ".$auxDia."-".$auxMes."-".$auxAnio;

        if(Auth::user()->rol != 'Admin'){return redirect('home');}
        return view('visualizarArchivos')->with('establecimientos', $establecimientos)
                                        ->with('registros', $registros)
                                        ->with('mensaje', $mensaje);
    }

    public function mostrar(Request $request){

        $establecimientos = \DB::table('establecimientos')
                        ->select('establecimientos.*')
                        ->orderBy('id','DESC')
                        ->get();

        if($request->nombre == "Todos"){

            $registros = \DB::table('registros')
                        ->select('registros.*')
                        ->where('fecha','>=', $request->inicio)
                        ->where('fecha','<=', $request->fin)
                        ->get();

        }else{

            $idestablecimientos = \DB::table('establecimientos')
                        ->select('establecimientos.id')
                        ->where('nombre','=', $request->nombre)
                        ->get();


            $registros = \DB::table('registros')
                        ->select('registros.*')
                        ->where('idEstablecimiento','=', $idestablecimientos[0]->id)
                        ->where('fecha','>=', $request->inicio)
                        ->where('fecha','<=', $request->fin)
                        ->get();
        }
        $mensaje = "Establecimiento: ".$request->nombre.".  Desde: 1-".$request->inicio." Hasta: ".$request->fin;

        return view('visualizarArchivos')->with('establecimientos', $establecimientos)
                                        ->with('registros', $registros)
                                        ->with('mensaje', $mensaje);
    }
}
