@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Prestasi' => route('admin.prestasi-mhs.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.prestasi-mhs.index'), 'icon-list', 'List Prestasi Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($prestasi, ['route' => ['admin.prestasi-mhs.update', $prestasi->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Prestasi Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.prestasi-mhs._form')
                    <i>Abaikan jika tidak ingin mengganti file sertifikat</i>
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
