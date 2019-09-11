<?php

namespace App\Http\Controllers;

use App\Tendik;
use Illuminate\Http\Request;

class TendikCariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);

        $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';

        $tendiks = Tendik::where('nama', 'like', $filter)
            ->orWhere('nik', 'like', $filter)
            ->orWhere('nip', 'like', $filter)
            ->paginate(25);

        return view('backend.tendik.index', compact('tendiks', 'keyword'));

    }
}
