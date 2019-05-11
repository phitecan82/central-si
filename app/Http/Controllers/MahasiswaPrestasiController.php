<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MahasiswaPrestasi;
use App\Mahasiswa;
use DB;

class MahasiswaPrestasiController extends Controller
{
    public $validation_rules = [
        'mahasiswa_id' => 'required',
        'nama_lomba' => 'required',
        'prestasi'  => 'required',
        'sertifikat' => 'file',
    ];

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
