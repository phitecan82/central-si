@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        $user => route('admin.keluarga.index', [$user]),
        'keluarga' => route('admin.keluarga.show', [$user, $keluarga->user_id]),
        'tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.keluarga.index', [$user]), 'icon-list', 'List Keluarga') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($keluarga, ['route' => ['admin.keluarga.update', $user, $keluarga->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Keluarga
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.keluarga._form')
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
