<?php

namespace App\Http\Controllers;
use App\Dosen;
use App\keluarga;

use Illuminate\Http\Request;


class keluargaController extends Controller
{
  
  private $validation_rules = [
    'nama' => 'required',
    'hubungan' => 'required',
    'jenis_kelamin' => 'required',
    'tempat_lahir' => 'numeric',
    'tanggal_lahir' => 'numeric',
    'alamat' => 'required',
    'no_hp' => 'numeric',
    'email' => 'required',
    'pekerjaan' => 'required',
    'hidup' => 'required'
  ];

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

     public function edit(Keluarga $keluarga)
     {
         return view('backend.keluarga.edit', compact('keluarga'));
     }
     
     public function update(Request $request, $keluarga)
     {
         $request->validate([
           'nama',
           'hubungan',
           'jenis_kelamin',
           'tempat_lahir',
           'tanggal_lahir',
           'alamat',
           'no_hp',
           'email',
           'pekerjaan',
           'hidup']);
         
         $keluarga = Keluarga::findOrFail($keluarga);
         $data = $request->all();
         $keluarga->update($data);
 
         session()->flash('flash_success', 'Berhasil mengupdate data keluarga '.$keluarga->nama);
         return redirect()->route('admin.keluarga.index');
     }
     
     public function destroy($id)
     {
         $keluarga = Keluarga::find($id);
         $keluarga->delete($keluarga);
 
         session()->flash('flash_success', "Berhasil menghapus keluarga ".$keluarga->nama);
         return redirect()->route('admin.keluarga.index');
     }

}
