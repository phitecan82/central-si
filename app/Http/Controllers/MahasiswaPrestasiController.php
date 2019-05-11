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
        $prestasis = MahasiswaPrestasi::
                        join('mahasiswa', 'mahasiswa_prestasi.mahasiswa_id', '=', 'mahasiswa.id')
                        ->orderBy('mahasiswa_prestasi.created_at', 'desc')
                        ->paginate(25);
        return view('backend.prestasi-mhs.index', compact('prestasis'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::pluck('nama', 'id');
        return view('backend.prestasi-mhs.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);
        $data = $request->all();
        MahasiswaPrestasi::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data prestasi '.$request->nama_lomba);
        return redirect()->route('admin.prestasi-mhs.index');
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
