<?php

namespace App\Http\Controllers\ImportExcel;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Imports\HotelImport;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\File;
use Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class ImportExcelController extends Controller
{
    public function index()
    {
        $files = File::latest()->get();
        if(Auth::user()->rol != 'Admin'){return redirect('home');}
        return view('archivos', compact('files'));
    }
    public function import(Request $request)
    {
        $now = new \DateTime();
        //$now->format('d-m-Y H:i:s')
        
        $request->validate([
            'import_file' => 'required',
            'import_file.*' => 'required|mimes:csv,xlsx,xls'
        ],$messages = [
            'mimes' => 'ERROR: El archivo no es de formato csv, xlsl o xls',
            'required' => 'Por favor elija un archivo'
        ]);
        

        $files = request()->file('import_file') ;
        $idUduario = Auth::id();

        foreach ($files as $file) {
            
            Excel::import(new ImportExcel, $file);
            
            if(Storage::putFileAs('/public', $file, $now->format('d-m-Y').'-'.$file->getClientOriginalName())){

                File::create([
                    'name'=> $now->format('d-m-Y').'-'.$file->getClientOriginalName(),
                    'idUsuario'=>$idUduario
                ]);
                
            }

        }
        Alert::success('success', 'Hotels imported successfully.');
        return back();

    }

    public function destroy(Request $request, $id)
    {
        $file = File::whereId($id)->firstOrFail();

        unlink(public_path('storage/'.$file->name));

        $file->delete();
        Alert::success('eliminado', 'Archivo Eliminado Exitosamente');
        return back(); 
    }

}
