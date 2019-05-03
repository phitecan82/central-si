@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Proposal KP' => route('admin.proposal-kp.index'),
        'Add' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.proposal-kp.index'), 'icon-list', 'List Proposal KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.proposal-kp.insert', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Tambah Anggota KP</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <input type="hidden" name="kp_mahasiswa_id" value="{{ $KP->id }}">

                    <div class="form-group">
                        <label for="mahasiswa_id">Mahasiswa</label>
                        {!! Form::select('mahasiswa_id', $mhs, null, ['class' => 'form-control', 'id' => 'mahasiswa_id', 'required' => 'required']) !!}
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
