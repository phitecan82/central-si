@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Sidang TA' => route('admin.sidang_ta.index'),
        'Add' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.index'), 'icon-list', 'List Proposal KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.sidang_ta.insert', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Tambah Data Dosen Penguji "{{ $UJ->judul }}"</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <input type="hidden" name="sidang_ta_id" value="{{ $UJ->id }}">

                    <div class="form-group">
                        <label for="dosen_id">Dosen*</label>
                        {!! Form::select('dosen_id', $ds, null, ['class' => 'form-control', 'id' => 'dosen_id', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        <label for="bidang_usulan">Bidang Usulan*</label>
                        {{ Form::text('bidang_usulan', null, ['class' => 'form-control', 'id' => 'bidang_usulan', 'placeholder' => 'Bidang Usulan']) }}
                    </div>

                    <div class="form-group">
                        <label for="judul_laporan">Judul Laporan*</label>
                        {{ Form::text('judul_laporan', null, ['class' => 'form-control', 'id' => 'judul_laporan', 'placeholder' => 'Judul Laporan']) }}
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
