<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumenMensualController extends Controller
{
    public function index()
    {
        return view('resumenMensual');
    }
}
