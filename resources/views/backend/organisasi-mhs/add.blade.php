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

                {{ Form::open(['route' => 'admin.organisasi-mhs.insert', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Tambah Anggota KP "{{ $KP->judul }}"</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <input type="hidden" name="kp_proposal_id" value="{{ $KP->id }}">

                    <div class="form-group">
                        <label for="mahasiswa_id">Mahasiswa*</label>
                        {!! Form::select('mahasiswa_id', $mhs, null, ['class' => 'form-control', 'id' => 'mahasiswa_id', 'required' => 'required']) !!}
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
