@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Tendik' => route('admin.tendik.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.tendik.index'), 'icon-list', 'List Tendik') !!}
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                
                {{ Form::open(['route' => 'admin.tendik.store', 'method' => 'post', 'files'=> 'true']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Tendik
                </div>

                {{-- CARD BODY--}}

                <div class="card-body">
                    @include('backend.tendik._form')
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
