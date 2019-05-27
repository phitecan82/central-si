<?php

namespace App\Http\Controllers;
use App\Dosen;
use App\keluarga;
use Illuminate\Http\Request;

class keluargaController extends Controller
{

    public function index()
    {
        $keluargas = keluarga::paginate(25);
        return view('backend.keluarga.index', compact('keluargas'));
    }

    
     public function detail($keluarga)
     {
     	$keluarga=keluarga::findOrFail($keluarga);
     	  return view('backend.keluarga.detail',compact('keluarga'));
     }

}
