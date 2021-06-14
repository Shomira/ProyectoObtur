<?php

namespace App\Http\Controllers;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndicadoresAlojamientoController extends Controller
{
    public function index()
    {

        $datosActuales = \DB::select('SELECT MONTH(Max(fecha)) as "mes", YEAR(Max(fecha)) as "anio" FROM registros');
        $auxMes = $datosActuales[0]->mes;
        $auxAnio = $datosActuales[0]->anio;
        //Cálculo de los años disponibles
        $anios = \DB::select('SELECT distinct YEAR(fecha) as "anio" FROM registros ORDER BY anio desc');
        

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
        $consulta = "SELECT e.categoria,
                            SUM(ventas_netas) as ventasNetas, 
                            SUM(pernoctaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(extranjeros) as 'extranjeros', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros r, establecimientos e
                            WHERE MONTH(fecha) = $auxMes AND YEAR(fecha) = $auxAnio AND r.idEstablecimiento = e.id
                            GROUP BY e.categoria
                            ORDER BY e.categoria";
        
        $datos = \DB::select($consulta);
        
        foreach ($datos as $v) {
            
            if($v->categoria == "5 Estrellas"){
                $datos5Est = $v;
            }
            if($v->categoria == "4 Estrellas"){
                $datos4Est = $v;
            }
            if($v->categoria == "3 Estrellas"){
                $datos3Est = $v;
            }
            if($v->categoria == "2 Estrellas"){
                $datos2Est = $v;
            }
            if($v->categoria == "1 Estrella"){
                $datos1Est = $v;
            }
        }
        
        //escogo las variables para el filtro del mes anterior 
        if($auxMes == 1){
            $mesAnterior = 12;
            $anioAnterior = $auxAnio -1;
        }else{
            $mesAnterior = $auxMes -1;
            $anioAnterior = $auxAnio;
        }
        
        //consulta para los datos del mes anterior a mostrar
        $consultaAnterior = "SELECT e.categoria,
                            SUM(ventas_netas) as ventasNetas, 
                            SUM(pernoctaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros r, establecimientos e
                            WHERE MONTH(fecha) = $mesAnterior AND YEAR(fecha) = $anioAnterior AND r.idEstablecimiento = e.id
                            GROUP BY e.categoria
                            ORDER BY e.categoria";

        $datosAnterior = \DB::select($consultaAnterior);

        foreach ($datosAnterior as $v) {
            
            if($v->categoria == "5 Estrellas"){
                $datos5EstAnterior = $v;
            }
            if($v->categoria == "4 Estrellas"){
                $datos4EstAnterior = $v;
            }
            if($v->categoria == "3 Estrellas"){
                $datos3EstAnterior = $v;
            }
            if($v->categoria == "2 Estrellas"){
                $datos2EstAnterior = $v;
            }
            if($v->categoria == "1 Estrella"){
                $datos2EstAnterior = $v;
            }
        }
        
        
        /*
            Cálculo para 5 estrellas
        */
        
        if(isset($datos5Est)){

            //Cálculo huespedes
            $huespedes5Est = ($datos5Est->nacionales * 100)/ ($datos5Est->nacionales + $datos5Est->extranjeros)  ;
            $arrHuespedes5Est = [round($huespedes5Est, 2), round(100 - $huespedes5Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH5Est = round( ($datos5Est->ventasNetas / $datos5Est->hab_ocupadas), 2) ;
            
            if(isset($datos5EstAnterior->hab_ocupadas)){
                $tarifaHAnterior5Est = round( ($datos5EstAnterior->ventasNetas / $datos5EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion5Est = round(  $tarifaH5Est - $tarifaHAnterior5Est , 2);
                
                if($tarifaHVariacion5Est < 0){
                    $tarifaHVariacion5Est = $tarifaHVariacion5Est*(-1);
                    $arrTarifaH5Est = [$tarifaH5Est,  $tarifaHVariacion5Est, 1];
                }elseif($tarifaHVariacion5Est > 0){
                    $arrTarifaH5Est = [$tarifaH5Est, $tarifaHVariacion5Est, 2];
                }else{
                    $arrTarifaH5Est = [$tarifaH5Est, 0, 3];
                }
            }else{
                $arrTarifaH5Est = [$tarifaH5Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP5Est = round( ($datos5Est->ventasNetas / $datos5Est->pernoctaciones), 2) ;

            if(isset($datos5EstAnterior->pernoctaciones)){
                $tarifaPAnterior5Est = round( ($datos5EstAnterior->ventasNetas / $datos5EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion5Est = $tarifaP5Est - $tarifaPAnterior5Est;

                if($tarifaPVariacion5Est < 0){
                    $tarifaPVariacion5Est = $tarifaPVariacion5Est*(-1);
                    $arrTarifaP5Est = [$tarifaP5Est,  $tarifaPVariacion5Est, 1];
                }elseif($tarifaPVariacion5Est > 0){
                    $arrTarifaP5Est = [$tarifaP5Est, $tarifaPVariacion5Est, 2];
                }else{
                    $arrTarifaP5Est = [$tarifaP5Est, 0, 3];
                }
            }else{
                $arrTarifaP5Est = [$tarifaP5Est, 0 , null];
            }
            
            //Cálculo de la ocupación
            $ocupacion5Est = round( ($datos5Est->hab_ocupadas / $datos5Est->hab_disponibles)*100 , 2) ;

            if(isset($datos5EstAnterior->hab_disponibles)){
                $ocupacionAnterior5Est = round( ($datos5EstAnterior->hab_ocupadas / $datos5EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion5Est = $ocupacion5Est - $ocupacionAnterior5Est;

                if($ocupacionVariacion5Est < 0){
                    $ocupacionVariacion5Est = $ocupacionVariacion5Est*(-1);
                    $arrOcupacion5Est = [$ocupacion5Est,  $ocupacionVariacion5Est, 1];
                }elseif($ocupacionVariacion5Est > 0){
                    $arrOcupacion5Est = [$ocupacion5Est, $ocupacionVariacion5Est, 2];
                }else{
                    $arrOcupacion5Est = [$ocupacion5Est, 0, 3];
                }
            }else{
                $arrOcupacion5Est = [$ocupacion5Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar5Est = round($datos5Est->ventasNetas / $datos5Est->hab_disponibles , 2) ;

            if(isset($datos5EstAnterior->hab_disponibles)){
                $revparAnterior5Est = round( $datos5EstAnterior->ventasNetas / $datos5EstAnterior->hab_disponibles , 2) ;
                $revparVariacion5Est = $revpar5Est - $revparAnterior5Est;

                if($revparVariacion5Est < 0){
                    $revparVariacion5Est = $revparVariacion5Est*(-1);
                    $arrRevpar5Est = [$revpar5Est,  $revparVariacion5Est, 1];
                }elseif($revparVariacion5Est > 0){
                    $arrRevpar5Est = [$revpar5Est,  $revparVariacion5Est, 2];
                }else{
                    $arrRevpar5Est = [$revpar5Est,  0, 3];
                }
            }else{
                $arrRevpar5Est = [$revpar5Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP5Est = round($datos5Est->pernoctaciones / $datos5Est->checkins, 2);

            if(isset($datos5EstAnterior->checkins)){
                $estadiaPAnterior5Est = round( $datos5EstAnterior->pernoctaciones / $datos5EstAnterior->checkins , 2) ;
                $estadiaPVariacion5Est = $estadiaP5Est - $estadiaPAnterior5Est;

                if($estadiaPVariacion5Est < 0){
                    $estadiaPVariacion5Est = $estadiaPVariacion5Est*(-1);
                    $arrEstadiaP5Est = [$estadiaP5Est,  $estadiaPVariacion5Est, 1];
                }elseif($estadiaPVariacion5Est > 0){
                    $arrEstadiaP5Est = [$estadiaP5Est,  $estadiaPVariacion5Est, 2];
                }else{
                    $arrEstadiaP5Est = [$estadiaP5Est,  0, 3];
                }
            }else{
                $arrEstadiaP5Est = [$estadiaP5Est,  0, null];
            }
            
            
            
        }else{
            $arrHuespedes5Est = [0, 0];
            $arrTarifaH5Est = ['S/R', '', null];
            $arrTarifaP5Est = ['S/R', '', null];
            $arrOcupacion5Est = ['S/R', '', null];
            $arrRevpar5Est = ['S/R', '', null];
            $arrEstadiaP5Est = ['S/R', '', null];
        }


        /*
            Cálculo para 4 estrellas
        */
        if(isset($datos4Est)){

            //Cálculo huespedes
            $huespedes4Est = ($datos4Est->nacionales * 100)/ ($datos4Est->nacionales + $datos4Est->extranjeros) ;
            $arrHuespedes4Est = [round($huespedes4Est, 2), round(100 - $huespedes4Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH4Est = round( ($datos4Est->ventasNetas / $datos4Est->hab_ocupadas), 2) ;
        
            if(isset($datos4EstAnterior->hab_ocupadas)){
                $tarifaHAnterior4Est = round( ($datos4EstAnterior->ventasNetas / $datos4EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion4Est = $tarifaH4Est - $tarifaHAnterior4Est;

                if($tarifaHVariacion4Est < 0){
                    $tarifaHVariacion4Est = $tarifaHVariacion4Est*(-1);
                    $arrTarifaH4Est = [$tarifaH4Est,  $tarifaHVariacion4Est, 1];
                }elseif($tarifaHVariacion4Est > 0){
                    $arrTarifaH4Est = [$tarifaH4Est, $tarifaHVariacion4Est, 2];
                }else{
                    $arrTarifaH4Est = [$tarifaH4Est, 0, 3];
                }
            }else{
                $arrTarifaH4Est = [$tarifaH4Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP4Est = round( ($datos4Est->ventasNetas / $datos4Est->pernoctaciones), 2) ;

            if(isset($datos4EstAnterior->pernoctaciones)){
                $tarifaPAnterior4Est = round( ($datos4EstAnterior->ventasNetas / $datos4EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion4Est = $tarifaP4Est - $tarifaPAnterior4Est;
                if($tarifaPVariacion4Est < 0){
                    $tarifaPVariacion4Est = $tarifaPVariacion4Est*(-1);
                    $arrTarifaP4Est = [$tarifaP4Est,  $tarifaPVariacion4Est, 1];
                }elseif($tarifaPVariacion4Est > 0){
                    $arrTarifaP4Est = [$tarifaP4Est, $tarifaPVariacion4Est, 2];
                }else{
                    $arrTarifaP4Est = [$tarifaP4Est, 0, 3];
                }
            }else{
                $arrTarifaP4Est = [$tarifaP4Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion4Est = round( ($datos4Est->hab_ocupadas / $datos4Est->hab_disponibles)*100 , 2) ;

            if(isset($datos4EstAnterior->hab_disponibles)){
                $ocupacionAnterior4Est = round( ($datos4EstAnterior->hab_ocupadas / $datos4EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion4Est = $ocupacion4Est - $ocupacionAnterior4Est;
                if($ocupacionVariacion4Est < 0){
                    $ocupacionVariacion4Est = $ocupacionVariacion4Est*(-1);
                    $arrOcupacion4Est = [$ocupacion4Est,  $ocupacionVariacion4Est, 1];
                }elseif($ocupacionVariacion4Est > 0){
                    $arrOcupacion4Est = [$ocupacion4Est, $ocupacionVariacion4Est, 2];
                }else{
                    $arrOcupacion4Est = [$ocupacion4Est, 0, 3];
                }
            }else{
                $arrOcupacion4Est = [$ocupacion4Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar4Est = round($datos4Est->ventasNetas / $datos4Est->hab_disponibles , 2) ;

            if(isset($datos4EstAnterior->hab_disponibles)){
                $revparAnterior4Est = round( $datos4EstAnterior->ventasNetas / $datos4EstAnterior->hab_disponibles , 2) ;
                $revparVariacion4Est = $revpar4Est - $revparAnterior4Est;
                if($revparVariacion4Est < 0){
                    $revparVariacion4Est = $revparVariacion4Est*(-1);
                    $arrRevpar4Est = [$revpar4Est,  $revparVariacion4Est, 1];
                }elseif($revparVariacion4Est > 0){
                    $arrRevpar4Est = [$revpar4Est,  $revparVariacion4Est, 2];
                }else{
                    $arrRevpar4Est = [$revpar4Est,  0, 3];
                }
            }else{
                $arrRevpar4Est = [$revpar4Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP4Est = round($datos4Est->pernoctaciones / $datos4Est->checkins, 2) ;

            if(isset($datos4EstAnterior->checkins)){
                $estadiaPAnterior4Est = round( $datos4EstAnterior->pernoctaciones / $datos4EstAnterior->checkins , 2) ;
                $estadiaPVariacion4Est = $estadiaP4Est - $estadiaPAnterior4Est;
                if($estadiaPVariacion4Est < 0){
                    $estadiaPVariacion4Est = $estadiaPVariacion4Est*(-1);
                    $arrEstadiaP4Est = [$estadiaP4Est,  $estadiaPVariacion4Est, 1];
                }elseif($estadiaPVariacion4Est > 0){
                    $arrEstadiaP4Est = [$estadiaP4Est,  $estadiaPVariacion4Est, 2];
                }else{
                    $arrEstadiaP4Est = [$estadiaP4Est,  0, 3];
                }
            }else{
                $arrEstadiaP4Est = [$estadiaP4Est,  0, null];
            }
            
        }else{
            $arrHuespedes4Est = [0, 0];
            $arrTarifaH4Est = ['S/R', '', null];
            $arrTarifaP4Est = ['S/R', '', null];
            $arrOcupacion4Est = ['S/R', '', null];
            $arrRevpar4Est = ['S/R', '', null];
            $arrEstadiaP4Est = ['S/R', '', null];
        }


        /*
            Cálculo para 3 estrellas
        */
        
        if(isset($datos3Est)){

            //Cálculo huespedes
            $huespedes3Est = ($datos3Est->nacionales * 100)/ ($datos3Est->nacionales + $datos3Est->extranjeros) ;
            $arrHuespedes3Est = [round($huespedes3Est, 2), round(100 - $huespedes3Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH3Est = round( ($datos3Est->ventasNetas / $datos3Est->hab_ocupadas), 2) ;
            
            if(isset($datos3EstAnterior->hab_ocupadas)){
                $tarifaHAnterior3Est = round( ($datos3EstAnterior->ventasNetas / $datos3EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion3Est = $tarifaH3Est - $tarifaHAnterior3Est;
                if($tarifaHVariacion3Est < 0){
                    $tarifaHVariacion3Est = $tarifaHVariacion3Est*(-1);
                    $arrTarifaH3Est = [$tarifaH3Est,  $tarifaHVariacion3Est, 1];
                }elseif($tarifaHVariacion3Est > 0){
                    $arrTarifaH3Est = [$tarifaH3Est, $tarifaHVariacion3Est, 2];
                }else{
                    $arrTarifaH3Est = [$tarifaH3Est, 0, 3];
                }
            }else{
                
                $arrTarifaH3Est = [$tarifaH3Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP3Est = round( ($datos3Est->ventasNetas / $datos3Est->pernoctaciones), 2) ;

            if(isset($datos3EstAnterior->pernoctaciones)){
                $tarifaPAnterior3Est = round( ($datos3EstAnterior->ventasNetas / $datos3EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion3Est = $tarifaP3Est - $tarifaPAnterior3Est;
                if($tarifaPVariacion3Est < 0){
                    $tarifaPVariacion3Est = $tarifaPVariacion3Est*(-1);
                    $arrTarifaP3Est = [$tarifaP3Est,  $tarifaPVariacion3Est, 1];
                }elseif($tarifaPVariacion3Est > 0){
                    $arrTarifaP3Est = [$tarifaP3Est, $tarifaPVariacion3Est, 2];
                }else{
                    $arrTarifaP3Est = [$tarifaP3Est, 0, 3];
                }
            }else{
                $arrTarifaP3Est = [$tarifaP3Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion3Est = round( ($datos3Est->hab_ocupadas / $datos3Est->hab_disponibles)*100 , 2) ;

            if(isset($datos3EstAnterior->hab_disponibles)){
                $ocupacionAnterior3Est = round( ($datos3EstAnterior->hab_ocupadas / $datos3EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion3Est = $ocupacion3Est - $ocupacionAnterior3Est;
                if($ocupacionVariacion3Est < 0){
                    $ocupacionVariacion3Est = $ocupacionVariacion3Est*(-1);
                    $arrOcupacion3Est = [$ocupacion3Est,  $ocupacionVariacion3Est, 1];
                }elseif($ocupacionVariacion3Est > 0){
                    $arrOcupacion3Est = [$ocupacion3Est, $ocupacionVariacion3Est, 2];
                }else{
                    $arrOcupacion3Est = [$ocupacion3Est, 0, 3];
                }
            }else{
                $arrOcupacion3Est = [$ocupacion3Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar3Est = round($datos3Est->ventasNetas / $datos3Est->hab_disponibles , 2) ;

            if(isset($datos3EstAnterior->hab_disponibles)){
                $revparAnterior3Est = round( $datos3EstAnterior->ventasNetas / $datos3EstAnterior->hab_disponibles , 2) ;
                $revparVariacion3Est = $revpar3Est - $revparAnterior3Est;
                if($revparVariacion3Est < 0){
                    $revparVariacion3Est = $revparVariacion3Est*(-1);
                    $arrRevpar3Est = [$revpar3Est,  $revparVariacion3Est, 1];
                }elseif($revparVariacion3Est > 0){
                    $arrRevpar3Est = [$revpar3Est,  $revparVariacion3Est, 2];
                }else{
                    $arrRevpar3Est = [$revpar3Est,  0, 3];
                }
            }else{
                $arrRevpar3Est = [$revpar3Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP3Est = round($datos3Est->pernoctaciones / $datos3Est->checkins, 2) ;

            if(isset($datos3EstAnterior->checkins)){
                $estadiaPAnterior3Est = round( $datos3EstAnterior->pernoctaciones / $datos3EstAnterior->checkins , 2) ;
                $estadiaPVariacion3Est = $estadiaP3Est - $estadiaPAnterior3Est;
                if($estadiaPVariacion3Est < 0){
                    $estadiaPVariacion3Est = $estadiaPVariacion3Est*(-1);
                    $arrEstadiaP3Est = [$estadiaP3Est,  $estadiaPVariacion3Est, 1];
                }elseif($estadiaPVariacion3Est > 0){
                    $arrEstadiaP3Est = [$estadiaP3Est,  $estadiaPVariacion3Est, 2];
                }else{
                    $arrEstadiaP3Est = [$estadiaP3Est,  0, 3];
                }
            }else{
                $arrEstadiaP3Est = [$estadiaP3Est,  0, null];
            }
            
        }else{
            $arrHuespedes3Est = [0, 0];
            $arrTarifaH3Est = ['S/R', '', null];
            $arrTarifaP3Est = ['S/R', '', null];
            $arrOcupacion3Est = ['S/R', '', null];
            $arrRevpar3Est = ['S/R', '', null];
            $arrEstadiaP3Est = ['S/R', '', null];
        }


        
        /*
            Cálculo para 2 estrellas
        */
        if(isset($datos2Est)){

            //Cálculo huespedes
            $huespedes2Est = ($datos2Est->nacionales * 100)/ ($datos2Est->nacionales + $datos2Est->extranjeros);
            $arrHuespedes2Est = [round($huespedes2Est, 2), round(100 - $huespedes2Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH2Est = round( ($datos2Est->ventasNetas / $datos2Est->hab_ocupadas), 2) ;
        
            if(isset($datos2EstAnterior->hab_ocupadas)){
                $tarifaHAnterior2Est = round( ($datos2EstAnterior->ventasNetas / $datos2EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion2Est = $tarifaH2Est - $tarifaHAnterior2Est;

                if($tarifaHVariacion2Est < 0){
                    $tarifaHVariacion2Est = $tarifaHVariacion2Est*(-1);
                    $arrTarifaH2Est = [$tarifaH2Est,  $tarifaHVariacion2Est, 1];
                }elseif($tarifaHVariacion2Est > 0){
                    $arrTarifaH2Est = [$tarifaH2Est, $tarifaHVariacion2Est, 2];
                }else{
                    $arrTarifaH2Est = [$tarifaH2Est, 0, 3];
                }
            }else{
                $arrTarifaH2Est = [$tarifaH2Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP2Est = round( ($datos2Est->ventasNetas / $datos2Est->pernoctaciones), 2) ;

            if(isset($datos2EstAnterior->pernoctaciones)){
                $tarifaPAnterior2Est = round( ($datos2EstAnterior->ventasNetas / $datos2EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion2Est = $tarifaP2Est - $tarifaPAnterior2Est;
                if($tarifaPVariacion2Est < 0){
                    $tarifaPVariacion2Est = $tarifaPVariacion2Est*(-1);
                    $arrTarifaP2Est = [$tarifaP2Est,  $tarifaPVariacion2Est, 1];
                }elseif($tarifaPVariacion2Est > 0){
                    $arrTarifaP2Est = [$tarifaP2Est, $tarifaPVariacion2Est, 2];
                }else{
                    $arrTarifaP2Est = [$tarifaP2Est, 0, 3];
                }
            }else{
                $arrTarifaP2Est = [$tarifaP2Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion2Est = round( ($datos2Est->hab_ocupadas / $datos2Est->hab_disponibles)*100 , 2) ;

            if(isset($datos2EstAnterior->hab_disponibles)){
                $ocupacionAnterior2Est = round( ($datos2EstAnterior->hab_ocupadas / $datos2EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion2Est = $ocupacion2Est - $ocupacionAnterior2Est;
                if($ocupacionVariacion2Est < 0){
                    $ocupacionVariacion2Est = $ocupacionVariacion2Est*(-1);
                    $arrOcupacion2Est = [$ocupacion2Est,  $ocupacionVariacion2Est, 1];
                }elseif($ocupacionVariacion2Est > 0){
                    $arrOcupacion2Est = [$ocupacion2Est, $ocupacionVariacion2Est, 2];
                }else{
                    $arrOcupacion2Est = [$ocupacion2Est, 0, 3];
                }
            }else{
                $arrOcupacion2Est = [$ocupacion2Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar2Est = round($datos2Est->ventasNetas / $datos2Est->hab_disponibles , 2) ;

            if(isset($datos2EstAnterior->hab_disponibles)){
                $revparAnterior2Est = round( $datos2EstAnterior->ventasNetas / $datos2EstAnterior->hab_disponibles , 2) ;
                $revparVariacion2Est = $revpar2Est - $revparAnterior2Est;
                if($revparVariacion2Est < 0){
                    $revparVariacion2Est = $revparVariacion2Est*(-1);
                    $arrRevpar2Est = [$revpar2Est,  $revparVariacion2Est, 1];
                }elseif($revparVariacion2Est > 0){
                    $arrRevpar2Est = [$revpar2Est,  $revparVariacion2Est, 2];
                }else{
                    $arrRevpar2Est = [$revpar2Est,  0, 3];
                }
            }else{
                $arrRevpar2Est = [$revpar2Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP2Est = round($datos2Est->pernoctaciones / $datos2Est->checkins, 2) ;

            if(isset($datos2EstAnterior->checkins)){
                $estadiaPAnterior2Est = round( $datos2EstAnterior->pernoctaciones / $datos2EstAnterior->checkins , 2) ;
                $estadiaPVariacion2Est = $estadiaP2Est - $estadiaPAnterior2Est;
                if($estadiaPVariacion2Est < 0){
                    $estadiaPVariacion2Est = $estadiaPVariacion2Est*(-1);
                    $arrEstadiaP2Est = [$estadiaP2Est,  $estadiaPVariacion2Est, 1];
                }elseif($estadiaPVariacion2Est > 0){
                    $arrEstadiaP2Est = [$estadiaP2Est,  $estadiaPVariacion2Est, 2];
                }else{
                    $arrEstadiaP2Est = [$estadiaP2Est,  0, 3];
                }
            }else{
                $arrEstadiaP2Est = [$estadiaP2Est,  0, null];
            }
            
        }else{
            $arrHuespedes2Est = [0, 0];
            $arrTarifaH2Est = ['S/R', '', null];
            $arrTarifaP2Est = ['S/R', '', null];
            $arrOcupacion2Est = ['S/R', '', null];
            $arrRevpar2Est = ['S/R', '', null];
            $arrEstadiaP2Est = ['S/R', '', null];
        }



        /*
            Cálculo para 1 estrellas
        */
        if(isset($datos1Est)){

            //Cálculo huespedes
            $huespedes1Est = ($datos1Est->nacionales * 100)/ ($datos1Est->nacionales + $datos1Est->extranjeros);
            $arrHuespedes1Est = [round($huespedes1Est, 2), round(100 - $huespedes1Est, 2)];
            dd(isset($datos1Est));
            //Cálculo de las tarifas por habitación
            $tarifaH1Est = round( ($datos1Est->ventasNetas / $datos1Est->hab_ocupadas), 2) ;
        
            if(isset($datos1EstAnterior->hab_ocupadas)){
                $tarifaHAnterior1Est = round( ($datos1EstAnterior->ventasNetas / $datos1EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion1Est = $tarifaH1Est - $tarifaHAnterior1Est;

                if($tarifaHVariacion1Est < 0){
                    $tarifaHVariacion1Est = $tarifaHVariacion1Est*(-1);
                    $arrTarifaH1Est = [$tarifaH1Est,  $tarifaHVariacion1Est, 1];
                }elseif($tarifaHVariacion1Est > 0){
                    $arrTarifaH1Est = [$tarifaH1Est, $tarifaHVariacion1Est, 2];
                }else{
                    $arrTarifaH1Est = [$tarifaH1Est, 0, 3];
                }
            }else{
                $arrTarifaH1Est = [$tarifaH1Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP1Est = round( ($datos1Est->ventasNetas / $datos1Est->pernoctaciones), 2) ;

            if(isset($datos1EstAnterior->pernoctaciones)){
                $tarifaPAnterior1Est = round( ($datos1EstAnterior->ventasNetas / $datos1EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion1Est = $tarifaP1Est - $tarifaPAnterior1Est;
                if($tarifaPVariacion1Est < 0){
                    $tarifaPVariacion1Est = $tarifaPVariacion1Est*(-1);
                    $arrTarifaP1Est = [$tarifaP1Est,  $tarifaPVariacion1Est, 1];
                }elseif($tarifaPVariacion1Est > 0){
                    $arrTarifaP1Est = [$tarifaP1Est, $tarifaPVariacion1Est, 2];
                }else{
                    $arrTarifaP1Est = [$tarifaP1Est, 0, 3];
                }
            }else{
                $arrTarifaP1Est = [$tarifaP1Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion1Est = round( ($datos1Est->hab_ocupadas / $datos1Est->hab_disponibles)*100 , 2) ;

            if(isset($datos1EstAnterior->hab_disponibles)){
                $ocupacionAnterior1Est = round( ($datos1EstAnterior->hab_ocupadas / $datos1EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion1Est = $ocupacion1Est - $ocupacionAnterior1Est;
                if($ocupacionVariacion1Est < 0){
                    $ocupacionVariacion1Est = $ocupacionVariacion1Est*(-1);
                    $arrOcupacion1Est = [$ocupacion1Est,  $ocupacionVariacion1Est, 1];
                }elseif($ocupacionVariacion1Est > 0){
                    $arrOcupacion1Est = [$ocupacion1Est, $ocupacionVariacion1Est, 2];
                }else{
                    $arrOcupacion1Est = [$ocupacion1Est, 0, 3];
                }
            }else{
                $arrOcupacion1Est = [$ocupacion1Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar1Est = round($datos1Est->ventasNetas / $datos1Est->hab_disponibles , 2) ;

            if(isset($datos1EstAnterior->hab_disponibles)){
                $revparAnterior1Est = round( $datos1EstAnterior->ventasNetas / $datos1EstAnterior->hab_disponibles , 2) ;
                $revparVariacion1Est = $revpar1Est - $revparAnterior1Est;
                if($revparVariacion1Est < 0){
                    $revparVariacion1Est = $revparVariacion1Est*(-1);
                    $arrRevpar1Est = [$revpar1Est,  $revparVariacion1Est, 1];
                }elseif($revparVariacion1Est > 0){
                    $arrRevpar1Est = [$revpar1Est,  $revparVariacion1Est, 2];
                }else{
                    $arrRevpar1Est = [$revpar1Est,  0, 3];
                }
            }else{
                $arrRevpar1Est = [$revpar1Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP1Est = round($datos1Est->pernoctaciones / $datos1Est->checkins, 2) ;

            if(isset($datos1EstAnterior->checkins)){
                $estadiaPAnterior1Est = round( $datos1EstAnterior->pernoctaciones / $datos1EstAnterior->checkins , 2) ;
                $estadiaPVariacion1Est = $estadiaP1Est - $estadiaPAnterior1Est;
                if($estadiaPVariacion1Est < 0){
                    $estadiaPVariacion1Est = $estadiaPVariacion1Est*(-1);
                    $arrEstadiaP1Est = [$estadiaP1Est,  $estadiaPVariacion1Est, 1];
                }elseif($estadiaPVariacion1Est > 0){
                    $arrEstadiaP1Est = [$estadiaP1Est,  $estadiaPVariacion1Est, 2];
                }else{
                    $arrEstadiaP1Est = [$estadiaP1Est,  0, 3];
                }
            }else{
                $arrEstadiaP1Est = [$estadiaP1Est,  0, null];
            }
            
        }else{
            $arrHuespedes1Est = [0, 0];
            $arrTarifaH1Est = ['S/R', '', null];
            $arrTarifaP1Est = ['S/R', '', null];
            $arrOcupacion1Est = ['S/R', '', null];
            $arrRevpar1Est = ['S/R', '', null];
            $arrEstadiaP1Est = ['S/R', '', null];
        }

        
        
        return view('indicadoresAlojamiento')->with('arrHuespedes5Est', $arrHuespedes5Est)
                                        ->with('arrTarifaH5Est', $arrTarifaH5Est)
                                        ->with('arrTarifaP5Est', $arrTarifaP5Est)
                                        ->with('arrOcupacion5Est', $arrOcupacion5Est)
                                        ->with('arrRevpar5Est', $arrRevpar5Est)
                                        ->with('arrEstadiaP5Est', $arrEstadiaP5Est)
                                        ->with('arrHuespedes4Est', $arrHuespedes4Est)
                                        ->with('arrTarifaH4Est', $arrTarifaH4Est)
                                        ->with('arrTarifaP4Est', $arrTarifaP4Est)
                                        ->with('arrOcupacion4Est', $arrOcupacion4Est)
                                        ->with('arrRevpar4Est', $arrRevpar4Est)
                                        ->with('arrEstadiaP4Est', $arrEstadiaP4Est)
                                        ->with('arrHuespedes3Est', $arrHuespedes3Est)
                                        ->with('arrTarifaH3Est', $arrTarifaH3Est)
                                        ->with('arrTarifaP3Est', $arrTarifaP3Est)
                                        ->with('arrOcupacion3Est', $arrOcupacion3Est)
                                        ->with('arrRevpar3Est', $arrRevpar3Est)
                                        ->with('arrEstadiaP3Est', $arrEstadiaP3Est)
                                        ->with('arrHuespedes2Est', $arrHuespedes2Est)
                                        ->with('arrTarifaH2Est', $arrTarifaH2Est)
                                        ->with('arrTarifaP2Est', $arrTarifaP2Est)
                                        ->with('arrOcupacion2Est', $arrOcupacion2Est)
                                        ->with('arrRevpar2Est', $arrRevpar2Est)
                                        ->with('arrEstadiaP2Est', $arrEstadiaP2Est)
                                        ->with('arrHuespedes1Est', $arrHuespedes1Est)
                                        ->with('arrTarifaH1Est', $arrTarifaH1Est)
                                        ->with('arrTarifaP1Est', $arrTarifaP1Est)
                                        ->with('arrOcupacion1Est', $arrOcupacion1Est)
                                        ->with('arrRevpar1Est', $arrRevpar1Est)
                                        ->with('arrEstadiaP1Est', $arrEstadiaP1Est)
                                        ->with('mes', $auxMes)
                                        ->with('anio', $auxAnio)
                                        ->with('nombreMes', $nombreMes)
                                        ->with('anios', $anios);
    }

    public function mostrar(Request $request)
    {
        //Cálculo de los años disponibles
        $anios = \DB::select('SELECT distinct YEAR(fecha) as "anio" FROM registros ORDER BY anio desc');

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
        $consulta = "SELECT e.categoria,
                            SUM(ventas_netas) as ventasNetas, 
                            SUM(pernoctaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(extranjeros) as 'extranjeros',
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros r, establecimientos e
                            WHERE MONTH(fecha) = $request->mes AND YEAR(fecha) = $request->anio AND r.idEstablecimiento = e.id
                            GROUP BY e.categoria
                            ORDER BY e.categoria";
        
        $datos = \DB::select($consulta);


        foreach ($datos as $v) {
            
            if($v->categoria == "5 Estrellas"){
                $datos5Est = $v;
            }
            if($v->categoria == "4 Estrellas"){
                $datos4Est = $v;
            }
            if($v->categoria == "3 Estrellas"){
                $datos3Est = $v;
            }
            if($v->categoria == "2 Estrellas"){
                $datos2Est = $v;
            }
            if($v->categoria == "1 Estrella"){
                $datos1Est = $v;
            }
        }
        
        //escogo las variables para el filtro del mes anterior 
        if($request->mes == 1){
            $mesAnterior = 12;
            $anioAnterior = $request->anio -1;
        }else{
            $mesAnterior = $request->mes -1;
            $anioAnterior = $request->anio;
        }
        
        //consulta para los datos del mes anterior a mostrar
        $consultaAnterior = "SELECT e.categoria,
                            SUM(ventas_netas) as ventasNetas, 
                            SUM(pernoctaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros r, establecimientos e
                            WHERE MONTH(fecha) = $mesAnterior AND YEAR(fecha) = $anioAnterior AND r.idEstablecimiento = e.id
                            GROUP BY e.categoria
                            ORDER BY e.categoria";

        $datosAnterior = \DB::select($consultaAnterior);

        foreach ($datosAnterior as $v) {
            
            if($v->categoria == "5 Estrellas"){
                $datos5EstAnterior = $v;
            }
            if($v->categoria == "4 Estrellas"){
                $datos4EstAnterior = $v;
            }
            if($v->categoria == "3 Estrellas"){
                $datos3EstAnterior = $v;
            }
            if($v->categoria == "2 Estrellas"){
                $datos2EstAnterior = $v;
            }
            if($v->categoria == "1 Estrella"){
                $datos1EstAnterior = $v;
            }
        }



        
        /*
            Cálculo para 5 estrellas
        */
        
        if(isset($datos5Est)){

            //Cálculo huespedes
            $huespedes5Est = ($datos5Est->nacionales * 100)/ ($datos5Est->nacionales + $datos5Est->extranjeros)  ;
            $arrHuespedes5Est = [round($huespedes5Est, 2), round(100 - $huespedes5Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH5Est = round( ($datos5Est->ventasNetas / $datos5Est->hab_ocupadas), 2) ;
            
            if(isset($datos5EstAnterior->hab_ocupadas)){
                $tarifaHAnterior5Est = round( ($datos5EstAnterior->ventasNetas / $datos5EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion5Est = $tarifaH5Est - $tarifaHAnterior5Est;

                if($tarifaHVariacion5Est < 0){
                    $tarifaHVariacion5Est = $tarifaHVariacion5Est*(-1);
                    $arrTarifaH5Est = [$tarifaH5Est,  $tarifaHVariacion5Est, 1];
                }elseif($tarifaHVariacion5Est > 0){
                    $arrTarifaH5Est = [$tarifaH5Est, $tarifaHVariacion5Est, 2];
                }else{
                    $arrTarifaH5Est = [$tarifaH5Est, 0, 3];
                }
            }else{
                $arrTarifaH5Est = [$tarifaH5Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP5Est = round( ($datos5Est->ventasNetas / $datos5Est->pernoctaciones), 2) ;

            if(isset($datos5EstAnterior->pernoctaciones)){
                $tarifaPAnterior5Est = round( ($datos5EstAnterior->ventasNetas / $datos5EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion5Est = $tarifaP5Est - $tarifaPAnterior5Est;

                if($tarifaPVariacion5Est < 0){
                    $tarifaPVariacion5Est = $tarifaPVariacion5Est*(-1);
                    $arrTarifaP5Est = [$tarifaP5Est,  $tarifaPVariacion5Est, 1];
                }elseif($tarifaPVariacion5Est > 0){
                    $arrTarifaP5Est = [$tarifaP5Est, $tarifaPVariacion5Est, 2];
                }else{
                    $arrTarifaP5Est = [$tarifaP5Est, 0, 3];
                }
            }else{
                $arrTarifaP5Est = [$tarifaP5Est, 0 , null];
            }
            
            //Cálculo de la ocupación
            $ocupacion5Est = round( ($datos5Est->hab_ocupadas / $datos5Est->hab_disponibles)*100 , 2) ;

            if(isset($datos5EstAnterior->hab_disponibles)){
                $ocupacionAnterior5Est = round( ($datos5EstAnterior->hab_ocupadas / $datos5EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion5Est = $ocupacion5Est - $ocupacionAnterior5Est;

                if($ocupacionVariacion5Est < 0){
                    $ocupacionVariacion5Est = $ocupacionVariacion5Est*(-1);
                    $arrOcupacion5Est = [$ocupacion5Est,  $ocupacionVariacion5Est, 1];
                }elseif($ocupacionVariacion5Est > 0){
                    $arrOcupacion5Est = [$ocupacion5Est, $ocupacionVariacion5Est, 2];
                }else{
                    $arrOcupacion5Est = [$ocupacion5Est, 0, 3];
                }
            }else{
                $arrOcupacion5Est = [$ocupacion5Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar5Est = round($datos5Est->ventasNetas / $datos5Est->hab_disponibles , 2) ;

            if(isset($datos5EstAnterior->hab_disponibles)){
                $revparAnterior5Est = round( $datos5EstAnterior->ventasNetas / $datos5EstAnterior->hab_disponibles , 2) ;
                $revparVariacion5Est = $revpar5Est - $revparAnterior5Est;

                if($revparVariacion5Est < 0){
                    $revparVariacion5Est = $revparVariacion5Est*(-1);
                    $arrRevpar5Est = [$revpar5Est,  $revparVariacion5Est, 1];
                }elseif($revparVariacion5Est > 0){
                    $arrRevpar5Est = [$revpar5Est,  $revparVariacion5Est, 2];
                }else{
                    $arrRevpar5Est = [$revpar5Est,  0, 3];
                }
            }else{
                $arrRevpar5Est = [$revpar5Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP5Est = round($datos5Est->pernoctaciones / $datos5Est->checkins, 2);

            if(isset($datos5EstAnterior->checkins)){
                $estadiaPAnterior5Est = round( $datos5EstAnterior->pernoctaciones / $datos5EstAnterior->checkins , 2) ;
                $estadiaPVariacion5Est = $estadiaP5Est - $estadiaPAnterior5Est;

                if($estadiaPVariacion5Est < 0){
                    $estadiaPVariacion5Est = $estadiaPVariacion5Est*(-1);
                    $arrEstadiaP5Est = [$estadiaP5Est,  $estadiaPVariacion5Est, 1];
                }elseif($estadiaPVariacion5Est > 0){
                    $arrEstadiaP5Est = [$estadiaP5Est,  $estadiaPVariacion5Est, 2];
                }else{
                    $arrEstadiaP5Est = [$estadiaP5Est,  0, 3];
                }
            }else{
                $arrEstadiaP5Est = [$estadiaP5Est,  0, null];
            }
            
            
            
        }else{
            $arrHuespedes5Est = [0, 0];
            $arrTarifaH5Est = ['S/R', '', null];
            $arrTarifaP5Est = ['S/R', '', null];
            $arrOcupacion5Est = ['S/R', '', null];
            $arrRevpar5Est = ['S/R', '', null];
            $arrEstadiaP5Est = ['S/R', '', null];
        }


        /*
            Cálculo para 4 estrellas
        */
        if(isset($datos4Est)){

            //Cálculo huespedes
            $huespedes4Est = ($datos4Est->nacionales * 100)/ ($datos4Est->nacionales + $datos4Est->extranjeros) ;
            $arrHuespedes4Est = [round($huespedes4Est, 2), round(100 - $huespedes4Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH4Est = round( ($datos4Est->ventasNetas / $datos4Est->hab_ocupadas), 2) ;
        
            if(isset($datos4EstAnterior->hab_ocupadas)){
                $tarifaHAnterior4Est = round( ($datos4EstAnterior->ventasNetas / $datos4EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion4Est = $tarifaH4Est - $tarifaHAnterior4Est;

                if($tarifaHVariacion4Est < 0){
                    $tarifaHVariacion4Est = $tarifaHVariacion4Est*(-1);
                    $arrTarifaH4Est = [$tarifaH4Est,  $tarifaHVariacion4Est, 1];
                }elseif($tarifaHVariacion4Est > 0){
                    $arrTarifaH4Est = [$tarifaH4Est, $tarifaHVariacion4Est, 2];
                }else{
                    $arrTarifaH4Est = [$tarifaH4Est, 0, 3];
                }
            }else{
                $arrTarifaH4Est = [$tarifaH4Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP4Est = round( ($datos4Est->ventasNetas / $datos4Est->pernoctaciones), 2) ;

            if(isset($datos4EstAnterior->pernoctaciones)){
                $tarifaPAnterior4Est = round( ($datos4EstAnterior->ventasNetas / $datos4EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion4Est = $tarifaP4Est - $tarifaPAnterior4Est;
                if($tarifaPVariacion4Est < 0){
                    $tarifaPVariacion4Est = $tarifaPVariacion4Est*(-1);
                    $arrTarifaP4Est = [$tarifaP4Est,  $tarifaPVariacion4Est, 1];
                }elseif($tarifaPVariacion4Est > 0){
                    $arrTarifaP4Est = [$tarifaP4Est, $tarifaPVariacion4Est, 2];
                }else{
                    $arrTarifaP4Est = [$tarifaP4Est, 0, 3];
                }
            }else{
                $arrTarifaP4Est = [$tarifaP4Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion4Est = round( ($datos4Est->hab_ocupadas / $datos4Est->hab_disponibles)*100 , 2) ;

            if(isset($datos4EstAnterior->hab_disponibles)){
                $ocupacionAnterior4Est = round( ($datos4EstAnterior->hab_ocupadas / $datos4EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion4Est = $ocupacion4Est - $ocupacionAnterior4Est;
                if($ocupacionVariacion4Est < 0){
                    $ocupacionVariacion4Est = $ocupacionVariacion4Est*(-1);
                    $arrOcupacion4Est = [$ocupacion4Est,  $ocupacionVariacion4Est, 1];
                }elseif($ocupacionVariacion4Est > 0){
                    $arrOcupacion4Est = [$ocupacion4Est, $ocupacionVariacion4Est, 2];
                }else{
                    $arrOcupacion4Est = [$ocupacion4Est, 0, 3];
                }
            }else{
                $arrOcupacion4Est = [$ocupacion4Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar4Est = round($datos4Est->ventasNetas / $datos4Est->hab_disponibles , 2) ;

            if(isset($datos4EstAnterior->hab_disponibles)){
                $revparAnterior4Est = round( $datos4EstAnterior->ventasNetas / $datos4EstAnterior->hab_disponibles , 2) ;
                $revparVariacion4Est = $revpar4Est - $revparAnterior4Est;
                if($revparVariacion4Est < 0){
                    $revparVariacion4Est = $revparVariacion4Est*(-1);
                    $arrRevpar4Est = [$revpar4Est,  $revparVariacion4Est, 1];
                }elseif($revparVariacion4Est > 0){
                    $arrRevpar4Est = [$revpar4Est,  $revparVariacion4Est, 2];
                }else{
                    $arrRevpar4Est = [$revpar4Est,  0, 3];
                }
            }else{
                $arrRevpar4Est = [$revpar4Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP4Est = round($datos4Est->pernoctaciones / $datos4Est->checkins, 2) ;

            if(isset($datos4EstAnterior->checkins)){
                $estadiaPAnterior4Est = round( $datos4EstAnterior->pernoctaciones / $datos4EstAnterior->checkins , 2) ;
                $estadiaPVariacion4Est = $estadiaP4Est - $estadiaPAnterior4Est;
                if($estadiaPVariacion4Est < 0){
                    $estadiaPVariacion4Est = $estadiaPVariacion4Est*(-1);
                    $arrEstadiaP4Est = [$estadiaP4Est,  $estadiaPVariacion4Est, 1];
                }elseif($estadiaPVariacion4Est > 0){
                    $arrEstadiaP4Est = [$estadiaP4Est,  $estadiaPVariacion4Est, 2];
                }else{
                    $arrEstadiaP4Est = [$estadiaP4Est,  0, 3];
                }
            }else{
                $arrEstadiaP4Est = [$estadiaP4Est,  0, null];
            }
            
        }else{
            $arrHuespedes4Est = [0, 0];
            $arrTarifaH4Est = ['S/R', '', null];
            $arrTarifaP4Est = ['S/R', '', null];
            $arrOcupacion4Est = ['S/R', '', null];
            $arrRevpar4Est = ['S/R', '', null];
            $arrEstadiaP4Est = ['S/R', '', null];
        }


        /*
            Cálculo para 3 estrellas
        */
        
        if(isset($datos3Est)){

            //Cálculo huespedes
            $huespedes3Est = ($datos3Est->nacionales * 100)/ ($datos3Est->nacionales + $datos3Est->extranjeros) ;
            $arrHuespedes3Est = [round($huespedes3Est, 2), round(100 - $huespedes3Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH3Est = round( ($datos3Est->ventasNetas / $datos3Est->hab_ocupadas), 2) ;
            
            if(isset($datos3EstAnterior->hab_ocupadas)){
                $tarifaHAnterior3Est = round( ($datos3EstAnterior->ventasNetas / $datos3EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion3Est = $tarifaH3Est - $tarifaHAnterior3Est;
                if($tarifaHVariacion3Est < 0){
                    $tarifaHVariacion3Est = $tarifaHVariacion3Est*(-1);
                    $arrTarifaH3Est = [$tarifaH3Est,  $tarifaHVariacion3Est, 1];
                }elseif($tarifaHVariacion3Est > 0){
                    $arrTarifaH3Est = [$tarifaH3Est, $tarifaHVariacion3Est, 2];
                }else{
                    $arrTarifaH3Est = [$tarifaH3Est, 0, 3];
                }
            }else{
                
                $arrTarifaH3Est = [$tarifaH3Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP3Est = round( ($datos3Est->ventasNetas / $datos3Est->pernoctaciones), 2) ;

            if(isset($datos3EstAnterior->pernoctaciones)){
                $tarifaPAnterior3Est = round( ($datos3EstAnterior->ventasNetas / $datos3EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion3Est = $tarifaP3Est - $tarifaPAnterior3Est;
                if($tarifaPVariacion3Est < 0){
                    $tarifaPVariacion3Est = $tarifaPVariacion3Est*(-1);
                    $arrTarifaP3Est = [$tarifaP3Est,  $tarifaPVariacion3Est, 1];
                }elseif($tarifaPVariacion3Est > 0){
                    $arrTarifaP3Est = [$tarifaP3Est, $tarifaPVariacion3Est, 2];
                }else{
                    $arrTarifaP3Est = [$tarifaP3Est, 0, 3];
                }
            }else{
                $arrTarifaP3Est = [$tarifaP3Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion3Est = round( ($datos3Est->hab_ocupadas / $datos3Est->hab_disponibles)*100 , 2) ;

            if(isset($datos3EstAnterior->hab_disponibles)){
                $ocupacionAnterior3Est = round( ($datos3EstAnterior->hab_ocupadas / $datos3EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion3Est = $ocupacion3Est - $ocupacionAnterior3Est;
                if($ocupacionVariacion3Est < 0){
                    $ocupacionVariacion3Est = $ocupacionVariacion3Est*(-1);
                    $arrOcupacion3Est = [$ocupacion3Est,  $ocupacionVariacion3Est, 1];
                }elseif($ocupacionVariacion3Est > 0){
                    $arrOcupacion3Est = [$ocupacion3Est, $ocupacionVariacion3Est, 2];
                }else{
                    $arrOcupacion3Est = [$ocupacion3Est, 0, 3];
                }
            }else{
                $arrOcupacion3Est = [$ocupacion3Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar3Est = round($datos3Est->ventasNetas / $datos3Est->hab_disponibles , 2) ;

            if(isset($datos3EstAnterior->hab_disponibles)){
                $revparAnterior3Est = round( $datos3EstAnterior->ventasNetas / $datos3EstAnterior->hab_disponibles , 2) ;
                $revparVariacion3Est = $revpar3Est - $revparAnterior3Est;
                if($revparVariacion3Est < 0){
                    $revparVariacion3Est = $revparVariacion3Est*(-1);
                    $arrRevpar3Est = [$revpar3Est,  $revparVariacion3Est, 1];
                }elseif($revparVariacion3Est > 0){
                    $arrRevpar3Est = [$revpar3Est,  $revparVariacion3Est, 2];
                }else{
                    $arrRevpar3Est = [$revpar3Est,  0, 3];
                }
            }else{
                $arrRevpar3Est = [$revpar3Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP3Est = round($datos3Est->pernoctaciones / $datos3Est->checkins, 2) ;

            if(isset($datos3EstAnterior->checkins)){
                $estadiaPAnterior3Est = round( $datos3EstAnterior->pernoctaciones / $datos3EstAnterior->checkins , 2) ;
                $estadiaPVariacion3Est = $estadiaP3Est - $estadiaPAnterior3Est;
                if($estadiaPVariacion3Est < 0){
                    $estadiaPVariacion3Est = $estadiaPVariacion3Est*(-1);
                    $arrEstadiaP3Est = [$estadiaP3Est,  $estadiaPVariacion3Est, 1];
                }elseif($estadiaPVariacion3Est > 0){
                    $arrEstadiaP3Est = [$estadiaP3Est,  $estadiaPVariacion3Est, 2];
                }else{
                    $arrEstadiaP3Est = [$estadiaP3Est,  0, 3];
                }
            }else{
                $arrEstadiaP3Est = [$estadiaP3Est,  0, null];
            }
            
        }else{
            $arrHuespedes3Est = [0, 0];
            $arrTarifaH3Est = ['S/R', '', null];
            $arrTarifaP3Est = ['S/R', '', null];
            $arrOcupacion3Est = ['S/R', '', null];
            $arrRevpar3Est = ['S/R', '', null];
            $arrEstadiaP3Est = ['S/R', '', null];
        }




        /*
            Cálculo para 2 estrellas
        */
        if(isset($datos2Est)){

            //Cálculo huespedes
            $huespedes2Est = ($datos2Est->nacionales * 100)/ ($datos2Est->nacionales + $datos2Est->extranjeros);
            $arrHuespedes2Est = [round($huespedes2Est, 2), round(100 - $huespedes2Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH2Est = round( ($datos2Est->ventasNetas / $datos2Est->hab_ocupadas), 2) ;
        
            if(isset($datos2EstAnterior->hab_ocupadas)){
                $tarifaHAnterior2Est = round( ($datos2EstAnterior->ventasNetas / $datos2EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion2Est = $tarifaH2Est - $tarifaHAnterior2Est;

                if($tarifaHVariacion2Est < 0){
                    $tarifaHVariacion2Est = $tarifaHVariacion2Est*(-1);
                    $arrTarifaH2Est = [$tarifaH2Est,  $tarifaHVariacion2Est, 1];
                }elseif($tarifaHVariacion2Est > 0){
                    $arrTarifaH2Est = [$tarifaH2Est, $tarifaHVariacion2Est, 2];
                }else{
                    $arrTarifaH2Est = [$tarifaH2Est, 0, 3];
                }
            }else{
                $arrTarifaH2Est = [$tarifaH2Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP2Est = round( ($datos2Est->ventasNetas / $datos2Est->pernoctaciones), 2) ;

            if(isset($datos2EstAnterior->pernoctaciones)){
                $tarifaPAnterior2Est = round( ($datos2EstAnterior->ventasNetas / $datos2EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion2Est = $tarifaP2Est - $tarifaPAnterior2Est;
                if($tarifaPVariacion2Est < 0){
                    $tarifaPVariacion2Est = $tarifaPVariacion2Est*(-1);
                    $arrTarifaP2Est = [$tarifaP2Est,  $tarifaPVariacion2Est, 1];
                }elseif($tarifaPVariacion2Est > 0){
                    $arrTarifaP2Est = [$tarifaP2Est, $tarifaPVariacion2Est, 2];
                }else{
                    $arrTarifaP2Est = [$tarifaP2Est, 0, 3];
                }
            }else{
                $arrTarifaP2Est = [$tarifaP2Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion2Est = round( ($datos2Est->hab_ocupadas / $datos2Est->hab_disponibles)*100 , 2) ;

            if(isset($datos2EstAnterior->hab_disponibles)){
                $ocupacionAnterior2Est = round( ($datos2EstAnterior->hab_ocupadas / $datos2EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion2Est = $ocupacion2Est - $ocupacionAnterior2Est;
                if($ocupacionVariacion2Est < 0){
                    $ocupacionVariacion2Est = $ocupacionVariacion2Est*(-1);
                    $arrOcupacion2Est = [$ocupacion2Est,  $ocupacionVariacion2Est, 1];
                }elseif($ocupacionVariacion2Est > 0){
                    $arrOcupacion2Est = [$ocupacion2Est, $ocupacionVariacion2Est, 2];
                }else{
                    $arrOcupacion2Est = [$ocupacion2Est, 0, 3];
                }
            }else{
                $arrOcupacion2Est = [$ocupacion2Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar2Est = round($datos2Est->ventasNetas / $datos2Est->hab_disponibles , 2) ;

            if(isset($datos2EstAnterior->hab_disponibles)){
                $revparAnterior2Est = round( $datos2EstAnterior->ventasNetas / $datos2EstAnterior->hab_disponibles , 2) ;
                $revparVariacion2Est = $revpar2Est - $revparAnterior2Est;
                if($revparVariacion2Est < 0){
                    $revparVariacion2Est = $revparVariacion2Est*(-1);
                    $arrRevpar2Est = [$revpar2Est,  $revparVariacion2Est, 1];
                }elseif($revparVariacion2Est > 0){
                    $arrRevpar2Est = [$revpar2Est,  $revparVariacion2Est, 2];
                }else{
                    $arrRevpar2Est = [$revpar2Est,  0, 3];
                }
            }else{
                $arrRevpar2Est = [$revpar2Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP2Est = round($datos2Est->pernoctaciones / $datos2Est->checkins, 2) ;

            if(isset($datos2EstAnterior->checkins)){
                $estadiaPAnterior2Est = round( $datos2EstAnterior->pernoctaciones / $datos2EstAnterior->checkins , 2) ;
                $estadiaPVariacion2Est = $estadiaP2Est - $estadiaPAnterior2Est;
                if($estadiaPVariacion2Est < 0){
                    $estadiaPVariacion2Est = $estadiaPVariacion2Est*(-1);
                    $arrEstadiaP2Est = [$estadiaP2Est,  $estadiaPVariacion2Est, 1];
                }elseif($estadiaPVariacion2Est > 0){
                    $arrEstadiaP2Est = [$estadiaP2Est,  $estadiaPVariacion2Est, 2];
                }else{
                    $arrEstadiaP2Est = [$estadiaP2Est,  0, 3];
                }
            }else{
                $arrEstadiaP2Est = [$estadiaP2Est,  0, null];
            }
            
        }else{
            $arrHuespedes2Est = [0, 0];
            $arrTarifaH2Est = ['S/R', '', null];
            $arrTarifaP2Est = ['S/R', '', null];
            $arrOcupacion2Est = ['S/R', '', null];
            $arrRevpar2Est = ['S/R', '', null];
            $arrEstadiaP2Est = ['S/R', '', null];
        }



        /*
            Cálculo para 1 estrellas
        */
        if(isset($datos1Est)){

            //Cálculo huespedes
            $huespedes1Est = ($datos1Est->nacionales * 100)/ ($datos1Est->nacionales + $datos1Est->extranjeros);
            $arrHuespedes1Est = [round($huespedes1Est, 2), round(100 - $huespedes1Est, 2)];
            
            //Cálculo de las tarifas por habitación
            $tarifaH1Est = round( ($datos1Est->ventasNetas / $datos1Est->hab_ocupadas), 2) ;
        
            if(isset($datos1EstAnterior->hab_ocupadas)){
                $tarifaHAnterior1Est = round( ($datos1EstAnterior->ventasNetas / $datos1EstAnterior->hab_ocupadas) , 2) ;
                $tarifaHVariacion1Est = $tarifaH1Est - $tarifaHAnterior1Est;

                if($tarifaHVariacion1Est < 0){
                    $tarifaHVariacion1Est = $tarifaHVariacion1Est*(-1);
                    $arrTarifaH1Est = [$tarifaH1Est,  $tarifaHVariacion1Est, 1];
                }elseif($tarifaHVariacion1Est > 0){
                    $arrTarifaH1Est = [$tarifaH1Est, $tarifaHVariacion1Est, 2];
                }else{
                    $arrTarifaH1Est = [$tarifaH1Est, 0, 3];
                }
            }else{
                $arrTarifaH1Est = [$tarifaH1Est, 0, null];
            }
            
            //Cálculo de las tarifas por Persona
            $tarifaP1Est = round( ($datos1Est->ventasNetas / $datos1Est->pernoctaciones), 2) ;

            if(isset($datos1EstAnterior->pernoctaciones)){
                $tarifaPAnterior1Est = round( ($datos1EstAnterior->ventasNetas / $datos1EstAnterior->pernoctaciones) , 2) ;
                $tarifaPVariacion1Est = $tarifaP1Est - $tarifaPAnterior1Est;
                if($tarifaPVariacion1Est < 0){
                    $tarifaPVariacion1Est = $tarifaPVariacion1Est*(-1);
                    $arrTarifaP1Est = [$tarifaP1Est,  $tarifaPVariacion1Est, 1];
                }elseif($tarifaPVariacion1Est > 0){
                    $arrTarifaP1Est = [$tarifaP1Est, $tarifaPVariacion1Est, 2];
                }else{
                    $arrTarifaP1Est = [$tarifaP1Est, 0, 3];
                }
            }else{
                $arrTarifaP1Est = [$tarifaP1Est, 0, null];
            }
            
            //Cálculo de la ocupación
            $ocupacion1Est = round( ($datos1Est->hab_ocupadas / $datos1Est->hab_disponibles)*100 , 2) ;

            if(isset($datos1EstAnterior->hab_disponibles)){
                $ocupacionAnterior1Est = round( ($datos1EstAnterior->hab_ocupadas / $datos1EstAnterior->hab_disponibles)*100 , 2) ;
                $ocupacionVariacion1Est = $ocupacion1Est - $ocupacionAnterior1Est;
                if($ocupacionVariacion1Est < 0){
                    $ocupacionVariacion1Est = $ocupacionVariacion1Est*(-1);
                    $arrOcupacion1Est = [$ocupacion1Est,  $ocupacionVariacion1Est, 1];
                }elseif($ocupacionVariacion1Est > 0){
                    $arrOcupacion1Est = [$ocupacion1Est, $ocupacionVariacion1Est, 2];
                }else{
                    $arrOcupacion1Est = [$ocupacion1Est, 0, 3];
                }
            }else{
                $arrOcupacion1Est = [$ocupacion1Est, 0, null];
            }
            
            //Cálculo del revpar
            $revpar1Est = round($datos1Est->ventasNetas / $datos1Est->hab_disponibles , 2) ;

            if(isset($datos1EstAnterior->hab_disponibles)){
                $revparAnterior1Est = round( $datos1EstAnterior->ventasNetas / $datos1EstAnterior->hab_disponibles , 2) ;
                $revparVariacion1Est = $revpar1Est - $revparAnterior1Est;
                if($revparVariacion1Est < 0){
                    $revparVariacion1Est = $revparVariacion1Est*(-1);
                    $arrRevpar1Est = [$revpar1Est,  $revparVariacion1Est, 1];
                }elseif($revparVariacion1Est > 0){
                    $arrRevpar1Est = [$revpar1Est,  $revparVariacion1Est, 2];
                }else{
                    $arrRevpar1Est = [$revpar1Est,  0, 3];
                }
            }else{
                $arrRevpar1Est = [$revpar1Est,  0, null];
            }
            
            //Cáñculo de la estadía promedio
            $estadiaP1Est = round($datos1Est->pernoctaciones / $datos1Est->checkins, 2) ;

            if(isset($datos1EstAnterior->checkins)){
                $estadiaPAnterior1Est = round( $datos1EstAnterior->pernoctaciones / $datos1EstAnterior->checkins , 2) ;
                $estadiaPVariacion1Est = $estadiaP1Est - $estadiaPAnterior1Est;
                if($estadiaPVariacion1Est < 0){
                    $estadiaPVariacion1Est = $estadiaPVariacion1Est*(-1);
                    $arrEstadiaP1Est = [$estadiaP1Est,  $estadiaPVariacion1Est, 1];
                }elseif($estadiaPVariacion1Est > 0){
                    $arrEstadiaP1Est = [$estadiaP1Est,  $estadiaPVariacion1Est, 2];
                }else{
                    $arrEstadiaP1Est = [$estadiaP1Est,  0, 3];
                }
            }else{
                $arrEstadiaP1Est = [$estadiaP1Est,  0, null];
            }
            
        }else{
            $arrHuespedes1Est = [0, 0];
            $arrTarifaH1Est = ['S/R', '', null];
            $arrTarifaP1Est = ['S/R', '', null];
            $arrOcupacion1Est = ['S/R', '', null];
            $arrRevpar1Est = ['S/R', '', null];
            $arrEstadiaP1Est = ['S/R', '', null];
        }


        
        return view('indicadoresAlojamiento')->with('arrHuespedes5Est', $arrHuespedes5Est)
                                        ->with('arrTarifaH5Est', $arrTarifaH5Est)
                                        ->with('arrTarifaP5Est', $arrTarifaP5Est)
                                        ->with('arrOcupacion5Est', $arrOcupacion5Est)
                                        ->with('arrRevpar5Est', $arrRevpar5Est)
                                        ->with('arrEstadiaP5Est', $arrEstadiaP5Est)
                                        ->with('arrHuespedes4Est', $arrHuespedes4Est)
                                        ->with('arrTarifaH4Est', $arrTarifaH4Est)
                                        ->with('arrTarifaP4Est', $arrTarifaP4Est)
                                        ->with('arrOcupacion4Est', $arrOcupacion4Est)
                                        ->with('arrRevpar4Est', $arrRevpar4Est)
                                        ->with('arrEstadiaP4Est', $arrEstadiaP4Est)
                                        ->with('arrHuespedes3Est', $arrHuespedes3Est)
                                        ->with('arrTarifaH3Est', $arrTarifaH3Est)
                                        ->with('arrTarifaP3Est', $arrTarifaP3Est)
                                        ->with('arrOcupacion3Est', $arrOcupacion3Est)
                                        ->with('arrRevpar3Est', $arrRevpar3Est)
                                        ->with('arrEstadiaP3Est', $arrEstadiaP3Est)
                                        ->with('arrHuespedes2Est', $arrHuespedes2Est)
                                        ->with('arrTarifaH2Est', $arrTarifaH2Est)
                                        ->with('arrTarifaP2Est', $arrTarifaP2Est)
                                        ->with('arrOcupacion2Est', $arrOcupacion2Est)
                                        ->with('arrRevpar2Est', $arrRevpar2Est)
                                        ->with('arrEstadiaP2Est', $arrEstadiaP2Est)
                                        ->with('arrHuespedes1Est', $arrHuespedes1Est)
                                        ->with('arrTarifaH1Est', $arrTarifaH1Est)
                                        ->with('arrTarifaP1Est', $arrTarifaP1Est)
                                        ->with('arrOcupacion1Est', $arrOcupacion1Est)
                                        ->with('arrRevpar1Est', $arrRevpar1Est)
                                        ->with('arrEstadiaP1Est', $arrEstadiaP1Est)
                                        ->with('mes', $request->mes)
                                        ->with('anio', $request->anio)
                                        ->with('nombreMes', $nombreMes)
                                        ->with('anios', $anios);

    }

    public function all(Request $request)
    {
        $consulta = "SELECT fecha, 
                            SUM(ventas_netas) as ventasNetas, 
                            SUM(pernoctaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            SUM(habitaciones_ocupadas) as hab_ocupadas, 
                            SUM(habitaciones_disponibles) as  hab_disponibles 
                            FROM registros
                            GROUP BY fecha
                            HAVING MONTH(fecha) = $request->mes AND YEAR(fecha) = $request->anio ";

        $datos = \DB::select($consulta);

        return response(json_encode($datos), 200)->header('Content-type', 'text/plain');
    }

}
