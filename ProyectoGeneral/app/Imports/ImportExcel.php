<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Validator;
use App\Models\Registro;


class ImportExcel implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        foreach($collection as $key=>$value){
            
            if($key>0)
            {
                //determinar copias de registros y eliminarlas
                $copia=DB::table('registros')
                    ->select('id', 'fecha', 'checkins','checkouts', 'pernotaciones', 'nacionales')
                    ->where('fechaCadena','=', $value[5] )
                    ->where('checkins','=', $value[6] )
                    ->where('checkouts','=', $value[7] )
                    ->where('pernotaciones','=', $value[8] )
                    ->where('nacionales','=', $value[9] )
                    ->where('extranjeros','=', $value[10] )
                    ->where('habitaciones_ocupadas','=', $value[11] )
                    ->where('habitaciones_disponibles','=', $value[12] )
                    ->get();
                
                if(!empty($copia->toArray())){
                    $registro = Registro::whereId($copia[0]->id)->firstOrFail();
                    $registro->delete();
                    
                }else{
                    $copia[0] = 1;
                }
                
                Validator::make($copia->toArray(), [
                    '0' => 'required'
                ],$messages = [
                    'required' => 'Existe al menos una fila repetida en el archivo(s) a cargar'
                ])->validate();
                
                
                // Validamos si existe un usuario que enlazar con el archivo cargado
                Validator::make($value->toArray(), [
                    '0' => 'exists:App\Models\User,name'
                ],$messages = [
                    'exists' => 'No existe un usuario relacionado con el archivo que desea subir.'
                ])->validate();
                
                
                // buscamos un establecimiento que corresponda al del archivo cargado
                $idE=DB::table('establecimientos')
                ->select('id')
                ->where('nombre','=', $value[0] )
                ->get();
                // usamos una condicion para determinar si hubo o no un establecimiento para este registro
                if(empty($idE[0]->id) ){
                    $clave=0;
                }else{
                    $clave = $idE[0]->id;
                }
                
                // en caso de que no hubo establecimiento para el archivo a cargar, creamos uno a partir de los datos del archivo
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


                // cargamos los registros ubicandole la clave foranea de el establecimiento que le corresponde
                $fechaux = explode('/', $value[5]);
                $fecha = $fechaux[2]."-".$fechaux[1]."-".$fechaux[0];
                if($value[8] != 0){
                    $tarPer = round(($value[16]/$value[8]),2);
                }else{
                    $tarPer = 0;
                }
                
                DB::table('registros')->insert(['fecha'=> $fecha, 'checkins'=> $value[6],'checkouts'=>$value[7],'pernotaciones'=>$value[8],
                'nacionales'=>$value[9],'extranjeros'=>$value[10],'habitaciones_ocupadas'=>$value[11],'habitaciones_disponibles'=>$value[12],
                'tipo_tarifa'=>$value[13],'tarifa_promedio'=>$value[14],'TAR_PER'=>$tarPer, 'ventas_netas'=>$value[16], 
                'porcentaje_ocupacion'=>$value[17],'revpar'=>$value[18],'empleados_temporales'=>$value[19],
                'estado'=>$value[20], 'opciones'=>$value[21],'idEstablecimiento'=> $clave, 'fechaCadena'=> $value[5] ]);
            
            }

       }
    }
}
