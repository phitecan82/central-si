<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;

use App\Mahasiswa;
use App\MahasiswaOrganisasi;
use App\RefJabatanOrganisasi;
use DB;

 class OrganisasiMhsController extends Controller
{

    public $organisasi_validation_rules = [
       'mahasiswa_id' => 'required',
        'organisasi' => 'required',
        'jabatan_id' => 'required',
        'tgl_mulai' => 'required',
        'tgl_selesai' => 'required',
        'file_bukti' => 'file'
    ];

     
    public function index()
    {
        $mhs_organisasis = MahasiswaOrganisasi::
            join('mahasiswa', 'mahasiswa_organisasi.mahasiswa_id', '=', 'mahasiswa.id')->  
            join('ref_jabatan_organisasi', 'mahasiswa_organisasi.jabatan_id', '=', 'ref_jabatan_organisasi.id')->
            select('mahasiswa_organisasi.id', 'mahasiswa.nama', 'mahasiswa_organisasi.organisasi','mahasiswa_organisasi.jabatan_id','mahasiswa.nim','mahasiswa.nama','ref_jabatan_organisasi.jabatan')
            ->orderBy('mahasiswa_organisasi.created_at', 'desc')->paginate(25);
        return view('backend.organisasi-mhs.index', compact('mhs_organisasis'));        
    }
     
    public function create()
        {
            $ref_jabatan_organisasi = RefJabatanOrganisasi::all()->pluck('jabatan','id');
            $mahasiswa_organisasi = MahasiswaOrganisasi::all()->pluck('organisasi', 'id');
            $mahasiswa = Mahasiswa::all()->pluck('nama', 'id');
          
        return view('backend.organisasi-mhs.create', compact('ref_jabatan_organisasi', 'mahasiswa_organisasi', 'mahasiswa')); 
        }	 

    public function store(Request $request)
        {	 
            // dd($request->all());
            $this->validate($request, $this->organisasi_validation_rules);
            $file = $request->file('file_bukti');
            $data = $request->except('file_bukti');
            // dd($file);
        if($file){
            $fileName = sha1(microtime()) . '.' . $file->getClientOriginalExtension();
            $destinationPath = $file->storeAs('public/file', $fileName);
            $file->move($destinationPath, $fileName);
            $data['file_bukti'] = $fileName;
        } 
            MahasiswaOrganisasi::create($data);
            session()->flash('flash_success', 'Berhasil menambahkan data organisasi '.$request->organisasi);
        return redirect()->route('admin.organisasi-mhs.index');        
   }

    public function show($id)
        {	    
        $organisasi = MahasiswaOrganisasi::
            join('mahasiswa', 'mahasiswa_organisasi.mahasiswa_id', '=', 'mahasiswa.id')->
            join('ref_jabatan_organisasi', 'mahasiswa_organisasi.jabatan_id', '=', 'ref_jabatan_organisasi.id')
            ->select('mahasiswa_organisasi.mahasiswa_id', 'mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa_organisasi.organisasi', 'mahasiswa_organisasi.tgl_mulai', 'mahasiswa_organisasi.tgl_selesai', 'mahasiswa_organisasi.file_bukti', 
            DB::raw('(CASE 
                    WHEN mahasiswa_organisasi.jabatan_id = "1" THEN "General Farmworker" 
                    WHEN mahasiswa_organisasi.jabatan_id = "2" THEN "Atmospheric and Space Scientist" 
                    WHEN mahasiswa_organisasi.jabatan_id = "3" THEN "Welder-Fitter" 
                    WHEN mahasiswa_organisasi.jabatan_id = "4" THEN "Writer OR Author" 
                    WHEN mahasiswa_organisasi.jabatan_id = "5" THEN "Punching Machine Setters" 
                    WHEN mahasiswa_organisasi.jabatan_id = "6" THEN "Septic Tank Servicer" 
                    WHEN mahasiswa_organisasi.jabatan_id = "7" THEN "Occupational Therapist Aide" 
                    ELSE "" END) AS jabatan_id'))
                ->findOrFail($id);
        return view('backend.organisasi-mhs.show', compact('organisasi'));
        }	    

    public function edit($id)
        {	    
            $MhsOrganisasi=MahasiswaOrganisasi::findOrFail($id);
            $jabatans = RefJabatanOrganisasi::all();
            $namas = Mahasiswa::all();
        return view('backend.organisasi-mhs.edit', compact('MhsOrganisasi', 'jabatans','namas'));
        }	    
        
    public function update(Request $request, $id)
        {	
            $this->validate($request, $this->organisasi_validation_rules);    
            $organisasi = MahasiswaOrganisasi::findOrFail($id);
            $file = $request->file('file_bukti');
            $data = $request->except('file_bukti');
            if($file){
                $fileName = sha1(microtime()) . '.' . $file->getClientOriginalExtension();
                $destinationPath = $file->storeAs('public/file', $fileName);
                $file->move($destinationPath, $fileName);
                $data['file_bukti'] = $fileName;
            } 
            $organisasi->update($data);
            session()->flash('flash_success', 'Berhasil mengupdate data organisasi '.$request->input('organisasi'));
        return redirect()->route('admin.organisasi-mhs.show', $id);
        }	    
    
    public function destroy($id)
        {	    
            $organisasi = MahasiswaOrganisasi::findOrFail($id);
            MahasiswaOrganisasi::destroy($id);       
            try{
                MahasiswaOrganisasi::destroy($id);
                session()->flash('flash_success', 'Berhasil Menghapus data organisasi '.$organisasi->organisasi);	            
            }catch(Exception $e){
                session()->flash('flash_warning', 'Gagal Menghapus data organisasi'.$organisasi->organisasi);
           }
        return redirect()->route('admin.organisasi-mhs.index');
         }	    
}