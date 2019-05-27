<?php

namespace App\Http\Controllers;
use App\Dosen;
use App\keluarga;

use Illuminate\Http\Request;


class keluargaController extends Controller
{
  
    public function index()
    {
        $keluargas = keluarga::paginate(25);
        return view('backend.keluarga.index', compact('keluargas'));
    }

    public function show(keluarga $keluarga){
        return view('backend.keluarga.show',compact('keluarga'));
    }
  public function create()
    {
        return view('backend.keluarga.create');
    }

     public function store(Request $request)
    {
       
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'nama' => 'required',
            'hubungan'=>'required',
            'hidup' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
            ]);


        $keluarga = new Keluarga;
        $keluarga->id=$request->input('id');
        $keluarga->nama=$request->input('nama');
        $keluarga->user_id=$request->input('user_id');
        $keluarga->hubungan=$request->input('hubungan');
        $keluarga->jenis_kelamin=$request->input('jenis_kelamin');
        $keluarga->tempat_lahir=$request->input('tempat_lahir');
        $keluarga->tanggal_lahir=$request->input('tanggal_lahir');
        $keluarga->alamat=$request->input('alamat');
        $keluarga->pekerjaan=$request->input('pekerjaan');
        $keluarga->hidup=$request->input('hidup');
        $keluarga->no_hp=$request->input('no_hp');

        $keluarga->save();

        session()->flash('flash_success', 'Berhasil menambah data keluarga atas nama '. $request->input('nama'));
        return redirect()->route('admin.keluarga.index');
    }
}
