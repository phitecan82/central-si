@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'pendidikan' => route('admin.pendidikan.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pendidikan.create'), 'icon-plus', 'Tambah Riwayat Pendidikan') !!}
    {!! cui_toolbar_btn(route('admin.pendidikan.index'), 'icon-list', 'Daftar Riwayat Pendidikan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                  {{ Form::model($pendidikan, ['route' => ['admin.pendidikan.update', $pendidikan->id], 'method' => 'patch','files'=>'true']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.pendidikan._form')
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


