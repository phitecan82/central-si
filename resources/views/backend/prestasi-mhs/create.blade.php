@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Prestasi' => route('admin.prestasi-mhs.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.prestasi-mhs.index'), 'icon-list', 'List Prestasi Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.prestasi-mhs.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{ csrf_field() }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Prestasi Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.prestasi-mhs._form')
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
