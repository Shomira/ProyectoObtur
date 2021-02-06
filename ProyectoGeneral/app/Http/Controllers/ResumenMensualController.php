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

            $consulta = "SELECT  SUM(checkins) as 'checkins',
                                SUM(checkouts) as 'checkouts',
                                SUM(pernoctaciones) as 'pernoctaciones',
                                SUM(nacionales) as 'nacionales',
                                SUM(extranjeros) as 'extranjeros',
                                SUM(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                SUM(habitaciones_disponibles) as 'habitaciones_disponibles',
                                SUM(tarifa_promedio) as 'tarifa_promedio',
                                SUM(TAR_PER) as 'tar_per',
                                SUM(ventas_netas) as 'ventas_netas',
                                SUM(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                SUM(revpar) as 'revpar'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                            AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";

        }elseif($request->estadistico == "Promedio"){

            $consulta = "SELECT  AVG(checkins) as 'checkins',
                                AVG(checkouts) as 'checkouts',
                                AVG(pernoctaciones) as 'pernoctaciones',
                                AVG(nacionales) as 'nacionales',
                                AVG(extranjeros) as 'extranjeros',
                                AVG(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                AVG(habitaciones_disponibles) as 'habitaciones_disponibles',
                                AVG(tarifa_promedio) as 'tarifa_promedio',
                                AVG(TAR_PER) as 'tar_per',
                                AVG(ventas_netas) as 'ventas_netas',
                                AVG(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                AVG(revpar) as 'revpar'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                            AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";


        }elseif($request->estadistico == "Max"){

            $consulta = "SELECT  MAX(checkins) as 'checkins',
                                MAX(checkouts) as 'checkouts',
                                MAX(pernoctaciones) as 'pernoctaciones',
                                MAX(nacionales) as 'nacionales',
                                MAX(extranjeros) as 'extranjeros',
                                MAX(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                MAX(habitaciones_disponibles) as 'habitaciones_disponibles',
                                MAX(tarifa_promedio) as 'tarifa_promedio',
                                MAX(TAR_PER) as 'tar_per',
                                MAX(ventas_netas) as 'ventas_netas',
                                MAX(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                MAX(revpar) as 'revpar'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                            AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";

        }elseif($request->estadistico == "Min"){

            $consulta = "SELECT  MIN(checkins) as 'checkins',
                                MIN(checkouts) as 'checkouts',
                                MIN(pernoctaciones) as 'pernoctaciones',
                                MIN(nacionales) as 'nacionales',
                                MIN(extranjeros) as 'extranjeros',
                                MIN(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                MIN(habitaciones_disponibles) as 'habitaciones_disponibles',
                                MIN(tarifa_promedio) as 'tarifa_promedio',
                                MIN(TAR_PER) as 'tar_per',
                                MIN(ventas_netas) as 'ventas_netas',
                                MIN(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                MIN(revpar) as 'revpar'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                            AND MONTH(fecha) = '$request->mes' AND YEAR(fecha) = '$request->anio' ";

        }
        

        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }
    
}
