<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){
        
        $categorias = DB::select("SELECT distinct categoria
                                    FROM establecimientos 
                                    ORDER BY categoria");


        $datosActuales = DB::select("SELECT distinct MONTH(Max(fecha)) as 'mes', YEAR(Max(fecha)) as 'anio' 
                                    FROM registros r, establecimientos e
                                    WHERE e.id = r.idEstablecimiento ");

        $auxMes = $datosActuales[0]->mes;
        $auxAnio = $datosActuales[0]->anio;
        
        //obtener todos los meses disponibles
        $mesesAnios = DB::select("SELECT distinct MONTH(fecha) as 'mes', YEAR(fecha) as 'anio' 
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento 
                                GROUP BY MONTH(fecha), YEAR(fecha)
                                ORDER BY YEAR(fecha) desc, MONTH(fecha) desc");
        
        if(empty($mesesAnios)){
            $meses[0] = array( 0 => "", 1 => 0) ;
            
        }
        
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
                                WHERE e.id = r.idEstablecimiento 
                                ORDER BY YEAR(fecha) desc");


        //año y mes de inicio 
        if($auxMes < 3){
            $mesInicio = $auxMes + 10;
            $anioInicio = $auxAnio - 1;
        }else{
            $mesInicio = $auxMes - 2;
            $anioInicio = $auxAnio - 1;
        }

        
        
        
        return view('welcome')->with('mesInicio',$mesInicio)
                                        ->with('categorias',$categorias)
                                        ->with('mesFin',$auxMes)
                                        ->with('anioInicio',$anioInicio)
                                        ->with('anioFin',$auxAnio)
                                        ->with('meses',$meses)
                                        ->with('anios',$anios)
                                        ->with('columna',"porcentaje_ocupacion");
        
    }

    public function all(Request $request){

        if($request->mesFin < 10){
            $fechaFin = $request->anioFin."-0".$request->mesFin."-31";
        }else{
            $fechaFin = $request->anioFin."-".$request->mesFin."-31";
        }

        if($request->mesInicio < 10){
            $fechaInicio = $request->anioInicio."-0".$request->mesInicio."-01";
        }else{
            $fechaInicio = $request->anioInicio."-".$request->mesInicio."-01";
        }

        if($request->ejeX == 1){

            if($request->categoria == "Todas"){

                $consulta = "SELECT  SUM(checkins) as 'checkins',
                                        SUM(checkouts) as 'checkouts',
                                        SUM(pernoctaciones) as 'pernoctaciones',
                                        SUM(nacionales) as 'nacionales',
                                        SUM(extranjeros) as 'extranjeros',
                                        SUM(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                        SUM(habitaciones_disponibles) as 'habitaciones_disponibles',
                                        (SUM(ventas_netas) / SUM(habitaciones_ocupadas)) as 'tarifa_promedio',
                                        (SUM(ventas_netas) / SUM(pernoctaciones)) as 'TAR_PER',
                                        SUM(ventas_netas) as 'ventas_netas',
                                        (SUM(habitaciones_ocupadas) / SUM(habitaciones_disponibles)) as 'porcentaje_ocupacion',
                                        (SUM(ventas_netas) / SUM(habitaciones_disponibles)) as 'revpar',
                                        MONTH(fecha) as 'mes',
                                        YEAR(fecha) as 'anio'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento 
                            AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin' 
                        GROUP BY MONTH(fecha), YEAR(fecha)
                        ORDER BY MAX(YEAR(fecha)), MONTH(fecha)";

            }else{

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
                                        SUM(revpar) as 'revpar',
                                        MONTH(fecha) as 'mes',
                                        YEAR(fecha) as 'anio'
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento 
                            AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin' AND categoria = '$request->categoria'
                        GROUP BY MONTH(fecha), YEAR(fecha)
                        ORDER BY MAX(YEAR(fecha)), MONTH(fecha)";

                
            }


        }else{

            if($request->categoria == "Todas"){

                $consulta = "SELECT  SUM(checkins) as 'checkins',
                                        SUM(checkouts) as 'checkouts',
                                        SUM(pernoctaciones) as 'pernoctaciones',
                                        SUM(nacionales) as 'nacionales',
                                        SUM(extranjeros) as 'extranjeros',
                                        SUM(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                        SUM(habitaciones_disponibles) as 'habitaciones_disponibles',
                                        (SUM(ventas_netas) / SUM(habitaciones_ocupadas)) as 'tarifa_promedio',
                                        (SUM(ventas_netas) / SUM(pernoctaciones)) as 'TAR_PER',
                                        SUM(ventas_netas) as 'ventas_netas',
                                        (SUM(habitaciones_ocupadas) / SUM(habitaciones_disponibles)) as 'porcentaje_ocupacion',
                                        (SUM(ventas_netas) / SUM(habitaciones_disponibles)) as 'revpar',
                                        fecha
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento 
                            AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin' 
                        GROUP BY fecha
                        ORDER BY fecha ";

            }else{

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
                                        SUM(revpar) as 'revpar',
                                        fecha
                        FROM registros r, establecimientos e
                        WHERE e.id = r.idEstablecimiento 
                            AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin' AND categoria = '$request->categoria'
                        GROUP BY fecha
                        ORDER BY fecha ";

                
            }


        }

        
        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function barra(Request $request){
        
        if($request->estadistico == "total"){
            
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
                                SUM(revpar) as 'revpar',
                                categoria
                FROM registros r, establecimientos e
                WHERE e.id = r.idEstablecimiento AND YEAR(fecha) = '$request->anio' 
                GROUP BY categoria
                ORDER BY categoria desc";

        }


        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');

    }

}
