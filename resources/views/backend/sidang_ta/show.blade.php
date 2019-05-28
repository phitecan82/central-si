@extends('backend.layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Sidang
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($sidangta, []) }}

                    <div class="form-group">
                        <label for="nama"><strong>Nama Dosen Penguji</strong></label>
                        {!! Form::text('nama', null, ['class' => 'form-control-plaintext','id' => 'nama','readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group">
                        <label for="nama"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('nama_mahasiswa', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nim"><strong>Nim</strong></label>
                        {{ Form::text('nim', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="judul"><strong>Judul Tugas Akhir</strong></label>
                        {{ Form::text('judul', null, ['class' => 'form-control-plaintext','readonly' => 'readonly','disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="sidang_at"><strong>Tanggal Sidang</strong></label>
                        {{ Form::text('sidang_at', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="sidang_time"><strong>Waktu Sidang</strong></label>
                        {{ Form::text('sidang_time', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="ruangan"><strong>Nama Ruangan</strong></label>
                        {{ Form::text('nama_ruangan', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_angka"><strong>Nilai Angka</strong></label>
                        {{ Form::text('nilai_angka', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_huruf"><strong>Nilai Huruf</strong></label>
                        {{ Form::text('nilai_huruf', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_toefl"><strong>Nilai Toefl</strong></label>
                        {{ Form::text('nilai_toefl', null, ['class' => 'form-control-plaintext','readonly' => 'readonly']) }}
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
