<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Validator;
use App\Models\Registro;


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
