<?php

namespace App\Http\Controllers;

use App\TaSemhas;
use Illuminate\Http\Request;

class SemhasController extends Controller
{
    public function index()
    {
    	$semhass = TaSemhas::paginate(25);
        return view('backend.semhas.index', compact('semhass'));
    }
}
