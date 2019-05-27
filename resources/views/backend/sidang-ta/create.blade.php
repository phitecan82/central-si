@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Sidang TA' => route('admin.sidang_ta.index'),
        'Create' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.index'), 'icon-list', 'List Sidang TA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['route' => 'admin.sidang_ta.store', 'method' => 'post', 'enctype '=> 'multipart/form-data']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah Mahasiswa
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                    @include('backend.sidang_ta._form')
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
