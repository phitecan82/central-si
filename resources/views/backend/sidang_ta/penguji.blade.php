@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Sidang TA' => route('admin.sidang_ta.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.index'), 'icon-plus', 'List Sidang TA') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

            {{ Form::open(['route' => 'admin.sidang_ta.insert', 'method' => 'post']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Tambah Data Penguji Sidang
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                @include('backend.sidang_ta.add')
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
