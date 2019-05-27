<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaBimbingan;
use App\TugasAkhir;
use App\TaPembimbing;
use DB;

class BimbinganController extends Controller
{   
    private $validasi=[
        'tugas_akhir_id' => 'required|numeric',
        'pembimbing_id' => 'required|numeric',
        'tanggal' => 'required|date',
        'progress' => 'required',
        'catatan' => 'required',
        'status_bimbingan' => 'required|numeric',
        'file' => 'file'
    ];
        
    public function index()
    {
        $bimbingans = TugasAkhir::
        join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id' )
        ->select('tugas_akhir.id', 'mahasiswa.nama', 'mahasiswa.nim', 'tugas_akhir.judul')
        ->paginate(25);
        
        return view('backend.bimbingan.index', compact('bimbingans'));
    }

    public function create($id)
    {
        $pembimbing = TaPembimbing::
        join('dosen', 'ta_pembimbing.dosen_id', '=', 'dosen.id')
        ->join('tugas_akhir', 'ta_pembimbing.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->select('nama', 'ta_pembimbing.id')
        ->where('tugas_akhir_id', '=', $id)
        ->pluck('nama', 'ta_pembimbing.id');

        return view('backend.bimbingan.create', compact('pembimbing', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validasi);
        $file = $request->file('file');
        $data = $request->except('file');
        // $destinationPath = public_path('file');
        if($file){
            $fileName = str_random('16') . '.' . $file->getClientOriginalExtension();
            $destinationPath = $request->file->storeAs('public/bimbingan', $fileName); 
            $file->move($destinationPath, $fileName);
            $data['file'] = $fileName;
        }
        
        // dd($data);
        TaBimbingan::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data bimbingan');
        return redirect()->route('admin.bimbingan.show', $data['tugas_akhir_id']);
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

        $judul = TugasAkhir::findOrFail($id)->judul;
        return view('backend.bimbingan.show', compact('bimbingans', 'id', 'judul'));
    }

    public function edit($id)
    {
        $bimbingan = TaBimbingan::findOrFail($id);
        $id = $bimbingan->tugas_akhir_id;
        $pembimbing = TaPembimbing::
        join('dosen', 'ta_pembimbing.dosen_id', '=', 'dosen.id')
        ->join('tugas_akhir', 'ta_pembimbing.tugas_akhir_id', '=', 'tugas_akhir.id')
        ->select('nama', 'ta_pembimbing.id')
        ->where('tugas_akhir_id', '=', $id)
        ->pluck('nama', 'ta_pembimbing.id');
        // dd('tes');
        return view('backend.bimbingan.edit', compact('bimbingan', 'id', 'pembimbing'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validasi);
        $bimbingan = TaBimbingan::findOrFail($id);
        $file = $request->file('file');
        // $destinationPath = public_path('file');
        $data = $request->except('file');
        if($file){
            $fileName = str_random('16') . '.' . $file->getClientOriginalExtension();
            $destinationPath = $request->file->storeAs('public/bimbingan', $fileName); 
            $file->move($destinationPath, $fileName);
            $data['file'] = $fileName;
            // dd($data);
        }
        $bimbingan->update($data);
        session()->flash('flash_success', 'Berhasil memperbaharui data bimbingan');
        return redirect()->route('admin.bimbingan.detail', $id);
    }

    public function detail($id)
    {
        $bimbingan = TaBimbingan::
        join('ta_pembimbing', 'ta_pembimbing.id', '=', 'ta_bimbingan.pembimbing_id')
        ->join('dosen', 'ta_pembimbing.dosen_id', '=', 'dosen.id')
        ->select('ta_bimbingan.tugas_akhir_id', 'ta_bimbingan.id', 'dosen.nama', 'ta_bimbingan.tanggal', 'ta_bimbingan.progress', 'ta_bimbingan.catatan', 'ta_bimbingan.file', DB::raw('(CASE WHEN ta_bimbingan.status_bimbingan = "0" THEN "Belum Dilihat" WHEN ta_bimbingan.status_bimbingan = "1" THEN "Belum Disetujui" WHEN ta_bimbingan.status_bimbingan = "2" THEN "Disetujui" END) AS status_bimbingan'))
        ->findOrFail($id);
        
        return view('backend.bimbingan.detail', compact('bimbingan'));
    }
}
