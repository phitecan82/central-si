<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\TaSidang;
use App\TaSemhas;
use App\TaSempro;
use App\TugasAkhir;
use App\Mahasiswa;
use App\Ruangan;
use App\User;
use DB;
Use Exception;

class SidangTaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidangta = TaSidang::paginate(20);
        return view('backend.sidang_ta.index', compact('sidangta'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sidangta = DB::table('ta_sidang')
        ->join('ta_semhas', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')
        ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
        ->join('tugas_akhir', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
        ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')
        ->join('ta_penguji_sidang', 'ta_sidang.id', '=', 'ta_penguji_sidang.ta_sidang_id')
        ->join('dosen', 'ta_penguji_sidang.dosen_id', '=', 'dosen.id')

        ->select('dosen.nama','mahasiswa.nama_mahasiswa', 'mahasiswa.nim', 'tugas_akhir.judul', 'ta_sidang.sidang_at', 'ta_sidang.sidang_time', 'ruangan.nama_ruangan', 'ta_sidang.nilai_angka', 'ta_sidang.nilai_huruf', 'ta_sidang.nilai_toefl')
        ->where('ta_sidang.id', '=', $id)
        ->get();
        $sidangta = $sidangta[0];
                return view('backend.sidang-ta.show', compact('sidangta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TaSidang $sidangta)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaSidang $sidangta)
    {
        $user = User::find($sidangta->id);
        $sidangta->delete();
        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data sidang ');
        return redirect()->route('admin.sidang.index');
    }
}
