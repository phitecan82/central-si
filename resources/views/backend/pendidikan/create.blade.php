@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'pendidikan' => route('admin.pendidikan.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pendidikan.index'), 'icon-list', 'Daftar Riwayat Pendidikan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['route' => 'admin.pendidikan.store', 'method' => 'post','files'=>'true']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Riwayat Pendidikan
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.pendidikan._form')
                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">
                     <p>*Wajib Diisi!</p>
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
