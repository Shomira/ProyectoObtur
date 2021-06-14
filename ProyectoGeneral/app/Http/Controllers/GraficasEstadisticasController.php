<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficasEstadisticasController extends Controller
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
                                ORDER BY YEAR(fecha) desc, MONTH(fecha) asc");
        
        if(empty($mesesAnios)){
            $meses[0] = array( 0 => "", 1 => 0) ;
            
        }
        
        foreach ($mesesAnios as $key => $value) {
            
            switch ($value->mes) {
                case 1:
                    $meses[$key] = array( 0 => "Enero", 1 => 1, 2 => $value->anio) ;
                    break;
                case 2:
                    $meses[$key] = array( 0 => "Febrero", 1 => 2, 2 => $value->anio) ;
                    break;
                case 3:
                    $meses[$key] = array( 0 => "Marzo", 1 => 3, 2 => $value->anio) ;
                    break;
                case 4:
                    $meses[$key] = array( 0 => "Abril", 1 => 4, 2 => $value->anio) ;
                    break;
                case 5:
                    $meses[$key] = array( 0 => "Mayo", 1 => 5, 2 => $value->anio) ;
                    break;
                case 6:
                    $meses[$key] = array( 0 => "Junio", 1 => 6, 2 => $value->anio) ;
                    break;
                case 7:
                    $meses[$key] = array( 0 => "Julio", 1 => 7, 2 => $value->anio) ;
                    break;
                case 8:
                    $meses[$key] = array( 0 => "Agosto", 1 => 8, 2 => $value->anio) ;
                    break;
                case 9:
                    $meses[$key] = array( 0 => "Septiembre", 1 => 9, 2 => $value->anio) ;
                    break;
                case 10:
                    $meses[$key] = array( 0 => "Octubre", 1 => 10, 2 => $value->anio) ;
                    break;
                case 11:
                    $meses[$key] = array( 0 => "Noviembre", 1 => 11, 2 => $value->anio) ;
                    break;
                case 12:
                    $meses[$key] = array( 0 => "Diciembre", 1 => 12, 2 => $value->anio) ;
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

        
        
        
        return view('graficasEstadisticas')->with('mesInicio',$mesInicio)
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
            $group = " MONTH(fecha), YEAR(fecha) ";
        }else{
            $group = "fecha";
        }

        if($request->categoria == "Todas"){
            $condicionCategoria = "";
        }else{
            $condicionCategoria = " AND categoria = '$request->categoria'";
        }

        if($request->estadistico == "total"){
            $est = "SUM";
        }elseif($request->estadistico == "prom"){
            $est = "AVG";
        }elseif($request->estadistico == "max"){
            $est = "MAX";
        }elseif($request->estadistico == "min"){
            $est = "MIN";
        }

        $consulta = "SELECT  $est(checkins) as 'checkins',
                                $est(checkouts) as 'checkouts',
                                $est(pernoctaciones) as 'pernoctaciones',
                                $est(nacionales) as 'nacionales',
                                $est(extranjeros) as 'extranjeros',
                                $est(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                $est(habitaciones_disponibles) as 'habitaciones_disponibles',
                                $est(tarifa_promedio) as 'tarifa_promedio',
                                $est(TAR_PER) as 'tar_per',
                                $est(ventas_netas) as 'ventas_netas',
                                $est(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                $est(revpar) as 'revpar',
                                MONTH(fecha) as 'mes',
                                YEAR(fecha) as 'anio'
                FROM registros r, establecimientos e
                WHERE e.id = r.idEstablecimiento 
                    AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin' $condicionCategoria
                GROUP BY $group
                ORDER BY MAX(YEAR(fecha)), MONTH(fecha)";
        
        
        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function barra(Request $request){

        if($request->estadistico == "total"){
            $est = "SUM";
        }elseif($request->estadistico == "prom"){
            $est = "AVG";
        }elseif($request->estadistico == "max"){
            $est = "MAX";
        }elseif($request->estadistico == "min"){
            $est = "MIN";
        }
        

        $consulta = "SELECT  $est(checkins) as 'checkins',
                                $est(checkouts) as 'checkouts',
                                $est(pernoctaciones) as 'pernoctaciones',
                                $est(nacionales) as 'nacionales',
                                $est(extranjeros) as 'extranjeros',
                                $est(habitaciones_ocupadas) as 'habitaciones_ocupadas',
                                $est(habitaciones_disponibles) as 'habitaciones_disponibles',
                                $est(tarifa_promedio) as 'tarifa_promedio',
                                $est(TAR_PER) as 'tar_per',
                                $est(ventas_netas) as 'ventas_netas',
                                $est(porcentaje_ocupacion) as 'porcentaje_ocupacion',
                                $est(revpar) as 'revpar',
                                categoria
                FROM registros r, establecimientos e
                WHERE e.id = r.idEstablecimiento AND YEAR(fecha) = '$request->anio' 
                GROUP BY categoria
                ORDER BY categoria desc";

        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');

    }

    public function meses(Request $request){
        
        //obtener todos los meses disponibles
        $mesesAnios = DB::select("SELECT distinct MONTH(fecha) as 'mes', YEAR(fecha) as 'anio' 
                                FROM registros 
                                ORDER BY MONTH(fecha)");
        
        foreach ($mesesAnios as $key => $value) {
            
            switch ($value->mes) {
                case 1:
                    $meses[$key] = array( 0 => "Enero", 1 => 1, 2 => $value->anio) ;
                    break;
                case 2:
                    $meses[$key] = array( 0 => "Febrero", 1 => 2, 2 => $value->anio) ;
                    break;
                case 3:
                    $meses[$key] = array( 0 => "Marzo", 1 => 3, 2 => $value->anio) ;
                    break;
                case 4:
                    $meses[$key] = array( 0 => "Abril", 1 => 4, 2 => $value->anio) ;
                    break;
                case 5:
                    $meses[$key] = array( 0 => "Mayo", 1 => 5, 2 => $value->anio) ;
                    break;
                case 6:
                    $meses[$key] = array( 0 => "Junio", 1 => 6, 2 => $value->anio) ;
                    break;
                case 7:
                    $meses[$key] = array( 0 => "Julio", 1 => 7, 2 => $value->anio) ;
                    break;
                case 8:
                    $meses[$key] = array( 0 => "Agosto", 1 => 8, 2 => $value->anio) ;
                    break;
                case 9:
                    $meses[$key] = array( 0 => "Septiembre", 1 => 9, 2 => $value->anio) ;
                    break;
                case 10:
                    $meses[$key] = array( 0 => "Octubre", 1 => 10, 2 => $value->anio) ;
                    break;
                case 11:
                    $meses[$key] = array( 0 => "Noviembre", 1 => 11, 2 => $value->anio) ;
                    break;
                case 12:
                    $meses[$key] = array( 0 => "Diciembre", 1 => 12, 2 => $value->anio) ;
                    break;
                }

        }
        return response(json_encode($meses), 200)->header('Content-type', 'text/plain');
    }

}
