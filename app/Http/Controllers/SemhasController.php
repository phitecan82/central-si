<?php

namespace App\Http\Controllers;

use App\TaSemhas;
use App\Ruangan;
use Illuminate\Http\Request;

class SemhasController extends Controller
{
    public function index()
    {
    	$semhass = TaSemhas::paginate(25);
        return view('backend.semhas.index', compact('semhass'));
    }

    public function create()
    {
    	$ruangan = Ruangan::all()->pluck('nama','id');
    	return view('backend.semhas.create', compact('ruangan'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		
    	])
    }
}
