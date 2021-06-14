<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ComparativasController extends Controller
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
        
        //obtener todos los meses disponibles
        $mesesAnios = DB::select("SELECT distinct MONTH(fecha) as 'mes', YEAR(fecha) as 'anio' 
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU
                                GROUP BY MONTH(fecha), YEAR(fecha)
                                ORDER BY YEAR(fecha) desc, MONTH(fecha) asc");
        
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
                                WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU
                                ORDER BY YEAR(fecha) desc");


        $registros = DB::select("SELECT Min(fecha) as 'diaMin', Max(fecha) as 'diaMax'
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento 
                                    AND e.idUsuario = $idU 
                                    AND YEAR(fecha) = $auxAnio 
                                    AND MONTH(fecha) = $auxMes");

        $diaMin = $registros[0]->diaMin;
        $diaMax = $registros[0]->diaMax;

        //año y mes de inicio 
        if($auxMes < 3){
            $mesInicio = $auxMes + 10;
            $anioInicio = $auxAnio - 1;
        }else{
            $mesInicio = $auxMes - 2;
            $anioInicio = $auxAnio;
        }

        // categoria del establecimiento
        $consultaAux = DB::select("SELECT e.categoria, c.nombre
                                    FROM establecimientos e, users u, cantons c 
                                    WHERE u.id = $idU AND u.id = e.idUsuario AND u.idCanton = c.id ");
    
        $categoria = $consultaAux[0]->categoria;
        $canton = $consultaAux[0]->nombre;

        return view('comparativas')->with('mesInicio',$mesInicio)
                                        ->with('mesFin',$auxMes)
                                        ->with('anioInicio',$anioInicio)
                                        ->with('anioFin',$auxAnio)
                                        ->with('meses',$meses)
                                        ->with('anios',$anios)
                                        ->with('diaMin',$diaMin)
                                        ->with('diaMax',$diaMax)
                                        ->with('categoria',$categoria)
                                        ->with('canton',$canton);

    }

    public function all(Request $request)
    {
        $idU = Auth::user()->id;

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
                    WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU 
                        AND fecha >= '$fechaInicio' AND fecha <= '$fechaFin'
                    GROUP BY MONTH(fecha), YEAR(fecha)
                    ORDER BY MAX(YEAR(fecha)), MONTH(fecha)";


        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function dias(Request $request)
    {
        $idU = Auth::user()->id;

        $consulta = "SELECT checkins,
                            checkouts,
                            pernoctaciones,
                            nacionales,
                            extranjeros,
                            habitaciones_ocupadas,
                            habitaciones_disponibles,
                            tarifa_promedio,
                            TAR_PER as 'tar_per',
                            ventas_netas,
                            porcentaje_ocupacion,
                            revpar, 
                            fecha 
                            FROM registros r, establecimientos e
                            WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU AND fecha >= '$request->inicio' AND fecha <= '$request->fin' ";
        
        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function meses(Request $request){
        $idU = Auth::user()->id;
        //obtener todos los meses disponibles
        $mesesAnios = DB::select("SELECT distinct MONTH(fecha) as 'mes', YEAR(fecha) as 'anio' 
                                FROM registros r, establecimientos e
                                WHERE e.id = r.idEstablecimiento AND e.idUsuario = $idU
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

    public function nuevaLinea(Request $request){

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
        
        if($request->estadistico == "total"){
            $est = "SUM";
        }elseif($request->estadistico == "prom"){
            $est = "AVG";
        }elseif($request->estadistico == "max"){
            $est = "MAX";
        }elseif($request->estadistico == "min"){
            $est = "MIN";
        }

        $idU = Auth::user()->id;
        $consultaAux = DB::select("SELECT e.categoria, c.id as 'canton', c.nombre
                                    FROM establecimientos e, users u, cantons c
                                    WHERE u.id = $idU AND u.id = e.idUsuario AND u.idCanton = c.id ");

        if($request->parametro == "categoria"){
            $valor = $consultaAux[0]->categoria;
            $condicion = " e.categoria = '$valor' AND ";
        }else{
            $valor = $consultaAux[0]->nombre;
            $auxiliar = $consultaAux[0]->canton;
            $condicion = " u.idCanton = '$auxiliar' AND ";
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
                                YEAR(fecha) as 'anio',
                                '$valor' as 'parametro'
                    FROM registros r, establecimientos e, users u
                    WHERE e.id = r.idEstablecimiento AND u.id = e.idUsuario AND  $condicion  
                        fecha >= '$fechaInicio' AND fecha <= '$fechaFin' 
                    GROUP BY MONTH(fecha), YEAR(fecha)
                    ORDER BY MAX(YEAR(fecha)), MONTH(fecha)";


        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

    public function nuevaLineaDias(Request $request){

        $idU = Auth::user()->id;
        $consultaAux = DB::select("SELECT e.categoria, c.id as 'canton', c.nombre
                                    FROM establecimientos e, users u, cantons c
                                    WHERE u.id = $idU AND u.id = e.idUsuario AND u.idCanton = c.id ");

        if($request->parametro == "categoria"){
            $valor = $consultaAux[0]->categoria;
            $condicion = " e.categoria = '$valor' AND ";
        }else{
            $valor = $consultaAux[0]->nombre;
            $auxiliar = $consultaAux[0]->canton;
            $condicion = " u.idCanton = '$auxiliar' AND ";
        }

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
                                AVG(revpar) as 'revpar',
                                fecha,
                                '$valor' as 'parametro'
                    FROM registros r, establecimientos e, users u
                    WHERE e.id = r.idEstablecimiento AND u.id = e.idUsuario AND  $condicion
                        fecha >= '$request->inicio' AND fecha <= '$request->fin'
                    GROUP BY fecha
                    ORDER BY fecha";


        $datos= DB::select($consulta);
        
        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

}
