<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaBimbingan;
use App\TugasAkhir;
use App\TaPembimbing;
use DB;

class BimbinganController extends Controller
{
    public function index()
    {
        $bimbingans = TugasAkhir::
            join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id' )
            ->select('tugas_akhir.id', 'mahasiswa.nama', 'mahasiswa.nim', 'tugas_akhir.judul')
            ->paginate(25);
        
        return view('backend.bimbingan.index', compact('bimbingans'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $bimbingans = TaBimbingan::
        join('tugas_akhir', 'tugas_akhir.id', '=', 'ta_bimbingan.tugas_akhir_id')
        ->join('ta_pembimbing', 'ta_bimbingan.pembimbing_id', '=', 'ta_pembimbing.id')
        ->join('dosen', 'ta_pembimbing.dosen_id', '=', 'dosen.id')
        ->select('ta_bimbingan.id', 'dosen.nama', 'ta_bimbingan.tanggal')
        ->where('tugas_akhir.id', '=', $id)
        ->paginate(25);
        return view('backend.bimbingan.show', compact('bimbingans', 'id'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
