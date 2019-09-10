<?php

// namespace App\Http\Controllers;
// use App\Dosen;
// use App\keluarga;
// use App\User;
// use Illuminate\Http\Request;

// class keluargaController extends Controller
// {

// private $validation_rules = [
//     'nama' => 'required',
//     'hubungan' => 'required',
//     'jenis_kelamin' => 'required',
//     'tempat_lahir' => 'numeric',
//     'tanggal_lahir' => 'numeric',
//     'alamat' => 'required',
//     'no_hp' => 'numeric',
//     'email' => 'required',
//     'pekerjaan' => 'required',
//     'hidup' => 'required'
//   ];

//     public function indexMahasiswa()
//     {
//         $keluargas = User::
//         join('mahasiswa', 'mahasiswa.id', '=', 'users.id')
//         ->select('mahasiswa.id','mahasiswa.nama')
//         ->paginate(25);
//         return view('backend.keluarga.index', compact('keluargas'));
        
//     }

//     public function indexDosen()
//     {
//         $keluargas = User::
//         join('dosen', 'dosen.id', '=', 'users.id')
//         ->select('dosen.id','dosen.nama')
//         ->paginate(25);
//         return view('backend.keluarga.index', compact('keluargas'));
        
//     }

//     public function indexTendik()
//     {
//         $keluargas = User::
//         join('tendik', 'tendik.id', '=', 'users.id')
//         ->select('tendik.id', 'tendik.nama')
//         ->paginate(25);
//         return view('backend.keluarga.index', compact('keluargas'));
        
//     }

//      public function detail($keluarga)
//      {
//         $keluarga=keluarga::findOrFail($keluarga);
//         // dd($keluarga);
//           return view('backend.keluarga.detail',compact('keluarga'));

//      }

//     public function show($id) 
//     {
//         $keluargas = UserKeluarga::
//         join('users', 'users.id', '=', 'user_keluarga.user_id')
//         ->join('mahasiswa', 'mahasiswa.id', '=', 'users.id')
//         ->select('user_keluarga.nama', 'user_keluarga.tanggal_lahir', 'user_keluarga.no_hp')
//         ->paginate(25);  

//         return view('backend.keluarga.show', compact('keluargas'));
//     }

//     // public function show(keluarga $keluarga)
//     // {
//     //     return view('backend.keluarga.show',compact('keluarga'));
//     // }


//     public function create()
//     {
//         return view('backend.keluarga.create');
//     }

//      public function store(Request $request)
//     {
       
//         $request->validate([
//             'id' => 'required',
//             'user_id' => 'required',
//             'nama' => 'required',
//             'hubungan'=>'required',
//             'hidup' => 'required',
//             'tempat_lahir' => 'required',
//             'tanggal_lahir' => 'required'
//             ]);


//         $keluarga = new Keluarga;
//         $keluarga->id=$request->input('id');
//         $keluarga->nama=$request->input('nama');
//         $keluarga->user_id=$request->input('user_id');
//         $keluarga->hubungan=$request->input('hubungan');
//         $keluarga->jenis_kelamin=$request->input('jenis_kelamin');
//         $keluarga->tempat_lahir=$request->input('tempat_lahir');
//         $keluarga->tanggal_lahir=$request->input('tanggal_lahir');
//         $keluarga->alamat=$request->input('alamat');
//         $keluarga->pekerjaan=$request->input('pekerjaan');
//         $keluarga->hidup=$request->input('hidup');
//         $keluarga->no_hp=$request->input('no_hp');

//         $keluarga->save();

//         session()->flash('flash_success', 'Berhasil menambah data keluarga atas nama '. $request->input('nama'));
//         return redirect()->route('admin.keluarga.index');
//     }

//      public function edit(Keluarga $keluarga)
//      {
//         // dd($keluarga);
//          return view('backend.keluarga.edit', compact('keluarga'));
//      }
     
//      public function update(Request $request, $keluarga)
//      {
//          $request->validate([
//            'nama',
//            'hubungan',
//            'jenis_kelamin',
//            'tempat_lahir',
//            'tanggal_lahir',
//            'alamat',
//            'no_hp',
//            'email',
//            'pekerjaan',
//            'hidup']);
         
//          $keluarga = Keluarga::findOrFail($keluarga);
//          $data = $request->all();
//          $keluarga->update($data);
 
//          session()->flash('flash_success', 'Berhasil mengupdate data keluarga '.$keluarga->nama);
//          return redirect()->route('admin.keluarga.index');
//      }
     
//      public function destroy($keluarga)
//      {
//          $keluarga = Keluarga::find($keluarga);
//          $keluarga->delete($keluarga);
 
//          session()->flash('flash_success', "Berhasil menghapus keluarga ".$keluarga->nama);
//          return redirect()->route('admin.keluarga.index');
//      }


// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserKeluarga;
use App\Dosen;
use App\Mahasiswa;
use App\Tendik;
use DB;

class KeluargaController extends Controller
{

    private $validation_rules = [
        'nama' => 'required',
        'hubungan' => 'required',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'no_hp' => 'numeric',
        'email' => 'required',
        'pekerjaan' => 'required',
        'hidup' => 'required'
      ];

    public function index($user = null)
    {
        if($user == 'dosen') {
            $keluargas = Dosen::select('id', 'nama', 'nik as nomor')->paginate(25);
            $nomor = 'NIP';
        } else if($user == 'tendik') {
            $keluargas = Tendik::select('id', 'nama', 'nik as nomor')->paginate(25);
            $nomor = 'NIP';
        } else if($user == 'mahasiswa') {
            $keluargas = Mahasiswa::select('id', 'nama', 'nim as nomor')->paginate(25);
            $nomor = 'NIM';
        } else {
            abort(404);
        }

        return view('backend.keluarga.index', compact('keluargas', 'user', 'nomor'));
    }

    public function create($user, $id)
    {
        return view('backend.keluarga.create', compact('user', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);
        $data = $request->except('user');
        UserKeluarga::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data keluarga');
        return redirect()->route('admin.keluarga.show', [$request->user, $request->user_id]);

    }

    public function show($user, $id)
    {
        if($user == 'dosen') {
            $nama = Dosen::findOrFail($id);
        } else if($user == 'tendik') {
            $nama = Tendik::findOrFail($id);
        } else if($user == 'mahasiswa') {
            $nama = Mahasiswa::findOrFail($id);
        } else {
            abort(404);
        }

        $keluargas = UserKeluarga::select('id', 'nama', 
                                DB::raw('(CASE 
                                    WHEN jenis_kelamin = "0" THEN "Laki-Laki" 
                                    WHEN jenis_kelamin = "1" THEN "Perempuan" END) 
                                    AS jenis_kelamin'), 
                                DB::raw('(CASE 
                                    WHEN hubungan = "0" THEN "Ayah" 
                                    WHEN hubungan = "1" THEN "Ibu"
                                    WHEN hubungan = "2" THEN "Saudara" END) 
                                    AS hubungan'))
                                ->where('user_id', '=', $id)
                                ->paginate(100);
        return view('backend.keluarga.show', compact('keluargas', 'user', 'id', 'nama'));
    }

    public function edit($user, $id)
    {
        $keluarga = UserKeluarga::findOrFail($id);
        $id = $keluarga->user_id;
        return view('backend.keluarga.edit', compact('keluarga', 'user', 'id'));
    }

    public function update($user, $id, Request $request)
    {
        $this->validate($request, $this->validation_rules);
        $keluarga = UserKeluarga::findOrFail($id);
        $data = $request->except('user');
        $keluarga->update($data);
        session()->flash('flash_success', 'Berhasil memperbaharui data keluarga');
        return redirect()->route('admin.keluarga.show', [$request->user, $keluarga->user_id] );
   
    }

    public function destroy($user, $id)
    {
        $data = UserKeluarga::findOrFail($id);
        UserKeluarga::destroy($id);

        session()->flash('flash_success', 'Berhasil menghapus data '.$data->nama);
        return redirect()->route('admin.keluarga.show', [$user, $data->user_id]);
    }

    public function detail($user, $id)
    {
        $keluarga = UserKeluarga::
        select('id', 'user_id', 'nama',  
                DB::raw('(CASE 
                    WHEN hubungan = "0" THEN "Ayah" 
                    WHEN hubungan = "1" THEN "Ibu"
                    WHEN hubungan = "2" THEN "Saudara" END) 
                    AS hubungan'),
                DB::raw('(CASE 
                    WHEN jenis_kelamin = "0" THEN "Laki-Laki" 
                    WHEN jenis_kelamin = "1" THEN "Perempuan" END) 
                    AS jenis_kelamin'),
                'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp', 'email', 'pekerjaan',
                DB::raw('(CASE 
                    WHEN hidup = "0" THEN "Meninggal" 
                    WHEN hidup = "1" THEN "Hidup" END) 
                    AS hidup')
            )
        ->findOrFail($id);
        // dd($keluarga->user_id);
        return view('backend.keluarga.detail', compact('keluarga', 'id', 'user'));
    }
}

