@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.sidang_ta.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.penguji', [$id]), 'icon-plus', 'Tambah Penguji') !!}
    {!! cui_toolbar_btn(route('admin.sidang_ta.index'), 'icon-list', 'List Sidang TA') !!}
    {!! cui_toolbar_btn(route('admin.sidang_ta.edit', [$id]), 'icon-pencil', 'Edit Data Sidang TA Ini') !!}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Detail Sidang
                </div>


                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama"><strong>Nama Mahasiswa</strong></label>
                        <p>{{$sidangta->nama_mahasiswa}}</p>
                    </div>

                    <div class="form-group">
                        <label for="nim"><strong>Nim</strong></label>
                        <p>{{$sidangta->nim}}</p>
                    </div>

                    <div class="form-group">
                        <label for="judul"><strong>Judul Tugas Akhir</strong></label>
                        <p>{{$sidangta->judul}}</p>
                    </div>

                    <div class="form-group">
                        <label for="sidang_at"><strong>Tanggal Sidang</strong></label>
                        <p>{{$sidangta->sidang_at}}</p>
                    </div>

                    <div class="form-group">
                        <label for="sidang_time"><strong>Waktu Sidang</strong></label>
                        <p>{{$sidangta->sidang_time}}</p>
                    </div>

                    <div class="form-group">
                        <label for="ruangan"><strong>Nama Ruangan</strong></label>
                        <p>{{$sidangta->nama_ruang}}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Status Sidang</strong></label>
                        <p>{{$sidangta->status}}</p>
                    </div>

                    <div class="form-group">
                        <label for="nilai_angka"><strong>Nilai Angka</strong></label>
                        <p>{{$sidangta->nilai_angka}}</p>
                    </div>

                    <div class="form-group">
                        <label for="nilai_huruf"><strong>Nilai Huruf</strong></label>
                        <p>{{$sidangta->nilai_huruf}}</p>
                    </div>

                    <div class="form-group">
                        <label for="nilai_toefl"><strong>Nilai Toefl</strong></label>
                        <p>{{$sidangta->nilai_toefl}}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>File-file</strong></label>
                        <p>
                            <a href="{{ url('/storage/'.$sidangta->file_toefl) }}">File TOEFL</a> | 
                            <a href="{{ url('/storage/'.$sidangta->file_laporan) }}">File Laporan</a> | 
                            <a href="{{ url('/storage/'.$sidangta->file_lembaran_pengesahan) }}">File Lembaran Pengesahan</a>
                        </p>
                    </div>
                    
                    <label><b>Daftar Penguji Sidang</b></label>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Penguji</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Bersedia</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>  
                                @foreach($pengujis as $penguji)                        
                                <tr>
                                        <td class="text-center">{{$penguji->nama}}</td>
                                        <td class="text-center">{{$penguji->jabatan}}</td>
                                        <td class="text-center">{{$penguji->bersedia}}</td>
                                        <td class="text-center">  
                                            {!! cui_btn_delete(route('admin.sidang_ta.delete', [$penguji->id]), "Anda yakin akan menghapus data dosen ini?") !!}  
                                        </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

@endsection
