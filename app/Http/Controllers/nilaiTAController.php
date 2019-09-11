<?php

namespace App\Http\Controllers;

use App\nilaiTA;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\TaSidang;
use App\TugasAkhir;

class NilaiTAController extends Controller
{
    public $validation_rules = [
        'nilai_angka' => 'required|numeric',
        'nilai_akhir_ta' => 'required'
    ];

    public function index()
    {
        $nilaiTAs = nilaiTA::
        select('ta_sidang.id', 'mahasiswa.nama', 'ta_sidang.nilai_angka', 'ta_sidang.nilai_akhir_ta', 'tugas_akhir.judul')
        ->join('ta_semhas','ta_sidang.ta_semhas_id','=', 'ta_semhas.id')
        ->join('ta_sempro','ta_sempro.id','=', 'ta_semhas.ta_sempro_id')
        ->join('tugas_akhir','tugas_akhir.id','=','ta_sempro.tugas_akhir_id')
        ->join('mahasiswa','tugas_akhir.mahasiswa_id','=','mahasiswa.id')
        ->orWhereNotNull('ta_sidang.nilai_angka')
        ->orWhereNotNull('ta_sidang.nilai_akhir_ta')
        ->paginate(10);

        return view('backend.nilaiTA.index', compact('nilaiTAs'));
    }

    public function create()
    {
        
        $judul = nilaiTA::
        select('tugas_akhir.judul', 'ta_sidang.id')
        ->join('ta_semhas','ta_sidang.ta_semhas_id','=', 'ta_semhas.id')
        ->join('ta_sempro','ta_sempro.id','=', 'ta_semhas.ta_sempro_id')
        ->join('tugas_akhir','tugas_akhir.id','=','ta_sempro.tugas_akhir_id')
        ->join('mahasiswa','tugas_akhir.mahasiswa_id','=','mahasiswa.id')
        ->whereNull('ta_sidang.nilai_angka')
        ->whereNull('ta_sidang.nilai_akhir_ta')
        ->pluck('tugas_akhir.judul', 'ta_sidang.id');
        return view('backend.nilaiTA.create', compact('judul'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);
        $nilaiTA = TaSidang::find($request->judul);
        $nilaiTA->nilai_angka       = $request->nilai_angka;
        $nilaiTA->nilai_akhir_ta    = $request->nilai_akhir_ta;
        $nilaiTA->save();

        $judul = nilaiTA::
        select('tugas_akhir.judul')
        ->join('ta_semhas','ta_sidang.ta_semhas_id','=', 'ta_semhas.id')
        ->join('ta_sempro','ta_sempro.id','=', 'ta_semhas.ta_sempro_id')
        ->join('tugas_akhir','tugas_akhir.id','=','ta_sempro.tugas_akhir_id')
        ->join('mahasiswa','tugas_akhir.mahasiswa_id','=','mahasiswa.id')
        ->where('ta_sidang.id', '=', $request->judul)
        ->get()[0]['judul'];

        session()->flash('flash_success', 'Berhasil menginputkan nilai TA dengan judul '. $judul);
        return redirect()->route('admin.nilaiTA.index');
    }

    public function edit($id)
    {
        $nilaiTA = nilaiTA::
        select('ta_sidang.id', 'mahasiswa.nama', 'mahasiswa.nim', 'tugas_akhir.judul', 'ta_sidang.nilai_angka', 'ta_sidang.nilai_akhir_ta')
        ->join('ta_semhas','ta_sidang.ta_semhas_id','=', 'ta_semhas.id')
        ->join('ta_sempro','ta_sempro.id','=', 'ta_semhas.ta_sempro_id')
        ->join('tugas_akhir','tugas_akhir.id','=','ta_sempro.tugas_akhir_id')
        ->join('mahasiswa','tugas_akhir.mahasiswa_id','=','mahasiswa.id')
        ->where('ta_sidang.id', '=', $id)
        ->get()[0];

        return view('backend.nilaiTA.edit', compact('nilaiTA'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validation_rules);
        $nilaiTA = TaSidang::findOrFail($id);
        $nilaiTA->nilai_angka = $request->nilai_angka;
        $nilaiTA->nilai_akhir_ta = $request->nilai_akhir_ta;
        $nilaiTA->save();

        session()->flash('flash_success', 'Berhasil mengedit nilai tugas akhir dengan judul'.$request->judul);
        return redirect()->route('admin.nilaiTA.index');
    }

    public function getnama($id)
    {
        $nama = TugasAkhir::find($id);
        return $nama;
    }

}
