<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Validator;
use App\Models\Registro;
use App\Models\User;


class ImportExcelUser implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
        foreach($collection as $key=>$value){
            
            if($key>0)
            {
                $aux=$value[0];
                $pruebaUsuario = DB::select("SELECT id FROM users WHERE name= '$aux' ");
                
                if( !is_null($value[1]) && !is_null($value[2]) && !is_null($value[4]) && !is_null($value[5]) ){
                    // Validamos si existe un usuario que enlazar con el archivo cargado
                    Validator::make($value->toArray(), [
                        '0' => 'exists:App\Models\User,name'
                    ],$messages = [
                        'exists' => 'No existe  un usuario relacionado al archivo que desea cargar'
                    ])->validate();
                }
                
                
            }
            
       }
       
    }
}
