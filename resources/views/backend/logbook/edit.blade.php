@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Logbook' => route('admin.logbook.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.logbook.create'), 'icon-plus', 'Tambah Logbook Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.logbook.index'), 'icon-list', 'List Logbook Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($kpLogbook, ['route' => ['admin.logbook.update', $kpLogbook->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Logbook
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.logbook._form')
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
