<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatosEstadisticosController extends Controller
{
    public function index()
    {
        $datosActuales = \DB::select('SELECT MONTH(Max(fecha)) as "mes", YEAR(Max(fecha)) as "anio" FROM registros');
        $auxMes = $datosActuales[0]->mes;
        $auxAnio = $datosActuales[0]->anio;

        $consulta = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles' 
                            FROM registros WHERE MONTH(fecha) = ".$auxMes;

        $datos = \DB::select($consulta);

        $huespedes = ($datos[0]->nacionales * 100)/ $datos[0]->checkins ;
        $arrHuespedes = [round($huespedes, 2), round(100 - $huespedes, 2)];
        
        $tarifas = [round($datos[0]->ventasNetas / $datos[0]->hab_ocupadas , 2) , round( $datos[0]->ventasNetas / $datos[0]->pernoctaciones , 2) ] ;

        $ocupacion = round( ($datos[0]->hab_ocupadas / $datos[0]->hab_disponibles)*100 , 2) ;

        $revpar = round($datos[0]->ventasNetas / $datos[0]->hab_disponibles , 2) ;
        
        $estadiaP = round($datos[0]->pernoctaciones / $datos[0]->checkins, 2) ;
        
        return view('datosEstadisticos')->with('arrHuespedes', $arrHuespedes)
                                        ->with('tarifas', $tarifas)
                                        ->with('ocupacion', $ocupacion)
                                        ->with('revpar', $revpar)
                                        ->with('estadiaP', $estadiaP);
    }

    public function mostrar(Request $request)
    {
        $consulta = "SELECT SUM(ventas_netas) as ventasNetas, 
                            SUM(pernotaciones) as pernoctaciones, 
                            SUM(checkins) as checkins,
                            Sum(nacionales) as 'nacionales', 
                            Sum(habitaciones_ocupadas) as 'hab_ocupadas' ,
                            Sum(habitaciones_disponibles) as 'hab_disponibles'
                            FROM registros WHERE MONTH(fecha) = $request->mes";

        $datos = \DB::select($consulta);

        $huespedes = ($datos[0]->nacionales * 100)/ $datos[0]->checkins ;
        $arrHuespedes = [round($huespedes, 2), round(100 - $huespedes, 2)];
        
        $tarifas = [round($datos[0]->ventasNetas / $datos[0]->hab_ocupadas , 2) , round( $datos[0]->ventasNetas / $datos[0]->pernoctaciones , 2) ] ;

        $ocupacion = round( ($datos[0]->hab_ocupadas / $datos[0]->hab_disponibles)*100 , 2) ;

        $revpar = round($datos[0]->ventasNetas / $datos[0]->hab_disponibles , 2) ;
        
        $estadiaP = round($datos[0]->pernoctaciones / $datos[0]->checkins, 2) ;
        
        return view('datosEstadisticos')->with('arrHuespedes', $arrHuespedes)
                                        ->with('tarifas', $tarifas)
                                        ->with('ocupacion', $ocupacion)
                                        ->with('revpar', $revpar)
                                        ->with('estadiaP', $estadiaP);
    }
}
