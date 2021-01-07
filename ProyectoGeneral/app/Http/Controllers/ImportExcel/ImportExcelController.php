<?php

namespace App\Http\Controllers\ImportExcel;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Imports\HotelImport;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel;


class ImportExcelController extends Controller
{
    public function index()
    {
        return view('import_excel.index');
    }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportExcel, request()->file('import_file'));
        return back()->with('success', 'Hotels imported successfully.');

    }
}
