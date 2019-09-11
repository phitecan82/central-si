@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Organisasi Mahasiswa' => route('admin.organisasi-mhs.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
   
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.index'), 'icon-list', 'List Organisasi') !!}
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.create'), 'icon-plus', 'Tambah Organisasi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                 {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Organisasi Mahasiswa</strong>
                </div>

                 {{-- CARD BODY--}}
                <div class="card-body">

                     {{ Form::model($organisasi, []) }}

                    
                     <div class="form-group">
                        <label for="mahasiswa_nim"> <b>NIM</b> </label>
                        {!! Form::text('nim', null, ['class' => 'form-control-plaintext', 'id' => 'nim', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        <label for="mahasiswa_nama"> <b>Nama Mahasiswa</b> </label>
                        {!! Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>
                    
                     <div class="form-group">
                        <label for="organisasi"> <b>Organisasi</b> </label>
                        {!! Form::text('organisasi', null, ['class' => 'form-control-plaintext', 'id' => 'organisasi', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>

                     <div class="form-group">
                        <label for="jabatan_id"> <b>Jabatan</b> </label>
                        {{ Form::text('jabatan_id', null, ['class' => 'form-control-plaintext', 'id' => 'jabatan_id', 'readonly' => 'readonly', 'disabled']) }}
                    </div>
                    
                     <div class="form-group">
                        <label for="tgl_mulai"> <b>Tanggal Mulai</b> </label>
                        {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control-plaintext', 'id' => 'tgl_mulai', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                     <div class="form-group">
                        <label for="tgl_selesai"> <b>Tanggal Selesai</b> </label>
                        {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control-plaintext', 'id' => 'tgl_selesai', 'readonly' => 'readonly', 'disabled']) }}
                    </div>
                     <div class="form-group">
                        <label for="download"><strong>File Bukti</strong></label>
                        {{ Form::text('download', null, ['class' => 'form-control-plaintext', 'id' => 'download', 'readonly' => 'readonly']) }}
                         <a href="{{url('storage/file')}}/{{$organisasi->file_bukti}}">Download</a>
                    </div>
                     {{ Form::close() }}
                 

                 {{-- CARD FOOTER --}}
                <div class="card-footer">

                 </div>
            </div>
        </div>
    </div>
@endsection