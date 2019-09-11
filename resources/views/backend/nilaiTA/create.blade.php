@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.index'), 'icon-list', 'List nilaiTA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.nilaiTA.store', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah nilaiTA
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <!-- <div class="form-group">
                        <label for="nilai_angka">Nilai Angka</label>
                        {{ Form::text('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka']) }}
                    </div> -->
                    
                    <div class="form-group">
                        <label for="judul">Judul Tugas Akhir</label>
                        {{ Form::select('judul', $judul, null, ['class' => 'form-control', 'id' => 'judul']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_angka">Nilai Angka</label>
                        {{ Form::text('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka']) }}
                    </div>

                    <div class="form-group">
                        <label for="nilai_akhir_ta">Nilai Akhir Tugas Akhir</label>
                        {{ Form::select('nilai_akhir_ta', ['A'=>'A', 'A-'=>'A-', 'B+'=>'B+', 'B'=>'B', 'B-'=>'B', 'C+'=>'C+', 'C'=>'C'],null, ['class' => 'form-control', 'id' => 'nilai_akhir_ta', 'placeholder' => 'Nilai Akhir Tugas Akhir']) }}
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
