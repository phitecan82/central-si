<?php

namespace App\Http\Controllers;


use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Ruangan;
use App\TaSemhas;
use App\TaPesertaSemhas;
use App\Mahasiswa;
use App\User;



class PesertaSemhasController extends Controller
{
    public function index($id)
    {
        $semhass=DB::table('ta_semhas')
                   ->join('ta_peserta_semhas','ta_semhas.id','=','ta_peserta_semhas.ta_semhas_id')
                   ->join('mahasiswa','ta_peserta_semhas.mahasiswa_id','=','mahasiswa.id')
                   ->select('ta_peserta_semhas.id','mahasiswa.nim','mahasiswa.nama','ta_peserta_semhas.mahasiswa_id')
                   ->where('ta_semhas.id','=',$id)
                   ->paginate(25);
        return view('backend.pesertasemhas.index', compact('semhass', 'id'));
    }
    public function create($id)
    {
        $mahasiswas = Mahasiswa::all()->pluck('nama','id');
    	return view('backend.pesertasemhas.create',compact('mahasiswas','id'));
    }
    public  function store(Request $request)
    {
    

    	$request->validate([
            'ta_semhas_id'=>'required',
            'mahasiswa_id' => 'required' 
        ]);

    		$pesertas = new TaPesertaSemhas();
            $pesertas->ta_semhas_id = $request->input('ta_semhas_id');
            $pesertas->mahasiswa_id = $request->input('mahasiswa_id');
            $pesertas->save();
            
            return redirect()->route('admin.pesertasemhas.index',[$pesertas->ta_semhas_id]);
            
    }
    public function destroy($id)
    {
        $peserta = TaPesertaSemhas::find($id);
        $peserta->delete();
        session()->flash('flash_success', 'Berhasil menghapus data peserta');
        return redirect()->route('admin.pesertasemhas.index',[$peserta->ta_semhas_id]);
    } 
   

}
