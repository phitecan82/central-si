<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KpInstansi;
use App\KpMahasiswa;
use App\KpPeserta;
use App\KpProposal;

class ProposalKPController extends Controller
{

    public function __construct(){
        $this->middleware(['permission:manage_proposalkp']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kp_proposals = KpProposal::paginate(25);
        return view('backend.proposal-kp.index', compact('kp_proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instansi = KpInstansi::pluck('nama', 'id');
        return view('backend.proposal-kp.create', compact('instansi'));
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
        KpProposal::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data proposal kp dengan judul '. $request->input('judul'));
        // return redirect()->route('admin.dosen.show', [$user->id]);
        return redirect()->route('admin.proposal-kp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $KpProposal = KpProposal::findOrFail($id);
        return view('backend.proposal-kp.show', compact('KpProposal'));
        // echo "tes";
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
        //
    }
}
