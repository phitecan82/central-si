<?php

namespace App\Http\Controllers;
use App\Pengabdian;
use App\PengabdianUser;
use Illuminate\Http\Request;
use App\User;
class PengabdianAnggota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $Pengabdians = Pengabdian::paginate(25);
        $Pengabdians = PengabdianUser::
                        join('users', 'pengabdian_user.user_id', '=', 'users.id')
        // $Pengabdians = User::
                        ->join('dosen', 'users.id', '=', 'dosen.id')
                        ->select('pengabdian_user.id', 'dosen.nama')
                        ->paginate(5);
        // dd($Pengabdians);
        return view('backend.pengabdiananggota.index', compact('Pengabdians', 'id'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::join('dosen', 'users.id', '=', 'dosen.id')
                    ->pluck('dosen.nama', 'users.id');
        return view('backend.pengabdiananggota.create', compact('user', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        PengabdianUser::create($data);
        return redirect()->route('admin.pengabdian.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengabdianUser::destroy($id);
        return redirect()->route('admin.pengabdian.index');        
    }
}
