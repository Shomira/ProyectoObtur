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

            $consulta = "SELECT WEEKDAY(fecha), 
                    SUM(checkins) as 'checkins',
                    SUM(checkouts) as 'checkouts',
                    SUM(ventas_netas) as 'ventas_netas',
                    SUM(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                    SUM(revpar) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";

        }elseif($request->estadistico == "Promedio"){

            $consulta = "SELECT WEEKDAY(fecha), 
                    AVG(checkins) as 'checkins',
                    AVG(checkouts) as 'checkouts',
                    AVG(ventas_netas) as 'ventas_netas',
                    AVG(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                    AVG(revpar) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";

        }elseif($request->estadistico == "Max"){

            $consulta = "SELECT WEEKDAY(fecha), 
                    MAX(checkins) as 'checkins',
                    MAX(checkouts) as 'checkouts',
                    MAX(ventas_netas) as 'ventas_netas',
                    MAX(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                    MAX(revpar) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";

        }elseif($request->estadistico == "Min"){

            $consulta = "SELECT WEEKDAY(fecha), 
                    MIN(checkins) as 'checkins',
                    MIN(checkouts) as 'checkouts',
                    MIN(ventas_netas) as 'ventas_netas',
                    MIN(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                    MIN(revpar) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento 
                        AND e.idUsuario = $idU 
                        AND fecha >= '$request->inicio'
                        AND fecha <= '$request->fin'
                    GROUP BY WEEKDAY(fecha)
                    ORDER BY WEEKDAY(fecha)";

        }
        
        
        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }
}
