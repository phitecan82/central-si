@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Prestasi' => route('admin.prestasi-mhs.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.prestasi-mhs.destroy', [$prestasi->id]), $prestasi->id, 'icon-trash', 'Hapus Prestasi', 'Anda yakin akan menghapus data prestasi mahasiswa ini?') !!}
    {!! cui_toolbar_btn(route('admin.prestasi-mhs.index'), 'icon-list', 'List Prestasi') !!}
    {!! cui_toolbar_btn(route('admin.prestasi-mhs.edit', [$prestasi->id]), 'icon-pencil', 'Edit Prestasi') !!}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Prestasi mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($prestasi, []) }}

                    <div class="form-group">
                        <label for="nama"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nama_lomba"><strong>Nama Lomba</strong></label>
                        {{ Form::text('nama_lomba', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="prestasi"><strong>Prestasi</strong></label>
                        {{ Form::text('prestasi', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tingkat"><strong>Tingkat</strong></label>
                        {{ Form::text('tingkat', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="penyelenggara"><strong>Penyelenggara</strong></label>
                        {{ Form::text('penyelenggara', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tempat"><strong>Tempat</strong></label>
                        {{ Form::text('tempat', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tgl_mulai"><strong>Tanggal Mulai</strong></label>
                        {{ Form::text('tgl_mulai', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tgl_selesai"><strong>Tanggal Selesai</strong></label>
                        {{ Form::text('tgl_selesai', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>
                    
                    <div class="form-group">
                        <label for="download"><strong>File Sertifikat</strong></label><br>
                        @if($prestasi->sertifikat != null)
                            <a href="{{ route('storage.prestasi-mhs.sertifikat', [$prestasi->sertifikat]) }}"  target="_blank">Lihat File</a> | 
                            <a href="{{ route('storage.prestasi-mhs.sertifikat', [$prestasi->sertifikat]) }}"  target="_blank" download>Download File</a>
                        @else
                            <i>File sertifikat belum diupload!</i>
                        @endif
                    </div>


                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

@endsection