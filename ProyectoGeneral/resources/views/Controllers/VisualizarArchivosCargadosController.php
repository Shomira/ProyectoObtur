<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archivo;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VisualizarArchivosCargadosController extends Controller
{
    public function index()
    {
        $files = Archivo::latest()->get();
        if(Auth::user()->rol != 'Administrador'){
        return redirect('home');}
        return view('visualizarArchivosCargados', compact('files'));
    }


    public function destroy(Request $request, $id)
    {
        $file = Archivo::whereId($id)->firstOrFail();

        unlink(public_path('storage/'.$file->nombre));

        $file->delete();
        Alert::success('eliminado', 'Archivo Eliminado Exitosamente');
        return back(); 
    }
}
