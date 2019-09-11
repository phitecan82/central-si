<?php

namespace App\Http\Controllers;

use App\nilaiTA;
use App\User;
use Illuminate\Http\Request;

class nilaiTAcariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['nilaiTA' => 'required']);

        $nilaiTAs = $request->input('nilaiTA');
        $filter = '%'.$nilaiTAs.'%';

        $nilaiTAs = nilaiTA::where('nama', 'like', $filter)
            ->orWhere('nim', 'like', $filter)
            ->paginate(25);

        return view('backend.nilaiTA.index', compact('nilaiTAs', 'nilaiTA'));

    }
}
