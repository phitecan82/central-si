<?php

namespace App\Http\Controllers;
use App\Dosen;
use App\TaSidang;
use App\User;
use Illuminate\Http\Request;


class SidangController extends Controller
{   
    public $validation_rules = [
        'email' => 'required|email',
        'nidn' => 'required',
        'nama' => 'required',
        'nik' => 'required',
    ];
    
    public function index()
    {   
        $sidangtas = TaSidang::paginate(3);
        return view('backend.sidang_ta.index', compact('sidangtas'));
    }
    public function destroy(TaSidang $sidangta)
    {
        $sidangtas = TaSidang::find($sidangta->id);
        $sidangta->delete();
        optional($sidangtas)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data sidang ta dengan id '.$sidangta->id);
        return redirect()->route('admin.sidang_ta.index');
    }
    public function create()
    {
        return view('backend.sidangta.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::MAHASISWA
        ]);

        $user->mahasiswa()->create($request->only(
            'ta_semhas_id',
            'sidang_at',
            'sidang_time',
            'ruangan_id',
            'status',
            'nilai_angka',
            'nilai_huruf'));

        session()->flash('flash_success', 'Berhasil menambahkan data sidang pada tanggal'. $request->input('sidang_at'));
        return redirect()->route('admin.sidang_ta.show', [$user->id]);
    }
}
