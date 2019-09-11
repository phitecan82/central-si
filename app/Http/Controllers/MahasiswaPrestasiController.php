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
        'sertifikat' => 'file'
    ];

    public function index()
    {
        $prestasis = MahasiswaPrestasi::
                        join('mahasiswa', 'mahasiswa_prestasi.mahasiswa_id', '=', 'mahasiswa.id')
                        ->select('mahasiswa_prestasi.id', 'mahasiswa.nama', 'mahasiswa_prestasi.nama_lomba', 'mahasiswa_prestasi.prestasi')
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
        $file = $request->file('sertifikat');
        $data = $request->except('sertifikat');
        if($file){
            $fileName = sha1(microtime()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = $file->storeAs('storage/prestasi', $fileName);
            $file->move($destinationPath, $fileName);
            $data['sertifikat'] = $fileName;
        }        
        MahasiswaPrestasi::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data prestasi '.$request->nama_lomba);
        return redirect()->route('admin.prestasi-mhs.index');
    }

    public function show($id)
    {
        $prestasi = MahasiswaPrestasi::
                    join('mahasiswa', 'mahasiswa.id', '=', 'mahasiswa_prestasi.mahasiswa_id')
                    ->select('mahasiswa_prestasi.id', 'mahasiswa.nama', 'mahasiswa_prestasi.nama_lomba', 'mahasiswa_prestasi.prestasi', 'mahasiswa_prestasi.penyelenggara', 'mahasiswa_prestasi.tempat', 'mahasiswa_prestasi.tgl_mulai', 'mahasiswa_prestasi.tgl_selesai', 'mahasiswa_prestasi.sertifikat', 
                    DB::raw('(CASE 
                    WHEN mahasiswa_prestasi.tingkat = "0" THEN "Kab/Kota" 
                    WHEN mahasiswa_prestasi.tingkat = "1" THEN "Provinsi" 
                    WHEN mahasiswa_prestasi.tingkat = "2" THEN "Regional" 
                    WHEN mahasiswa_prestasi.tingkat = "3" THEN "Nasional" 
                    WHEN mahasiswa_prestasi.tingkat = "4" THEN "Internasional" 
                    ELSE "" END) AS tingkat'))
                    ->findOrFail($id);
        return view('backend.prestasi-mhs.show', compact('prestasi'));
    }

    public function edit($id)
    {
        $prestasi = MahasiswaPrestasi::findOrFail($id);
        $mahasiswas = Mahasiswa::pluck('nama', 'id');
        return view('backend.prestasi-mhs.edit', compact('prestasi', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validation_rules);        
        $file = $request->file('sertifikat');
        $data = $request->except('sertifikat');
        if($file){
            $fileName = sha1(microtime()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = $file->storeAs('storage/prestasi', $fileName);
            $file->move($destinationPath, $fileName);
            $data['sertifikat'] = $fileName;
        }        
        $prestasi = MahasiswaPrestasi::findOrFail($id);
        $prestasi->update($data);
        session()->flash('flash_success', 'Berhasil memperbaharui data prestasi '.$prestasi->nama_lomba);
        return redirect()->route('admin.prestasi-mhs.show', [$prestasi->id]);   
    }

    public function destroy($id)
    {
        $prestasi = MahasiswaPrestasi::findOrFail($id);
        MahasiswaPrestasi::destroy($id);
        session()->flash('flash_success', 'Berhasil menghapus data prestasi '.$prestasi->nama_lomba);
        return redirect()->route('admin.prestasi-mhs.index'); 
    }
}
