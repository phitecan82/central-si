@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Organisasi Mahasiswa' => route('admin.organisasi-mhs.index'),
        'Add' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.index'), 'icon-list', 'List Organisasi Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.organisasi-mhs.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Tambah Organisasi Mahasiswa</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                 
                 <div class="form-group">
                    <label for="mahasiswa_nim">Nama Mahasiswa*</label>
                    {{ Form::select('mahasiswa_id', $mahasiswa, null, ['class' => 'form-control', 'id' => 'mahasiswa_nim', 'placeholder' => ' Nama Mahasiswa']) }}
                </div>
                <!--<div class="form-group">
                    <label for="mahasiswa_nama">Nama Mahasiswa*</label>
                    {{ Form::select('mahasiswa_nama', $mahasiswa, null, ['class' => 'form-control', 'id' => 'mahasiswa_nama', 'placeholder' => ' Nama Mahasiswa']) }}
                </div>-->
                <div class="form-group">
                    <label for="organisasi">Organisasi*</label>
                    {{ Form::text('organisasi', null, ['class' => 'form-control', 'id' => 'organisasi', 'placeholder' => 'Organisasi Mahasiswa']) }}
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan*</label>
                    {{ Form::select('jabatan_id', $ref_jabatan_organisasi, null, ['class' => 'form-control', 'id' => 'jabatan_id', 'placeholder' => 'Jabatan Mahasiswa']) }}
                </div>
                <div class="form-group">
                     <label for="tgl_mulai">Tanggal Mulai Organisasi*</label>
                    {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control', 'id' => 'tgl_mulai', 'placeholder' => 'Tanggal Organisasi Dimulai']) }}
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai Organisasi*</label>
                    {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control', 'id' => 'tgl_selesai', 'placeholder' => 'Tanggal Organisasi Selesai']) }}
                </div>
                <div class="form-group">
                    <label for="file_bukti">Surat Bukti Pengesahan(.pdf)</label><br>
                    {{ Form::file('file_bukti', null, ['class' => 'form-control', 'id' => 'file_bukti', 'placeholder' => 'File Bukti']) }}
                </div>    
            </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
          
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
