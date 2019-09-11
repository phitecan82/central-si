@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Logbook' => route('admin.logbook.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.logbook.index'), 'icon-list', 'List Logbook Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.logbook.store', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Logbook
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.logbook._form')
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
