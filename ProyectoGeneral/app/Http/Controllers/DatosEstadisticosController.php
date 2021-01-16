<?php

namespace App\Http\Controllers;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatosEstadisticosController extends Controller
{
    public function index()
    {

        $datosActuales = \DB::select('SELECT MONTH(Max(fecha)) as "mes", YEAR(Max(fecha)) as "anio" FROM registros');
        $auxMes = $datosActuales[0]->mes;
        $auxAnio = $datosActuales[0]->anio;

        switch ($auxMes) {
            case 1:
                $nombreMes = "Enero";
                break;
            case 2:
                $nombreMes = "Febrero";
                break;
            case 3:
                $nombreMes = "Marzo";
                break;
            case 4:
                $nombreMes = "Abril";
                break;
            case 5:
                $nombreMes = "Mayo";
                break;
            case 6:
                $nombreMes = "Junio";
                break;
            case 7:
                $nombreMes = "Julio";
                break;
            case 8:
                $nombreMes = "Agosto";
                break;
            case 9:
                $nombreMes = "Septiembre";
                break;
            case 10:
                $nombreMes = "Octubre";
                break;
            case 11:
                $nombreMes = "Noviembre";
                break;
            case 12:
                $nombreMes = "Diciembre";
                break;
        }

        //consulta para los datos del mes a mostrar
        $consulta = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros WHERE MONTH(fecha) = ".$auxMes;

        $datos = \DB::select($consulta);
        //consulta para los datos del mes anterior a mostrar
        $consultaAnterior = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros WHERE MONTH(fecha) = ".($auxMes-1);

        $datosAnterior = \DB::select($consultaAnterior);

        

        $huespedes = ($datos[0]->nacionales * 100)/ $datos[0]->checkins ;
        $arrHuespedes = [round($huespedes, 2), round(100 - $huespedes, 2)];
        
        //Cálculo de las tarifas por habitación
        $tarifaH = round( ($datos[0]->ventasNetas / $datos[0]->hab_ocupadas), 2) ;
        
        if(isset($datosAnterior[0]->hab_ocupadas)){
            $tarifaHAnterior = round( ($datosAnterior[0]->ventasNetas / $datosAnterior[0]->hab_ocupadas) , 2) ;
            $tarifaHVariacion = $tarifaH - $tarifaHAnterior;
        }else{
            $tarifaHVariacion = null;
        }
        
        
        if($tarifaHVariacion < 0){
            $tarifaHVariacion = $tarifaHVariacion*(-1);
            $arrTarifaH= [$tarifaH,  $tarifaHVariacion, false];
        }else{
            $arrTarifaH = [$tarifaH, $tarifaHVariacion, true];
        }
        
        //Cálculo de las tarifas por Persona
        $tarifaP = round( ($datos[0]->ventasNetas / $datos[0]->pernoctaciones), 2) ;

        if(isset($datosAnterior[0]->pernoctaciones)){
            $tarifaPAnterior = round( ($datosAnterior[0]->ventasNetas / $datosAnterior[0]->pernoctaciones) , 2) ;
            $tarifaPVariacion = $tarifaP - $tarifaPAnterior;
        }else{
            $tarifaPVariacion = null;
        }

        
        if($tarifaPVariacion < 0){
            $tarifaPVariacion = $tarifaPVariacion*(-1);
            $arrTarifaP= [$tarifaP,  $tarifaPVariacion, false];
        }else{
            $arrTarifaP = [$tarifaP, $tarifaPVariacion, true];
        }

        //Cálculo de la ocupación
        $ocupacion = round( ($datos[0]->hab_ocupadas / $datos[0]->hab_disponibles)*100 , 2) ;

        if(isset($datosAnterior[0]->hab_disponibles)){
            $ocupacionAnterior = round( ($datosAnterior[0]->hab_ocupadas / $datosAnterior[0]->hab_disponibles)*100 , 2) ;
            $ocupacionVariacion = $ocupacion - $ocupacionAnterior;
        }else{
            $ocupacionVariacion = null;
        }

        if($ocupacionVariacion < 0){
            $ocupacionVariacion = $ocupacionVariacion*(-1);
            $arrOcupacion = [$ocupacion,  $ocupacionVariacion, false];
        }else{
            $arrOcupacion = [$ocupacion, $ocupacionVariacion, true];
        }
        
        //Cálculo del revpar
        $revpar = round($datos[0]->ventasNetas / $datos[0]->hab_disponibles , 2) ;

        if(isset($datosAnterior[0]->hab_disponibles)){
            $revparAnterior = round( $datosAnterior[0]->ventasNetas / $datosAnterior[0]->hab_disponibles , 2) ;
            $revparVariacion = $revpar - $revparAnterior;
        }else{
            $revparVariacion = null;
        }
        
        if($revparVariacion < 0){
            $revparVariacion = $revparVariacion*(-1);
            $arrRevpar = [$revpar,  $revparVariacion, false];
        }else{
            $arrRevpar = [$revpar,  $revparVariacion, true];
        }

        //Cáñculo de la estadía promedio
        $estadiaP = round($datos[0]->pernoctaciones / $datos[0]->checkins, 2) ;

        if(isset($datosAnterior[0]->checkins)){
            $estadiaPAnterior = round( $datosAnterior[0]->pernoctaciones / $datosAnterior[0]->checkins , 2) ;
            $estadiaPVariacion = $estadiaP - $estadiaPAnterior;
        }else{
            $estadiaPVariacion = null;
        }
        
        if($estadiaPVariacion < 0){
            $estadiaPVariacion = $estadiaPVariacion*(-1);
            $arrEstadiaP = [$estadiaP,  $estadiaPVariacion, false];
        }else{
            $arrEstadiaP = [$estadiaP,  $estadiaPVariacion, true];
        }
        

        return view('datosEstadisticos')->with('arrHuespedes', $arrHuespedes)
                                        ->with('arrTarifaH', $arrTarifaH)
                                        ->with('arrTarifaP', $arrTarifaP)
                                        ->with('arrOcupacion', $arrOcupacion)
                                        ->with('arrRevpar', $arrRevpar)
                                        ->with('arrEstadiaP', $arrEstadiaP)
                                        ->with('mes', $auxMes)
                                        ->with('nombreMes', $nombreMes);
    }

    public function mostrar(Request $request)
    {
        switch ($request->mes) {
            case 1:
                $nombreMes = "Enero";
                break;
            case 2:
                $nombreMes = "Febrero";
                break;
            case 3:
                $nombreMes = "Marzo";
                break;
            case 4:
                $nombreMes = "Abril";
                break;
            case 5:
                $nombreMes = "Mayo";
                break;
            case 6:
                $nombreMes = "Junio";
                break;
            case 7:
                $nombreMes = "Julio";
                break;
            case 8:
                $nombreMes = "Agosto";
                break;
            case 9:
                $nombreMes = "Septiembre";
                break;
            case 10:
                $nombreMes = "Octubre";
                break;
            case 11:
                $nombreMes = "Noviembre";
                break;
            case 12:
                $nombreMes = "Diciembre";
                break;
        }
        
        //consulta para los datos del mes a mostrar
        $consulta = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles'
                            FROM registros WHERE MONTH(fecha) = $request->mes";

        $datos = \DB::select($consulta);
        //consulta para los datos del mes anterior a mostrar
        $consultaAnterior = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros WHERE MONTH(fecha) = ".($request->mes -1);

        $datosAnterior = \DB::select($consultaAnterior);
        
        $huespedes = ($datos[0]->nacionales * 100)/ $datos[0]->checkins ;
        $arrHuespedes = [round($huespedes, 2), round(100 - $huespedes, 2)];
        
        //Cálculo de las tarifas por habitación
        $tarifaH = round( ($datos[0]->ventasNetas / $datos[0]->hab_ocupadas), 2) ;

        if(isset($datosAnterior[0]->hab_ocupadas)){
            $tarifaHAnterior = round( ($datosAnterior[0]->ventasNetas / $datosAnterior[0]->hab_ocupadas) , 2) ;
            $tarifaHVariacion = $tarifaH - $tarifaHAnterior;
        }else{
            $tarifaHVariacion = null;
        }
        
        if($tarifaHVariacion < 0){
            $tarifaHVariacion = $tarifaHVariacion*(-1);
            $arrTarifaH= [$tarifaH,  $tarifaHVariacion, false];
        }else{
            $arrTarifaH = [$tarifaH, $tarifaHVariacion, true];
        }

        //Cálculo de las tarifas por Persona
        $tarifaP = round( ($datos[0]->ventasNetas / $datos[0]->pernoctaciones), 2) ;

        if(isset($datosAnterior[0]->pernoctaciones)){
            $tarifaPAnterior = round( ($datosAnterior[0]->ventasNetas / $datosAnterior[0]->pernoctaciones) , 2) ;
            $tarifaPVariacion = $tarifaP - $tarifaPAnterior;
        }else{
            $tarifaPVariacion = null;
        }
        
        if($tarifaPVariacion < 0){
            $tarifaPVariacion = $tarifaPVariacion*(-1);
            $arrTarifaP= [$tarifaP,  $tarifaPVariacion, false];
        }else{
            $arrTarifaP = [$tarifaP, $tarifaPVariacion, true];
        }
        
        //Cálculo de la ocupación
        $ocupacion = round( ($datos[0]->hab_ocupadas / $datos[0]->hab_disponibles)*100 , 2) ;

        if(isset($datosAnterior[0]->hab_disponibles)){
            $ocupacionAnterior = round( ($datosAnterior[0]->hab_ocupadas / $datosAnterior[0]->hab_disponibles)*100 , 2) ;
            $ocupacionVariacion = $ocupacion - $ocupacionAnterior;
        }else{
            $ocupacionVariacion = null;
        }
        
        if($ocupacionVariacion < 0){
            $ocupacionVariacion = $ocupacionVariacion*(-1);
            $arrOcupacion = [$ocupacion,  $ocupacionVariacion, false];
        }else{
            $arrOcupacion = [$ocupacion, $ocupacionVariacion, true];
        }
        
        //Cálculo del revpar
        $revpar = round($datos[0]->ventasNetas / $datos[0]->hab_disponibles , 2) ;

        if(isset($datosAnterior[0]->hab_disponibles)){
            $revparAnterior = round( $datosAnterior[0]->ventasNetas / $datosAnterior[0]->hab_disponibles , 2) ;
            $revparVariacion = $revpar - $revparAnterior;
        }else{
            $revparVariacion = null;
        }
        
        if($revparVariacion < 0){
            $revparVariacion = $revparVariacion*(-1);
            $arrRevpar = [$revpar,  $revparVariacion, false];
        }else{
            $arrRevpar = [$revpar,  $revparVariacion, true];
        }

        //Cáñculo de la estadía promedio
        $estadiaP = round($datos[0]->pernoctaciones / $datos[0]->checkins, 2) ;

        if(isset($datosAnterior[0]->checkins)){
            $estadiaPAnterior = round( $datosAnterior[0]->pernoctaciones / $datosAnterior[0]->checkins , 2) ;
            $estadiaPVariacion = $estadiaP - $estadiaPAnterior;
        }else{
            $estadiaPVariacion = null;
        }
        
        if($estadiaPVariacion < 0){
            $estadiaPVariacion = $estadiaPVariacion*(-1);
            $arrEstadiaP = [$estadiaP,  $estadiaPVariacion, false];
        }else{
            $arrEstadiaP = [$estadiaP,  $estadiaPVariacion, true];
        }

        
        return view('datosEstadisticos')->with('arrHuespedes', $arrHuespedes)
                                        ->with('arrTarifaH', $arrTarifaH)
                                        ->with('arrTarifaP', $arrTarifaP)
                                        ->with('arrOcupacion', $arrOcupacion)
                                        ->with('arrRevpar', $arrRevpar)
                                        ->with('arrEstadiaP', $arrEstadiaP)
                                        ->with('mes', $request->mes)
                                        ->with('nombreMes', $nombreMes);
    }

    public function all(Request $request)
    {
        $consulta = "SELECT fecha, 
                            SUM(habitaciones_ocupadas) as hab_ocupadas, 
                            SUM(habitaciones_disponibles) as  hab_disponibles 
                            FROM registros 
                            GROUP BY fecha 
                            HAVING MONTH(fecha) = ".$request->id;

        $datos = \DB::select($consulta);

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

}
