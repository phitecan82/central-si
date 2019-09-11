<?php

namespace App\Http\Controllers;

use App\KpLogbook;
use App\KpMahasiswa;
use App\Mahasiswa;
use Illuminate\Http\Request;

class KpLogbookController extends Controller
{

    public function index()
    {
        $kpLogbook = Mahasiswa::select('mahasiswa.nama', 'kp_logbook.id', 'kp_logbook.tanggal', 'kp_logbook.logbook', 'kp_logbook.catatan', 'kp_logbook.status')
        ->join('kp_mahasiswa', 'mahasiswa.id', '=', 'kp_mahasiswa.mahasiswa_id')
        ->join('kp_logbook', 'kp_mahasiswa.id', '=', 'kp_logbook.kp_mahasiswa_id')
        ->paginate(25);
                                
        return view('backend.logbook.index', compact('kpLogbook'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::
        join('kp_mahasiswa', 'mahasiswa.id', '=', 'kp_mahasiswa.mahasiswa_id')
        ->pluck('mahasiswa.nama', 'mahasiswa.id');
        return view('backend.logbook.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'logbook' => 'required',
            'catatan' => 'required',
            'status' => 'required',
            'mahasiswa_id' => 'required'
        ]);

        $mahasiswa_id = $request->input('mahasiswa_id');
        $kp_mahasiswa_id = KpMahasiswa::where('mahasiswa_id', '=', $mahasiswa_id)->first();
        if($kp_mahasiswa_id == null){
            session()->flash('flash_success', 'Mahasiswa ini masih dalam proses kp');
            return redirect()->route('admin.logbook.create');
        }else{
        $id_kp = $kp_mahasiswa_id->id;

        $logbook = KpLogbook::create([
            'tanggal' => $request->input('tanggal'),
            'logbook' => $request->input('logbook'),
            'catatan' => $request->input('catatan'),
            'status' => $request->input('status'),
            'kp_mahasiswa_id' => $id_kp
        ]);

        if($logbook->save()) {
            session()->flash('flash_success', 'Berhasil menambahkan data logbook baru');
            //Redirect ke halaman detail
            return redirect()->route('admin.logbook.show', [$logbook->id]);
        }
        return redirect()->back()->withErrors();
    }
    }

    public function show($id)
    {
        $id_judul = KpLogbook::findOrFail($id)->kp_mahasiswa_id;

        $kpLogbook = KpLogbook::findOrFail($id);
        $judul = KpMahasiswa::findOrFail($id_judul)->mahasiswa_id;
        $id_nama = Mahasiswa::where('id', '=', $judul)->first();
        $nama = $id_nama->nama;


        $status = KpLogbook::findOrFail($id)->status;
        if($status == 0){
            $status = "Belum Disetujui";
        }else if($status == 1){
            $status = "Telah Disetujui";
        }else{
            $status = "Ditolak";
        }

        return view('backend.logbook.show', compact('kpLogbook', 'status', 'nama'));
    }

    public function edit($id)
    {
        $kpLogbook = KpLogbook::findOrFail($id);
        $mahasiswa = Mahasiswa::
        join('kp_mahasiswa', 'mahasiswa.id', '=', 'kp_mahasiswa.mahasiswa_id')
        ->pluck('mahasiswa.nama', 'mahasiswa.id');
        return view('backend.logbook.edit', compact('kpLogbook' , 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal' => 'required',
            'logbook' => 'required',
            'catatan' => 'required',
            'status' => 'required',
            'mahasiswa_id' => 'required'
        ]);

        $kpLogbook = KpLogbook::findOrFail($id);

        $mahasiswa_id = $request->input('mahasiswa_id');
        $kp_mahasiswa_id = KpMahasiswa::where('mahasiswa_id', '=', $mahasiswa_id)->first();
        if($kp_mahasiswa_id == null){
            session()->flash('flash_success', 'Mahasiswa ini masih dalam proses kp');
            return redirect()->route('admin.logbook.edit', [$kpLogbook->id]);
        }else{
        $id_kp = $kp_mahasiswa_id->id;

        $kpLogbook->tanggal = $request->input('tanggal');
        $kpLogbook->logbook = $request->input('logbook');
        $kpLogbook->catatan = $request->input('catatan');
        $kpLogbook->status = $request->input('status');
        $kpLogbook->kp_mahasiswa_id = $id_kp;
        if($kpLogbook->save()) {
            session()->flash('flash_success', 'Berhasil memperbaharui data logbook');
            //Redirect ke halaman detail
            return redirect()->route('admin.logbook.show', [$kpLogbook->id]);
        }
        return redirect()->back()->withErrors();
    }
    }

    public function destroy($id)
    {
        kpLogbook::destroy($id);
        session()->flash('flash_success', "Berhasil menghapus data logbook");
        return redirect()->route('admin.logbook.index');
    }
}
