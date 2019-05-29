<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        

        $taSidang = DB::table('mahasiswa')
                             ->join('tugas_akhir', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                             ->join('ta_sempro', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                             ->join('ta_semhas', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                             ->select('mahasiswa.id as id_mhs', 'mahasiswa.nama as nama_mhs', 'ta_semhas.id as semhas_id')
                             ->get();
        $mahasiswa =  $taSidang->pluck('nama_mhs', 'semhas_id');
        
        $blin  = Ruangan::paginate(3);
        $ruangan  = $blin->pluck('nama','id');  
        
        // dd($ruangan);
        return view('backend.sidang_ta.create', compact('mahasiswa', 'taSidang' , 'dosen', 'ruangan'));
    }

    public function store(Request $request ){

        $file_toefl = $request->file('file_toefl');
        $file_laporan = $request->file('file_laporan');
        $file_pengesahan = $request->file('file_lembaran_pengesahan');
        
        $sidang = new TaSidang;
        if ($file_toefl != null) {
            $path_toefl = $file_toefl->storeAs('public/files',$file_toefl->getClientOriginalName());
            $sidang->file_toefl = $file_toefl->getClientOriginalName();
        }

        if ($file_laporan != null) {
            $path_laporan = $file_laporan->storeAs('public/files',$file_laporan->getClientOriginalName());
            $sidang->file_laporan = $file_laporan->getClientOriginalName();
        }

        if ($file_pengesahan != null) {
            $path_pengesahan = $file_pengesahan->storeAs('public/files',$file_pengesahan->getClientOriginalName());
            $sidang->file_lembaran_pengesahan = $file_pengesahan->getClientOriginalName();
        }
        // dd($file_toefl);

        
        $sidang->ta_semhas_id = $request->input('ta_semhas');
        $sidang->sidang_at = $request->input('sidang_at');
        $sidang->sidang_time = $request->input('sidang_time');
        $sidang->ruangan_id = $request->input('ruangan');
        $sidang->status = $request->input('status');

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
            $path_toefl = $file_toefl->storeAs('public/files',$file_toefl->getClientOriginalName());
            $taSidang->file_toefl = $file_toefl->getClientOriginalName();
        }

        if ($file_laporan != null) {
            $path_laporan = $file_laporan->storeAs('public/files',$file_laporan->getClientOriginalName());
            $taSidang->file_laporan = $file_laporan->getClientOriginalName();
        }

        if ($file_pengesahan != null) {
            $path_pengesahan = $file_pengesahan->storeAs('public/files',$file_pengesahan->getClientOriginalName());
            $taSidang->file_lembaran_pengesahan = $file_pengesahan->getClientOriginalName();
        }
        
        $taSidang->ta_semhas_id = $request->input('ta_semhas');
        $taSidang->sidang_at = $request->input('sidang_at');
        $taSidang->sidang_time = $request->input('sidang_time');
        $taSidang->ruangan_id = $request->input('ruangan');
        $taSidang->status = $request->input('status');
        $taSidang->save();
            
        return redirect('admin/sidang');
    }
    
    public function show($id)
    {
        $sidangta = TaSidang::where('ta_sidang.id', '=', $id)
        ->select('mahasiswa.nama as nama_mahasiswa', 
        'mahasiswa.nim', 'tugas_akhir.judul', 'ta_sidang.sidang_at', 
        'ta_sidang.sidang_time', 'ruangan.nama as nama_ruang', 'ta_sidang.nilai_angka',
         'ta_sidang.nilai_huruf', 'ta_sidang.nilai_toefl')
        ->join('ta_semhas', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')  
        ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
        ->join('tugas_akhir', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
        ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')        
        ->first();
        
        $penguji = DB::table('ta_penguji_sidang')
         ->join('dosen', 'dosen.id', '=', 'ta_penguji_sidang.dosen_id')
         ->join('ta_sidang', 'ta_sidang.id', '=', 'ta_penguji_sidang.ta_sidang_id')
         ->select('dosen.nama as nama_dosen','dosen.id as id_dosen','ta_penguji_sidang.*')
         ->get();
        //  dd($penguji);
      
        return view('backend.sidang_ta.show', compact('sidangta', 'penguji', 'id'));
    }
    public function lihat($id){
        
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
        ->get();
       
        return view('backend.sidang_ta.show_penguji', compact('sidangta'));

    }
    
    public function destroy($id)
    {
        $sidangtas = TaPengujiSidang::where('ta_sidang_id', $id);
      
        $sidangtas->delete();
        

        $sidangta = TaSidang::find($id);
        $sidangta->delete();
        session()->flash('flash_success', 'Berhasil menghapus data sidang ta dengan id '.$sidangta->id);
        return redirect()->route('admin.sidang_ta.index');
    }
    // public function hapus($id){
    //     dd('hamdi');
    // }

    public function add($id){
         $penguji = TaPengujiSidang::where('ta_sidang_id', '=', $id)
         ->join('dosen', 'dosen.id', '=', 'ta_penguji_sidang.dosen_id')
         ->join('ta_sidang', 'ta_sidang.id', '=', 'ta_penguji_sidang.ta_sidang_id')
         ->select('dosen.nama as nama_dosen','dosen.id as id_dosen')
         ->get();
         
         $dosen_db =  Dosen::all();
         $dosen = $dosen_db->pluck('nama', 'id');
         
        return view('backend.sidang_ta.penguji', compact('sidangta','dosen', 'id'));
    }

    public function insert(Request $request){
        $penguji = new TaPengujiSidang;
        $penguji->ta_sidang_id = $request->input('ta_sidang');
        $penguji->dosen_id = $request->input('dosen');
        $penguji->jabatan = $request->input('jabatan');
        $penguji->bersedia = $request->input('sedia');
        $penguji->save();
        return redirect()->route('admin.sidang_ta.show',$request->ta_sidang);
    }

    public function destroydosen($id)
    {
        // dd($rute);
        $user = TaPengujiSidang::find($id);
        $user->delete();
        session()->flash('flash_success', 'Berhasil menghapus data dosen'.$user->id);
        return redirect()->back();
    
    }
}
