<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mahasiswa;
use App\TaPesertaSemhas;
use App\TaSidang;
use App\TaSemhas;
use App\Ruangan;
use App\Dosen;

class SidangController extends Controller
{
    public function index()
    {
        $taSidang = DB::table('mahasiswa')
                             ->join('tugas_akhir', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                             ->join('ta_sempro', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                             ->join('ta_semhas', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                             ->join('ta_sidang', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')
                             ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')
                             ->select('mahasiswa.id as id_mhs', 'mahasiswa.nama as nama_mhs', 'ta_sidang.*', 'ruangan.nama as nama_ruangan')->get();
        $ruangan = $taSidang->pluck('nama_ruangan');
        $dosen = $taSidang->pluck('nama_dosen');

        return view('backend.sidang_ta.index', compact('taSidang'));
    }

    public function show($id)
    {
        $sidangta = DB::table('ta_sidang')
        ->join('tugas_akhir', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
        ->join('ta_sempro', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->join('ta_semhas', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
        ->select('mahasiswa.id as id_mhs', 'mahasiswa.nama as nama_mhs', 'ta_semhas.id as semhas_id')
        ->where('ta_sidang.id', '=', $id)
        ->get();
        // $sidangta = $sidangta[0];
        return view('backend.sidang_ta.show', compact('sidangta'));
    }

    public function create()
    {
        // $semhas_db = DB::table('ta_peserta_semhas')
        //             ->join('ta_semhas', 'ta_peserta_semhas.ta_semhas_id', '=', 'ta_semhas.id')
        //             ->select('ta_peserta_semhas.*', 'ta_semhas.status', 'ta_semhas_id as check')->get();
        // // $semhas = TaPesertaSemhas::all();
        // $semhas =  $semhas_db->pluck('ta_semhas_id', 'check');
        // dd($blin);
        
        $taSidang = DB::table('mahasiswa')
                             ->join('tugas_akhir', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                             ->join('ta_sempro', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                             ->join('ta_semhas', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                             ->select('mahasiswa.id as id_mhs', 'mahasiswa.nama as nama_mhs', 'ta_semhas.id as semhas_id')
                             ->get();
        $mahasiswa =  $taSidang->pluck('nama_mhs', 'semhas_id');
        // dd($mahasiswa);
        $blin  = Ruangan::paginate(3);
        $ruangan  = $blin->pluck('nama','id');
        
        // dd($ruangan);
        return view('backend.sidang_ta.create', compact('mahasiswa', 'taSidang' , 'dosen', 'ruangan'));
    }

    public function store(Request $request ){

        $file_toefl = $request->file('file_toefl');
        $file_laporan = $request->file('file_laporan');
        $file_pengesahan = $request->file('file_lembaran_pengesahan');

        if ($file_toefl != null) {
            $path_toefl = $file_toefl->store('public/files');
        }

        if ($file_laporan != null) {
            $path_laporan = $file_laporan->store('public/files');
        }

        if ($file_pengesahan != null) {
            $file_pengesahan = $file_pengesahan->store('public/files');
        }

        $sidang = new TaSidang;
        
        $sidang->ta_semhas_id = $request->input('ta_semhas');
        $sidang->sidang_at = $request->input('sidang_at');
        $sidang->sidang_time = $request->input('sidang_time');
        $sidang->ruangan_id = $request->input('ruangan');
        $sidang->status = $request->input('status');
        $sidang->file_toefl = $file_toefl;
        $sidang->file_laporan = $file_laporan;
        $sidang->file_lembaran_pengesahan = $file_pengesahan;


        $sidang->save();
        return redirect('admin/sidang');
    } 

    public function edit(TaSidang $taSidang){
        $mhs_db = DB::table('mahasiswa')
                             ->join('tugas_akhir', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                             ->join('ta_sempro', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                             ->join('ta_semhas', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                             ->select('mahasiswa.id as id_mhs', 'mahasiswa.nama as nama_mhs', 'ta_semhas.id as semhas_id')
                             ->get();
        $mahasiswa =  $mhs_db->pluck('nama_mhs', 'semhas_id');

        $blin  = Ruangan::paginate(3);
        $ruangan  = $blin->pluck('nama','id');

        return view('backend.sidang_ta.edit', compact('mahasiswa', 'taSidang', 'ruangan'));
    }

    public function update(Request $request, TaSidang $taSidang){
        // dd($taSidang);
        // $this->validate($request, $taSidang->id);

        $file_toefl = $request->file('file_toefl');
        $file_laporan = $request->file('file_laporan');
        $file_pengesahan = $request->file('file_lembaran_pengesahan');

        if ($file_toefl != null) {
            // $path = Storage::putFile('avatars', $request->file('avatar'));
            $path_toefl = $file_toefl->store('public/files');
        }

        if ($file_laporan != null) {
            $path_laporan = $file_laporan->store('public/files');
        }

        if ($file_pengesahan != null) {
            $path_pengesahan = $file_pengesahan->store('public/files');
        }
        
        $taSidang->ta_semhas_id = $request->input('ta_semhas');
        $taSidang->sidang_at = $request->input('sidang_at');
        $taSidang->sidang_time = $request->input('sidang_time');
        $taSidang->ruangan_id = $request->input('ruangan');
        $taSidang->status = $request->input('status');
        $taSidang->file_toefl = $file_toefl;
        $taSidang->file_laporan = $file_laporan;
        $taSidang->file_lembaran_pengesahan = $file_pengesahan;
        $taSidang->save();
            
            return redirect('admin/sidang');
    }
}
