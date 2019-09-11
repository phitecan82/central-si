@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'pendidikan' => route('admin.pendidikan.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.pendidikan.destroy', [$pendidikan->id]), $pendidikan->id, 'icon-trash', 'Hapus Riwayat Pendidikan', 'Anda yakin akan menghapus.pendidikan.ini?') !!}
    {!! cui_toolbar_btn(route('admin.pendidikan.index'), 'icon-list', 'Daftar Riwayat Pendidikan') !!}
    {!! cui_toolbar_btn(route('admin.pendidikan.create'), 'icon-plus', 'Tambah Riwayat Pendidikan') !!}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($pendidikan, []) }}

                    <div class="form-group">
                    <label for="username">Username</label>
                        {{ Form::select('username', $user,null, ['class' => 'form-control-plaintext', 'id' => 'username','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                    <label for="username">User Type</label>
                        {{ Form::text('tipe_user', $atu[$tipe[0]], ['class' => 'form-control-plaintext', 'id' => 'tipe_user','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                    <label for="jenjang_id">Jenjang Pendidikan</label>
                        {{ Form::select('jenjang_id',$jenjang ,null, ['class' => 'form-control-plaintext', 'id' => 'tingkat','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        {{ Form::text('nama_sekolah', null, ['class' => 'form-control-plaintext', 'id' => 'nama_sekolah', 'placeholder' => 'Nama Sekolah','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        {{ Form::text('jurusan', null, ['class' => 'form-control-plaintext', 'id' => 'jurusan', 'placeholder' => 'Jurusan','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        {{ Form::text('tahun_masuk', null, ['class' => 'form-control-plaintext', 'id' => 'tahun_masuk', 'placeholder' => 'Tahun Masuk','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        {{ Form::text('tahun_lulus', null, ['class' => 'form-control-plaintext', 'id' => 'tahun_lulus', 'placeholder' => 'Tahun Lulus','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="lokasi_sekolah">Lokasi Sekolah</label>
                        {{ Form::text('lokasi_sekolah', null, ['class' => 'form-control-plaintext', 'id' => 'lokasi_sekolah', 'placeholder' => 'Lokasi Sekolah','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="dalam_negeri">Dalam Negri</label>
                        @if($pendidikan->dalam_negeri == 1)
                          <p>Ya</p>
                        @else
                            <p>Tidak</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nomor_ijazah">Nomor Ijazah</label>
                        {{ Form::text('nomor_ijazah', null, ['class' => 'form-control-plaintext', 'id' => 'email', 'nomor_ijazah','placeholder' => 'Nomor Ijazah','readonly' => 'readonly']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_ijazah">File Ijazah</label><br>
                        {{ Form::text('file_ijazah', null, ['class' => 'form-control-plaintext', 'id' => 'file_ijazah', 'file_ijazah','placeholder' => 'File Ijazah','readonly' => 'readonly']) }}
                    </div>

                    {{ Form::close() }}

                     <a href="{{url('/admin/pendidikan/dokumen')}}/{{$pendidikan->file_ijazah}}" download="">Download</a>

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

@endsection