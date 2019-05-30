<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Dosen;
use App\TaPengujiSidang;  
use App\TaSemhas;
use DB;

class SidangController extends Controller
{
    public $validasi = [
        'ta_semhas_id' => 'required|numeric',
        'status' => 'required|numeric',
        'sidang_at' => 'date_format:Y-m-d|nullable',
        'ruangan' => 'numeric|nullable',
        'status' => 'numeric|nullable',
        'nilai_angka' => 'numeric|nullable',
        'nilai_toefl' => 'numeric|nullable',
        'file_toefl' => 'file|nullable',
        'file_laporan' => 'file|nullable',
        'file_lembaran_pengesahan' => 'file|nullable',
        'nilai_akhir_ta' => 'numeric|nullable'
    ];

    public function index()
    {
        $taSidang = TaSidang::select('mahasiswa.nama as nama_mahasiswa', 'ta_sidang.id',
                'mahasiswa.nim', 'ta_sidang.sidang_at', 'ruangan.nama as nama_ruang')
                ->join('ta_semhas', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')  
                ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                ->join('tugas_akhir', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')        
                ->get();

        return view('backend.sidang_ta.index', compact('taSidang'));
    }
    
    public function create()
    {
        $mahasiswa = TaSemhas::
                    join('ta_sempro', 'ta_sempro.id', '=', 'ta_semhas.ta_sempro_id')
                    ->join('tugas_akhir', 'tugas_akhir.id', '=', 'ta_sempro.tugas_akhir_id')
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'tugas_akhir.mahasiswa_id')
                    ->where('ta_semhas.status', '=', 1)
                    ->pluck('mahasiswa.nama', 'ta_semhas.id');
        $ruangan  = Ruangan::pluck('nama','id');  

        return view('backend.sidang_ta.create', compact('mahasiswa', 'ruangan'));
    }

    public function store(Request $request )
    {
        $this->validate($request, $this->validasi);

        $file_toefl = $request->file('file_toefl');
        $file_laporan = $request->file('file_laporan');
        $file_pengesahan = $request->file('file_lembaran_pengesahan');
        
        $sidang = new TaSidang;
        if ($file_toefl != null) {
            $nama = sha1(microtime()).'.'.$file_toefl->getClientOriginalExtension();
            $path_toefl = $file_toefl->storeAs('public/files', $nama);
            $sidang->file_toefl = $nama;
        }

        if ($file_laporan != null) {
            $nama = sha1(microtime(+1)).'.'.$file_laporan->getClientOriginalExtension();
            $path_laporan = $file_laporan->storeAs('public/files', $nama);
            $sidang->file_laporan = $nama;
        }

        if ($file_pengesahan != null) {
            $nama = sha1(microtime(+2)).'.'.$file_pengesahan->getClientOriginalExtension();
            $path_pengesahan = $file_pengesahan->storeAs('public/files', $nama);
            $sidang->file_lembaran_pengesahan = $nama;
        }
        $sidang->ta_semhas_id = $request->input('ta_semhas_id');
        $sidang->sidang_at = $request->input('sidang_at');
        $sidang->sidang_time = $request->input('sidang_time');
        $sidang->ruangan_id = $request->input('ruangan_id');
        $sidang->nilai_angka = $request->input('nilai_angka');
        $sidang->nilai_huruf = $request->input('nilai_huruf');
        $sidang->nilai_toefl = $request->input('nilai_toefl');
        $sidang->nilai_akhir_ta = $request->input('nilai_akhir_ta');
        $sidang->status = $request->input('status');
        $sidang->save();

        session()->flash('flash_success', 'Berhasil menambahkan data sidang ta');
        return redirect('admin/sidang');
    } 

    public function edit($id)
    {
        $mahasiswa = TaSemhas::
                    join('ta_sempro', 'ta_sempro.id', '=', 'ta_semhas.ta_sempro_id')
                    ->join('tugas_akhir', 'tugas_akhir.id', '=', 'ta_sempro.tugas_akhir_id')
                    ->join('mahasiswa', 'mahasiswa.id', '=', 'tugas_akhir.mahasiswa_id')
                    ->where('ta_semhas.status', '=', 1)
                    ->pluck('mahasiswa.nama', 'ta_semhas.id');
        $ruangan  = Ruangan::pluck('nama','id');
        $taSidang = TaSidang::findOrFail($id);

        return view('backend.sidang_ta.edit', compact('mahasiswa', 'taSidang', 'ruangan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validasi);

        $sidang = TaSidang::findOrFail($id);
        $file_toefl = $request->file('file_toefl');
        $file_laporan = $request->file('file_laporan');
        $file_pengesahan = $request->file('file_lembaran_pengesahan');

        if ($file_toefl != null) {
            $nama = sha1(microtime()).'.'.$file_toefl->getClientOriginalExtension();
            $path_toefl = $file_toefl->storeAs('public/files', $nama);
            $sidang->file_toefl = $nama;
        }

        if ($file_laporan != null) {
            $nama = sha1(microtime(+1)).'.'.$file_laporan->getClientOriginalExtension();
            $path_laporan = $file_laporan->storeAs('public/files', $nama);
            $sidang->file_laporan = $nama;
        }

        if ($file_pengesahan != null) {
            $nama = sha1(microtime(+2)).'.'.$file_pengesahan->getClientOriginalExtension();
            $path_pengesahan = $file_pengesahan->storeAs('public/files', $nama);
            $sidang->file_lembaran_pengesahan = $nama;
        }

        $sidang->ta_semhas_id = $request->input('ta_semhas_id');
        $sidang->sidang_at = $request->input('sidang_at');
        $sidang->sidang_time = $request->input('sidang_time');
        $sidang->ruangan_id = $request->input('ruangan_id');
        $sidang->nilai_angka = $request->input('nilai_angka');
        $sidang->nilai_huruf = $request->input('nilai_huruf');
        $sidang->nilai_toefl = $request->input('nilai_toefl');
        $sidang->nilai_akhir_ta = $request->input('nilai_akhir_ta');
        $sidang->status = $request->input('status');
        $sidang->save();
            
        session()->flash('flash_success', 'Berhasil memperbaharui data sidang ta');
        return redirect("/admin/sidang/$id/show");
    }
    
    public function show($id)
    {
        $sidangta = TaSidang::
                select('mahasiswa.nama as nama_mahasiswa', 
                    'mahasiswa.nim', 'tugas_akhir.judul', 'ta_sidang.sidang_at', 
                    'ta_sidang.sidang_time', 'ruangan.nama as nama_ruang', 'ta_sidang.nilai_angka',
                    'ta_sidang.nilai_huruf', 'ta_sidang.nilai_toefl', 'ta_sidang.file_toefl', 
                    'ta_sidang.file_laporan', 'ta_sidang.file_lembaran_pengesahan', 
                    'ta_sidang.nilai_akhir_ta',
                    DB::raw('(CASE 
                    WHEN ta_sidang.status = 0 THEN "Diajukan"
                    WHEN ta_sidang.status = 10 THEN "Pengajuan Diterima"
                    WHEN ta_sidang.status = 11 THEN "Menunggu Sidang"
                    WHEN ta_sidang.status = 12 THEN "Selesai"
                    WHEN ta_sidang.status = 13 THEN "Batal"
                    WHEN ta_sidang.status = 14 THEN "Gagal"
                    WHEN ta_sidang.status = 20 THEN "Pengajuan Ditolak"
                    END) AS status'))
                ->join('ta_semhas', 'ta_sidang.ta_semhas_id', '=', 'ta_semhas.id')  
                ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=', 'ta_sempro.id')
                ->join('tugas_akhir', 'ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                ->join('ruangan', 'ta_sidang.ruangan_id', '=', 'ruangan.id')        
                ->findOrFail($id);
        
        $pengujis = DB::table('ta_penguji_sidang')
                ->join('dosen', 'dosen.id', '=', 'ta_penguji_sidang.dosen_id')
                ->join('ta_sidang', 'ta_sidang.id', '=', 'ta_penguji_sidang.ta_sidang_id')
                ->select('dosen.nama', 'ta_penguji_sidang.id', 
                    DB::raw('(CASE 
                    WHEN ta_penguji_sidang.jabatan = 0 THEN "Ketua Sidang"
                    WHEN ta_penguji_sidang.jabatan = 1 THEN "Anggota Sidang"
                    END) AS jabatan'),
                    DB::raw('(CASE 
                    WHEN ta_penguji_sidang.bersedia = 1 THEN "Bersedia"
                    WHEN ta_penguji_sidang.bersedia = 0 THEN "Tidak Bersedia"
                    END) AS bersedia'))
                ->where('ta_penguji_sidang.ta_sidang_id', '=', $id)
                ->orderBy('jabatan', 'desc')
                ->get();
                
        return view('backend.sidang_ta.show', compact('sidangta', 'pengujis', 'id'));
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

    public function add($id)
    {
        $dosen = Dosen::pluck('nama', 'id');
        
        return view('backend.sidang_ta.penguji', compact('dosen', 'id'));
    }

    public function insert(Request $request)
    {
        $id = $request->input('ta_sidang_id');
        $data = TaPengujiSidang::get()
                ->where('ta_sidang_id', $id)
                ->where('jabatan', 0)
                ->where('bersedia', 1);

        if($data->isEmpty()){
            $penguji = new TaPengujiSidang;
            $penguji->ta_sidang_id = $request->input('ta_sidang_id');
            $penguji->dosen_id = $request->input('dosen_id');
            $penguji->jabatan = $request->input('jabatan');
            $penguji->bersedia = $request->input('bersedia');
            session()->flash('flash_success', 'Berhasil menambahkan penguji sidang');
            $penguji->save();
        } else{
            session()->flash('flash_warning', 'Ketua sidang sudah ada');
        }  

        return redirect()->route('admin.sidang_ta.show', [$request->ta_sidang_id]);
    }

    public function destroydosen($id)
    {
        $user = TaPengujiSidang::findOrFail($id);
        $user->delete();

        session()->flash('flash_success', 'Berhasil menghapus data dosen'.$user->id);
        return redirect()->back();
    }
}
