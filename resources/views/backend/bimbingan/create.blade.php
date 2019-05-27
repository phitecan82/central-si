@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Bimbingan' => route('admin.bimbingan.index'),
        'Riwayat' => route('admin.bimbingan.show', [$id]),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.bimbingan.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Bimbingan
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.bimbingan._form')
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
