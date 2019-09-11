@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
   
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List Data Nilai Tugas Akhir') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($nilaiTA, ['route' => ['admin.nilaiTA.update', $nilaiTA->id], 'method' =>'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Nilai Tugas Akhir
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        {{ Form::text('nim', null, ['class' => 'form-control-plaintext', 'id' => 'nim', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul Tugas Akhir</label>
                        {{ Form::text('judul', null, ['class' => 'form-control-plaintext', 'id' => 'judul', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_angka">Nilai Angka</label>
                        {{ Form::text('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka', 'placeholder' => 'Nilai Angka']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_akhir_ta">Nilai Akhir Tugas Akhir</label>
                        {{ Form::select('nilai_akhir_ta', ['A'=>'A', 'A-'=>'A-', 'B+'=>'B+', 'B'=>'B', 'B-'=>'B-', 'C+'=>'C+', 'C'=>'C'],null, ['class' => 'form-control', 'id' => 'nilai_akhir_ta', 'placeholder' => 'Nilai Akhir Tugas Akhir']) }}
                    </div>

                </div>

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
