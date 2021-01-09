<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Establecimiento;


class ImportExcel implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key=>$value){
            
            if($key==1){
            
                $idE=DB::table('establecimientos')
                ->select('id')
                ->where('nombre','=', $value[0] )
                ->get();
                
                if(empty($idE[0]->id) ){
                    $clave=0;
                }else{
                    $clave = $idE[0]->id;
                }
                
    
                if($clave == 0){

                    $idU=DB::table('users')
                        ->select('id')
                        ->where('name','=', $value[0] )
                        ->get();
                    DB::table('establecimientos')->insert(['nombre'=> $value[0],'clasificacion'=>$value[1],'categoria'=>$value[2],
                        'habitaciones'=>$value[3],'plazas'=>$value[4],'idUsuario'=> $idU[0]->id ]);
                    
                    $aux=DB::table('establecimientos')
                                ->select('id')
                                ->where('nombre','=', $value[0] )
                                ->get();
                    $clave = $aux[0]->id;           
                }
                
            }
            if($key>0)
            { 
                $fechaux = explode('/', $value[5]);
                $fecha = $fechaux[2]."-".$fechaux[1]."-".$fechaux[0];
                DB::table('registros')->insert(['fecha'=> $fecha, 'checkins'=> $value[6],'checkouts'=>$value[7],'pernotaciones'=>$value[8],
                'nacionales'=>$value[9],'extranjeros'=>$value[10],'habitaciones_ocupadas'=>$value[11],'habitaciones_disponibles'=>$value[12],
                'tipo_tarifa'=>$value[13],'tarifa_promedio'=>$value[14],'TAR_PER'=>round(($value[16]/$value[8]),2), 'ventas_netas'=>$value[16], 
                'porcentaje_ocupacion'=>$value[17],'revpar'=>$value[18],'empleados_temporales'=>$value[19],
                'estado'=>$value[20], 'opciones'=>$value[21],'idEstablecimiento'=> $clave]);
            
            }

       }
    }
}
