<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResumenMensualController extends Controller
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


        $mesesAnios = DB::select("SELECT distinct MONTH(fecha) as 'mes', YEAR(fecha) as 'anio' 
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU
                                ORDER BY YEAR(fecha) desc, MONTH(fecha)desc");
        
        foreach ($mesesAnios as $key => $value) {
            
            switch ($value->mes) {
                case 1:
                    $meses[$key] = array( 0 => "Enero", 1 => 1) ;
                    break;
                case 2:
                    $meses[$key] = array( 0 => "Febrero", 1 => 2) ;
                    break;
                case 3:
                    $meses[$key] = array( 0 => "Marzo", 1 => 3) ;
                    break;
                case 4:
                    $meses[$key] = array( 0 => "Abril", 1 => 4) ;
                    break;
                case 5:
                    $meses[$key] = array( 0 => "Mayo", 1 => 5) ;
                    break;
                case 6:
                    $meses[$key] = array( 0 => "Junio", 1 => 6) ;
                    break;
                case 7:
                    $meses[$key] = array( 0 => "Julio", 1 => 7) ;
                    break;
                case 8:
                    $meses[$key] = array( 0 => "Agosto", 1 => 8) ;
                    break;
                case 9:
                    $meses[$key] = array( 0 => "Septiembre", 1 => 9) ;
                    break;
                case 10:
                    $meses[$key] = array( 0 => "Octubre", 1 => 10) ;
                    break;
                case 11:
                    $meses[$key] = array( 0 => "Noviembre", 1 => 11) ;
                    break;
                case 12:
                    $meses[$key] = array( 0 => "Diciembre", 1 => 12) ;
                    break;
                }

        }
        //obteniendo los años disponibles
        $anios = DB::select("SELECT distinct YEAR(fecha) as 'anio' 
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU
                                ORDER BY YEAR(fecha) desc");
        

        
        return view('resumenMensual')->with('meses',$meses)
                                        ->with('mesFin',$auxMes)
                                        ->with('anioFin',$auxAnio)
                                        ->with('anios',$anios);
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

        $consulta = "SELECT  ROUND($est(checkins), 2) as 'checkins',
                            ROUND(STD(checkins), 2) as 'desvcheckins',
                            ROUND($est(checkouts), 2) as 'checkouts',
                            ROUND($est(pernoctaciones), 2) as 'pernoctaciones',
                            ROUND($est(nacionales), 2) as 'nacionales',
                            ROUND($est(extranjeros), 2) as 'extranjeros',
                            ROUND($est(habitaciones_ocupadas), 2) as 'habitaciones_ocupadas',
                            ROUND($est(habitaciones_disponibles), 2) as 'habitaciones_disponibles',
                            ROUND($est(tarifa_promedio), 2) as 'tarifa_promedio',
                            ROUND($est(TAR_PER), 2) as 'tar_per',
                            ROUND($est(ventas_netas), 2) as 'ventas_netas',
                            ROUND($est(porcentaje_ocupacion), 2) as 'porcentaje_ocupacion',
                            ROUND($est(revpar), 2) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                        AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";


        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function desviacion(Request $request){
        $idU = Auth::user()->id;

        $consulta = "SELECT  ROUND(STD(checkins), 2) as 'checkins',
                            ROUND(STD(checkouts), 2) as 'checkouts',
                            ROUND(STD(pernoctaciones), 2) as 'pernoctaciones',
                            ROUND(STD(nacionales), 2) as 'nacionales',
                            ROUND(STD(extranjeros), 2) as 'extranjeros',
                            ROUND(STD(habitaciones_ocupadas), 2) as 'habitaciones_ocupadas',
                            ROUND(STD(habitaciones_disponibles), 2) as 'habitaciones_disponibles',
                            ROUND(STD(tarifa_promedio), 2) as 'tarifa_promedio',
                            ROUND(STD(TAR_PER), 2) as 'tar_per',
                            ROUND(STD(ventas_netas), 2) as 'ventas_netas',
                            ROUND(STD(porcentaje_ocupacion), 2) as 'porcentaje_ocupacion',
                            ROUND(STD(revpar), 2) as 'revpar'
                    FROM registros r, establecimientos e
                    WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                        AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";


        $datos= DB::select($consulta);

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }
    
}
