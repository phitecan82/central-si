@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Dosen' => route('admin.dosen.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pengabdian.create'), 'icon-plus', 'Tambah pengabdian') !!}
    {!! cui_toolbar_btn(route('admin.pengabdian.index'), 'icon-list', 'List pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($pengabdian, ['route' => ['admin.pengabdian.update', $pengabdian->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Dosen
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    @include('backend.pengabdian._form')
                    
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
