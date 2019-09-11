<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MahasiswaOrganisasi

class OrganisasiMhsCariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);
         $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';
         $mhs_organisasis = MhsOrganisasi::where('organisasi', 'like', $filter)
            ->paginate(25);
         return view('backend.organisasi-mhs.index', compact('mhs_organisasis', 'keyword'));
     }
}
