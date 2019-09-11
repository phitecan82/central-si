<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Publikasi;
use Illuminate\Support\Facades\Storage;
class PublikasiController extends Controller
{
    public function index()
    {
    	$publikasis = Publikasi::paginate(25);
        return view('backend.publikasi.index', compact('publikasis'));
    }
    public function create()
    {
    	return view('backend.publikasi.create');
    }
    public function store(Request $request)
    {
    	$request -> validate([
    		'judul' => 'required' ,
    		'tahun' => 'required|digits:4',
    		'nama_publikasi' => 'required',
    		'jenis_publikasi' => 'numeric',
    		'total_dana' => 'numeric',
    		'file_artikel' => 'file|mimes:pdf',
    		'publisher' => 'required',
    		'url' => 'required'
    	]);
    	$publikasi = new Publikasi();
    	$publikasi->judul = $request->input('judul');
    	$publikasi->tahun = $request->input('tahun');   
    	$publikasi->nama_publikasi = $request->input('nama_publikasi');
    	$publikasi->jenis_publikasi = $request->input('jenis_publikasi');
    	$publikasi->total_dana = $request->input('total_dana');
			$publikasi->url = $request->input('url');
			$publikasi->publisher = $request->input('publisher');
			//simpan file
			$file_artikel = null;
    	if($request->hasFile('file_artikel') && $request->file('file_artikel')->isValid())
    	{
    		$filename = uniqid('Artikel-');
    		$fileext = $request->file('file_artikel')->extension();
				$filenameext = $filename.'.'.$fileext;
				
    		//$filepath = $request->file_artikel->storeAs('publikasi_artikel', $filenameext);
				//$publikasi->file_artikel = $filepath;
				$file_artikel = $request->file_artikel->storeAs('public/file_artikel/', $filenameext);
				// dd(1);
				$publikasi->file_artikel = $filenameext;
			}
    	$publikasi->save();
    	return redirect()->route('admin.publikasi.index', [$publikasi]);
    }
    public function edit(Publikasi $publikasi)
    {
		return view('backend.publikasi.edit', compact('publikasi'));
		}
		
  public function update(Request $request, Publikasi $publikasi)
  {
			$request->validate([
					'judul' => 'required',
					'tahun' => 'required|digits:4',
					'nama_publikasi' => 'required',
					'jenis_publikasi' => 'numeric',
					'total_dana' => 'numeric',
					'file_artikel' => 'file|mimes:pdf',
					'publisher' => 'required',
					'url' => 'required' 
			]);

	$publikasi ->judul = $request->input ('judul');
	$publikasi ->tahun = $request->input ('tahun');
	$publikasi ->nama_publikasi = $request->input ('nama_publikasi');
	$publikasi ->jenis_publikasi = $request->input ('jenis_publikasi');
	$publikasi ->total_dana = $request->input ('total_dana');
	//$publikasi ->file_artikel = $request->input ('file_artikel');
	//$publikasi ->publisher = $request->input ('publisher');
	$publikasi ->url = $request->input ('url');
	$publikasi->publisher = $request->input('publisher');
	//simpan file upload
	if($request->File('file_artikel')->isValid())
		{
		//Hapus file jika sebelumnya sudah ada
			if(Storage ::exists($publikasi->file_artikel))
				{
					Storage ::delete ($publikasi->file_artikel);
				}
				//simpan file yang diupload
				$filename = uniqid('artikel-');
				$fileext = $request->file ('file_artikel')->extension();
				$filenameext =$filename.'.'.$fileext;
   			//$publikasi ->judul = $request->input ('judul');
   			//$publikasi ->tahun = $request->input ('tahun');
   			//$publikasi ->nama_publikasi = $request->input ('nama_publikasi');
   			//$publikasi ->jenis_publikasi = $request->input ('jenis_publikasi');
   			//$publikasi ->total_dana = $request->input ('total_dana');
   			//$publikasi ->file_artikel = $request->input ('file_artikel');
   			//$publikasi ->publisher = $request->input ('publisher');
				 //$publikasi ->url = $request->input ('url');
				 
				$filepath =$request->file_artikel->storeAs('file_artikel', $filenameext);
				$publikasi->file_artikel = $filepath;
   			//simpan file upload
   		if($request->File('file_artikel')->isValid())
  			 {
    		//Hapus file jika sebelumnya sudah ada
    				if(Storage ::exists($publikasi->file_artikel))
    			{
     				Storage ::delete ($publikasi->file_artikel);
    			}
    		//simpan file yang diupload
    		$filename = uniqid('artikel-');
    		$fileext = $request->file ('file_artikel')->extension();
    		$filenameext =$filename.'.'.$fileext;

				$filepath = $request->file_artikel->storeAs('/publikasi_artikel', $filenameext);
				$publikasi->file_artikel = $filepath;
				}
			if($publikasi->save())
				{
					session()->flash('flash_success','Berhasil memperbaharui data publikasi');
				//redirect kehalaman detail
				return redirect()->route ('admin.publikasi.show',[$publikasi->id]);
				}

				return redict()->back()->withErrors();
		 }
		}
	
		public function destroy($id)
		{
			$publikasi = publikasi::find($id);
			$publikasi->delete();
			session()->flash('flash_success','berhasil menghapus data publikasi');
			return redirect()->route('admin.publikasi.index');
		}
		public function show(Publikasi $publikasi)
    {
		return view('backend.publikasi.show', compact('publikasi'));
		}

		public function getDownload($type, $file_id){
			$lokasi = null;
			if($type == 'file_artikel'){
				$lokasi = 'public/file_artikel/';
			}
			return response()->file(
				storage_path('app/'.$lokasi.'/'.$file_id)
			);
		}
}