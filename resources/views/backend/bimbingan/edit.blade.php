@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Bimbingan' => route('admin.bimbingan.index'),
        'Riwayat' => route('admin.bimbingan.show', [$id]),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.bimbingan.show', [$id]), 'icon-list', 'List Bimbingan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($bimbingan, ['route' => ['admin.bimbingan.update', $bimbingan->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Bimbingan
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.bimbingan._form')
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
