@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa2' => route('admin.mahasiswa2.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.mahasiswa2.index'), 'icon-list', 'List Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['route' => 'admin.mahasiswa2.store', 'method' => 'post']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Mahasiswa
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.mahasiswa2._form')
                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
