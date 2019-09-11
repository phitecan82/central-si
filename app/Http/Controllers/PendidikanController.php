<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPendidikan;
use App\User;
use App\Mahasiswa;
use App\Dosen;
use App\Tendik;
use App\RefJenjangPendidikan;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
{
	protected $validation_rules = [
        'user_id' => 'required|',
        'jenjang_id' => 'required',
        'nama_sekolah' => 'required',
        'jurusan' => 'required',
        'tahun_masuk' => 'required',
        'tahun_lulus' => 'required',
        'lokasi_sekolah' => 'required',
        'nomor_ijazah' => 'required',
        'dalam_negeri' => 'required',
        'file_ijazah' => 'file|mimes:pdf'
            ];

    public function index()
    {
        $pendidikans = UserPendidikan::paginate(25);
        return view('backend.pendidikan.index', compact('pendidikans'));
    }

    public function destroy(UserPendidikan $pendidikan)
    {
    	$pendidikan->delete();
        session()->flash('flash_success', 'Berhasil menghapus data Riwayat Pendidikan dengan id :'.$pendidikan->user_id);
        return redirect()->route('admin.pendidikan.index');
    }

    public function show(UserPendidikan $pendidikan)
    {   
        // dd($pendidikan);
        $user = Tendik::where('id',$pendidikan->user_id)->pluck('nama');
        // dd($user);
        if(!isset($user[0])){
            $user = Mahasiswa::where('id',$pendidikan->user_id)->pluck('nama');
        }
        if(!isset($user[0])){
            $user = Dosen::where('id',$pendidikan->user_id)->pluck('nama');
        }
        // dd($user);   
        // dd($pendidikan->user_id);
        $tipe = User::where('id',$pendidikan->user_id)->pluck('type');
        $atu = array(
            1 => 'Mahasiswa',
            2 => 'Dosen',
            3 => 'Tendik'
        );

        // dd($atu[$tipe[0]]);
        $type = $atu[$tipe[0]];
        $file = Storage::url($pendidikan->file_ijazah);
        // dd($tipe);
        $jenjang=RefJenjangPendidikan::where('id',$pendidikan->jenjang_id)->pluck('tingkat');

        return view('backend.pendidikan.show', compact('pendidikan','tipe', 'user','jenjang','file', 'atu'));
    }

    
    public function create()
    {
        $user=User::pluck('username','id');
        $jenjang=RefJenjangPendidikan::pluck('tingkat','id');
        return view('backend.pendidikan.create', compact('user','jenjang'));
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->validation_rules);
        
        $pendidikan = new UserPendidikan();
        $pendidikan->user_id = $request->input('user_id');
        $pendidikan->jenjang_id = $request->input('jenjang_id');
        $pendidikan->nama_sekolah = $request->input('nama_sekolah');
        $pendidikan->tahun_masuk = $request->input('tahun_masuk');
        $pendidikan->jurusan = $request->input('jurusan');
        $pendidikan->tahun_lulus = $request->input('tahun_lulus');
        $pendidikan->dalam_negeri = $request->input('dalam_negeri');
        $pendidikan->lokasi_sekolah = $request->input('lokasi_sekolah');
        $pendidikan->nomor_ijazah = $request->input('nomor_ijazah');

            if($request->file('file_ijazah')->isValid())
            {
             $filename = uniqid('ijazah-');
             $fileext = $request->file('file_ijazah')->extension();
             $filenameext = $filename.'.'.$fileext;

             $filepath = $request->file_ijazah->storeAs('file_ijazah',$filenameext);

             $pendidikan->file_ijazah = $filepath;
            }

        try {
            if($pendidikan->save()){
               session()->flash('flash_success', 'Berhasil menambahkan data riwayat pendidikan dengan id user = '. $request->input('user_id'));
                return redirect()->route('admin.pendidikan.index');
            }
        } catch (Exception $e) {
            session()->flash('flash_success', 'error'. $e);
                return redirect()->back();
        }


 
    }

    public function edit(UserPendidikan $pendidikan)
    {
        $user=User::pluck('username','id');
        $jenjang=RefJenjangPendidikan::pluck('tingkat','id');  
       return view('backend.pendidikan.edit', compact('pendidikan','user','jenjang'));
    }

     public function update(Request $request, UserPendidikan $pendidikan)
    {
         $this->validate($request, $this->validation_rules);
        
    $pendidikan = UserPendidikan::findOrFail($pendidikan->id);
    

        $pendidikan->user_id = $request->id;
        $pendidikan->user_id = $request->user_id;
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->nama_sekolah = $request->nama_sekolah;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->tahun_lulus = $request->tahun_lulus;
        $pendidikan->dalam_negeri = $request->dalam_negeri;
        $pendidikan->lokasi_sekolah = $request->lokasi_sekolah;
        $pendidikan->nomor_ijazah = $request->nomor_ijazah;
          if(empty($pendidikan->file_ijazah))
                       {
 


if($request->file('file_ijazah')->isValid())
            {
                //hapus file, jika sebelumnya sudah ada
                if (\Storage::exists($semhas->file_ba_seminar)) 
                {
                     \Storage::delete($semhas->file_ba_seminar);
                }
                $filename = uniqid('ijazah-');
                $fileext = $request->file('file_ijazah')->extension();
                $filenameext = $filename.'.'.$fileext;
                $filepath = $request->file_ijazahr->storeAs('/ijazah',$filenameext);
                $ijazah->file_ijazah = $filepath;
            
          }
      
      else
      {$pendidikan->save();
      }
    }

           if ($pendidikan->save()) {
                session()->flash('flash_success','Berhasil memperbaharui data Riwayat Pendidikan');
             //redirect kehalaman detail
                 return redirect()->route('admin.pendidikan.show', [$pendidikan->id]);
            }
            return redirect()->route('admin.pendidikan.show');
    }


    public function getDownload($type, $ikan, $file_id){
        //PDF file is stored under project/public/download/info.pdf
        $lokasi = null;
        if ($type == 'dokumen') {
            $lokasi = 'file_ijazah';
        }

        return response()->file(
            storage_path('app/'.$lokasi.'/'.$file_id)
        );     
    }

}
