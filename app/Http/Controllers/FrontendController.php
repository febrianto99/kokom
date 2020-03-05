<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detailtas;
use App\jenistas;

class FrontendController extends Controller
{
    public function home(){
        $detailtas = detailtas::all();
        $jenistass = jenistas::all();
        return view('index', compact('detailtas', 'jenistass'));
    }
    public function jenistas(jenistas $jenistas){
        $jenistass = jenistas::all();
        $detailtas = $jenistas->detailtas()->paginate(4);     
        return view('index', compact('detailtas', 'jenistass'));
    }
}