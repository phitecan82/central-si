<?php

namespace App\Http\Controllers;

use App\Tendik;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TendikController extends Controller
{
   

    public $validation_rules = [
        'email' => 'required|email',
        // 'email' => 'required|email|unique:users,email',
        'nip' => 'required',
        'nama' => 'required',
        'nik' => 'required',
        'photo' => 'image',
// <<<<<<< HEAD
//         'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         // 'photo' => 'image|mimes:jpeg, jpg, png'
// =======
   
// >>>>>>> 33491d406c1afc133f809f9a25adddadfb507fad
        // 'photo' => 'image',
        // 'photo' => 'mimes:jpeg,bmp,png'
        
        // 'photo' => 'mimes:jpeg, jpg, png'
    ];


    public function __construct()
    {
        $this->middleware(['permission:manage_lecturers']);
    }

    public function index()
    {
        $tendiks = Tendik::paginate(25);
        return view('backend.tendik.index', compact('tendiks'));
    }

    public function create()
    {
        return view('backend.tendik.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::TENDIK
        ]);

        // $user->tendik()->create($request->only(
        //     'nip',
        //     'nama',
        //     'nik',
        //     'tempat_lahir',
        //     'tanggal_lahir',
        //     'nohp',
        //     'photo'
        // ));

        // $tendik = new Tendik();
        // $tendik->nik = $request->input('nik');
        // $tendik->nama = $request->input('nama');
        // $tendik->nip = $request->input('nip');
        // $tendik->tempat_lahir = $request->input('tempat_lahir');
        // $tendik->tanggal_lahir = $request->input('tanggal_lahir');
        // $tendik->nohp = $request->input('nohp');      
             

        if ($request->file('photo')->isValid()) {
         
            $filename = uniqid('tendik-');
            $fileext = $request->file('photo')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->photo->storeAs('public/foto_tendik', $filenameext);
        }
        
        $data=$request->except('photo', 'email');
        $data['photo'] = $filenameext;
        $user->tendik()->create($data);
        // $tendik->save();


        session()->flash('flash_success', 'Berhasil menambahkan data tendik atas nama '. $request->input('nama'));
        return redirect()->route('admin.tendik.show', [$user->id]);
    } 

     public function show(Tendik $tendik)
    {
        // dd($tendik);
        return view('backend.tendik.show', compact('tendik'));
    }

    public function edit(Tendik $tendik)
    {
        return view('backend.tendik.edit', compact('tendik'));
    }

     public function update(Request $request, Tendik $tendik)
    {

        $this->validate($request, $this->validation_rules);

        // $tendik->update($request->only(
        //     'nip',
        //     'nama',
        //     'nik',
        //     'tempat_lahir',
        //     'tanggal_lahir',
        //     'nohp',
        //     'photo'
        // ));

        $tendik->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        if ($request->file('photo')->isValid()) {

            Storage::disk('public')->delete('foto_tendik'.$tendik->photo);
         
            $filename = uniqid('tendik-');
            $fileext = $request->file('photo')->extension();
            $filenameext = $filename.'.'.$fileext;

            $filepath = $request->photo->storeAs('public/foto_tendik', $filenameext);
        }
        $data=$request->except('photo', 'email');
        $data['photo'] = $filenameext;
        $tendik->update($data);

    

        session()->flash('flash_success', 'Berhasil mengupdate data tendik '.$tendik->nama);
        return redirect()->route('admin.tendik.show', [$tendik->id]);
    }

    public function destroy(Tendik $tendik)
    {
        $user = User::find($tendik->id);
        $tendik->delete();
        optional($user)->delete();

        session()->flash('flash_success', "Berhasil menghapus tendik ".$tendik->nama);
        return redirect()->route('admin.tendik.index');
    }


}
 


