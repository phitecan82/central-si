<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KpInstansi;
use App\KpMahasiswa;
use App\KpPeserta;
use App\KpProposal;
use App\Mahasiswa;
use DB;
Use Exception;

class ProposalKPController extends Controller
{
    public $proposal_validation_rules = [
        'judul' => 'required',
        'instansi_id' => 'required',
        'latar_belakang' => 'required',
        'tujuan' => 'required',
        'usulan_mulai_at' => 'required',
        'usulan_selesai_at' => 'required'
    ];

    public $anggota_validation_rules = [
        'mahasiswa_id' => 'required',
        'bidang_usulan' => 'required'
    ];

    public function __construct(){
        $this->middleware(['permission:manage_proposalkp']);
    }

    public function index()
    {
        $kp_proposals = KpProposal::orderBy('created_at', 'desc')->paginate(25);
        return view('backend.proposal-kp.index', compact('kp_proposals'));
    }

    public function create()
    {
        $instansi = KpInstansi::pluck('nama', 'id');
        return view('backend.proposal-kp.create', compact('instansi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->proposal_validation_rules);
        $data = $request->all();
        KpProposal::create($data);
        $id = DB::getPdo()->lastInsertId();
        session()->flash('flash_success', 'Berhasil menambahkan data proposal kp dengan judul '. $request->input('judul'));
        return redirect()->route('admin.proposal-kp.show', $id);
    }

    public function show($id)
    {
        $KpProposal = DB::table('kp_proposal')
                        ->join('kp_instansi', 'kp_proposal.instansi_id', '=', 'kp_instansi.id')
                        ->select('kp_proposal.id', 'kp_proposal.judul', 'kp_proposal.latar_belakang', 'kp_proposal.tujuan', 'kp_proposal.usulan_mulai_at', 'kp_proposal.usulan_selesai_at', 'kp_proposal.catatan', 'kp_instansi.nama', DB::raw('(CASE WHEN kp_proposal.status_proposal = 1 THEN '. "'Disetujui'" .'ELSE' . "'Belum/Tidak Disetujui'" . 'END) AS status_proposal'))
                        ->where('kp_proposal.id', '=', $id)
                        ->get();
        $KpProposal = $KpProposal[0];
        return view('backend.proposal-kp.show', compact('KpProposal'));
    }

    public function showKelompok($id)
    {
        $KpProposal = KpProposal::findOrFail($id);
        $anggotas = DB::table('kp_proposal')
                        ->join('kp_mahasiswa', 'kp_proposal.id', '=', 'kp_mahasiswa.kp_proposal_id')
                        ->join('mahasiswa', 'kp_mahasiswa.mahasiswa_id', '=', 'mahasiswa.id')
                        ->select('kp_mahasiswa.id', 'mahasiswa.nama', 'kp_mahasiswa.mahasiswa_id')
                        ->where('kp_proposal.id', '=', $id)
                        ->get();
        return view('backend.proposal-kp.showKelompok', compact('anggotas', 'KpProposal'));
    }

    public function edit($id)
    {
        $KpProposal=KpProposal::findOrFail($id);
        $instansis = KpInstansi::all();
        return view('backend.proposal-kp.edit', compact('KpProposal', 'instansis'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->proposal_validation_rules);
        $proposal = KpProposal::findOrFail($id);
        $data = $request->all();
        $proposal->update($data);
        session()->flash('flash_success', 'Berhasil mengupdate data proposal kp '.$request->input('judul'));
        return redirect()->route('admin.proposal-kp.show', $id);
    }

    public function destroy($id)
    {   
        $proposal = KpProposal::findOrFail($id);
        try{
            KpProposal::destroy($id);
            session()->flash('flash_success', 'Berhasil Menghapus data proposal kp dengan judul '.$proposal->judul);
        } catch(Exception $e){
            session()->flash('flash_warning', 'Gagal Menghapus data proposal kp dengan judul '.$proposal->judul.'. Masih ada mahasiswa yang terdaftar.');
        }
        return redirect()->route('admin.proposal-kp.index');

    }

    public function add($id)
    {
        $KP = KpProposal::findOrFail($id);
        $mhs = Mahasiswa::pluck('nama', 'id');
        return view('backend.proposal-kp.add', compact('mhs', 'KP'));
    }

    public function insert(Request $request)
    {
        $this->validate($request, $this->anggota_validation_rules);
        $data = $request->all();
        KpMahasiswa::create($data);
        session()->flash('flash_success', 'Berhasil menambahkan data anggota KP');
        return redirect()->route('admin.proposal-kp.showkelompok',$request->kp_proposal_id);
    }

    public function hapusAnggota($id)
    {
        $data = KpMahasiswa::findOrFail($id);
        
        try{
            KpMahasiswa::destroy($id);
            session()->flash('flash_success', 'Berhasil Menghapus data anggota kp');
        } catch(Exception $e){
            session()->flash('flash_warning', 'Gagal Menghapus data anggota kp');
        }
        return redirect()->route('admin.proposal-kp.showkelompok',$data->kp_proposal_id);
    }
}
