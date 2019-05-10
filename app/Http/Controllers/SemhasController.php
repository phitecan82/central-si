<?php

namespace App\Http\Controllers;

use App\TaSemhas;
use App\Ruangan;
use App\TaSempro;
use DB;
use Illuminate\Http\Request;

class SemhasController extends Controller
{
    public function index()
    {
        $semhass = DB::table('ta_semhas')
                   ->join('ruangan', 'ta_semhas.ruangan_id', '=', 'ruangan.id')
                   ->select('ta_semhas.id','ta_semhas.semhas_at','ta_semhas.semhas_time','ruangan.nama')
                   ->paginate(25);
        return view('backend.semhas.index', compact('semhass'));
    }

    public function create()
    {
    	$ruangan = Ruangan::all()->pluck('nama','id');
        $sempro = TaSempro::all()->pluck('proposal_status','id');
        return view('backend.semhas.create', compact('ruangan','sempro'));
    }

    public  function store(Request $request)
    {

    	$request->validate([
            'semhas_at' => 'required',
            'semhas_time' => 'required',
            'ruangan_id' => 'required',
            'sidang_deadline_at' => 'required',
    		'file_ba_seminar' => 'file|mimes:pdf',
    		'file_laporan_ta' => 'file|mimes:pdf'
        ]);

    		$semhas = new TaSemhas();
            $semhas->ta_sempro_id = $request->input('ta_sempro_id');
    		$semhas->semhas_at = $request->input('semhas_at');
    		$semhas->semhas_time = $request->input('semhas_time');
    		$semhas->ruangan_id = $request->input('ruangan_id');
            $semhas->status = $request->input('status');
            $semhas->rekomendasi = $request->input('rekomendasi');
    	    $semhas->sidang_deadline_at = $request->input('sidang_deadine_at');

    		if($request->file('file_ba_seminar')->isValid())
    		{
    			$filename = uniqid('ba-seminar-');
    			$fileext = $request->file('file_ba_seminar')->extension();
    			$filenameext = $filename.'.'.$fileext;

    			$filepath = $request->file_ba_seminar->storeAs('ba_seminar',$filenameext);
    			$semhas->file_ba_seminar = $filepath;
    		}

            if($request->file('file_laporan_ta')->isValid())
            {
                $filename = uniqid('laporan-');
                $fileext = $request->file('file_laporan_ta')->extension();
                $filenameext = $filename.'.'.$fileext;

                $filepath = $request->file_laporan_ta->storeAs('laporan_ta',$filenameext);
                $semhas->file_laporan_ta = $filepath;
            }

    		$semhas->save();

            return redirect()->route('admin.semhas.show',[$semhas->id]);
    }
    
    public function show()
    {
        
    }
}
