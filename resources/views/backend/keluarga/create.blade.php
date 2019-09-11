@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        $user => route('admin.keluarga.index', [$user]),
        'keluarga' => route('admin.keluarga.show', [$user, $id]),
        'tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.keluarga.show', [$user, $id]), 'icon-list', 'List Keluarga') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.keluarga.store', 'method' => 'post']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah keluarga
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.keluarga._form')
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
