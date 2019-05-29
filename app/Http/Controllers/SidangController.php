<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;
use App\TaPesertaSemhas;
use App\Ruangan;
use App\Dosen;
use App\TaPengujiSidang;
use App\TaSidang;   
use App\TaSemhas;
use App\TaSempro;
use App\TugasAkhir;
use App\User;
use DB;
Use Exception;

class SidangController extends Controller
{
    public function index()
    {
        $taSidang = DB::table('ta_sidang')
                             ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')
                             ->select('ta_sidang.*', 'ruangan.nama as nama_ruangan')->get();
        // dd($taSidang);
        $ruangan = $taSidang->pluck('nama_ruangan');
        $dosen = $taSidang->pluck('nama_dosen');

        return view('backend.sidang_ta.index', compact('taSidang'));
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
    
    public function show($id)
    {
        $sidangta = TaSidang::where('ta_sidang.id', '=', $id)
        ->select('dosen.nama as nama_dosen','mahasiswa.nama as nama_mahasiswa', 
        'mahasiswa.nim', 'tugas_akhir.judul', 'ta_sidang.sidang_at', 
        'ta_sidang.sidang_time', 'ruangan.nama as nama_ruang', 'ta_sidang.nilai_angka',
         'ta_sidang.nilai_huruf', 'ta_sidang.nilai_toefl')
        ->join('ta_semhas', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')
        ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
        ->join('tugas_akhir', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
        ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')
        ->join('ta_penguji_sidang', 'ta_sidang.id', '=', 'ta_penguji_sidang.ta_sidang_id')
        ->join('dosen', 'dosen.id', '=', 'ta_penguji_sidang.dosen_id')
        
        ->first();
        return view('backend.sidang_ta.show', compact('sidangta'));
    }
    
    public function destroy($id)
    {
        $sidangtas = TaPengujiSidang::where('ta_sidang_id', $id);
        // dd($sidangtas);
        $sidangtas->delete();
        // optional($sidangtas)->delete();

        $sidangta = TaSidang::find($id);
        $sidangta->delete();
        // optional($sidangtas)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data sidang ta dengan id '.$sidangta->id);
        return redirect()->route('admin.sidang_ta.index');
    }

    public function destroydosen(TaPengujiSidang $sidangta)
    {
    
        $user = TaPengujiSidang::find($sidangta->id);
        $sidangta->delete();
        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data mahasiswa '.$sidangta->id);
        return redirect()->route('admin.sidang_ta.show');
    
    }

    public function add($id){

         $sidangta = TaSidang::where('ta_sidang.id', '=', $id)
        ->select('dosen.nama as nama_dosen','dosen.id as id_dosen')
        ->join('dosen', 'dosen.id', '=', 'ta_penguji_sidang.dosen_id')
        ->get();

        $mahasiswa =  $sidangta->pluck('nama_dosen', 'id_dosen');
        return view('backend.sidang_ta.show', compact('sidangta','mahasiswa'));
    }
}
