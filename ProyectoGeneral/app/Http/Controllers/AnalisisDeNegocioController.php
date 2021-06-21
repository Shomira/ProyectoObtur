<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalisisDeNegocioController extends Controller
{
    public function index()
    {
        if(!isset(Auth::user()->rol)){return redirect('login');}
        
        $idU = Auth::user()->id;
        $datosActuales = DB::select("SELECT distinct MONTH(Max(fecha)) as 'mes', YEAR(Max(fecha)) as 'anio' 
                                    FROM registros r, establecimientos e
                                    WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU");

        $auxMes = $datosActuales[0]->mes;
        $auxAnio = $datosActuales[0]->anio;

        $registros = DB::select("SELECT Min(fecha) as 'diaMin', Max(fecha) as 'diaMax'
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento 
                                    AND e.idUsuario = $idU 
                                    AND YEAR(fecha) = $auxAnio 
                                    AND MONTH(fecha) = $auxMes");

        $diaMin = $registros[0]->diaMin;
        $diaMax = $registros[0]->diaMax;

        return view('analisisDeNegocio')->with('diaMin',$diaMin)
                                        ->with('diaMax',$diaMax);
    }


    public function all(Request $request)
    {
        $idU = Auth::user()->id;

        if($request->estadistico == "Total"){
            $est = "SUM";
        }elseif($request->estadistico == "Promedio"){
            $est = "AVG";
        }elseif($request->estadistico == "Max"){
            $est = "MAX";
        }elseif($request->estadistico == "Min"){
            $est = "MIN";
        }

        $consulta = "SELECT WEEKDAY(fecha) as 'dia', 
                    ROUND($est(checkins), 2) as 'checkins',
                    ROUND($est(checkouts), 2) as 'checkouts',
                    ROUND($est(ventas_netas), 2) as 'ventas_netas',
                    ROUND($est(porcentaje_ocupacion), 2) as 'porcentaje_ocupacion',
                    ROUND($est(revpar), 2) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";
        
        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function desviacion(Request $request){
        $idU = Auth::user()->id;

        $consulta = "SELECT WEEKDAY(fecha), 
                    ROUND(STD(checkins), 2) as 'checkins',
                    ROUND(STD(checkouts), 2) as 'checkouts',
                    ROUND(STD(ventas_netas), 2) as 'ventas_netas',
                    ROUND(STD(porcentaje_ocupacion), 2) as 'porcentaje_ocupacion',
                    ROUND(STD(revpar), 2) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";
        
        $datos= DB::select($consulta);

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

}
