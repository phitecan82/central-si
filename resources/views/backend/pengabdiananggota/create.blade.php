@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'pengabdian' => route('admin.pengabdian.index'),
        'tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pengabdian.index'), 'icon-list', 'List pengabdian') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::open(['route' => 'admin.pengabdiananggota.store', 'method' => 'post']) }}

                {{-- CARD HEADER --}}
                <div class="card-header">
                    Tambah anggota pengabdian
                </div>

                {{-- CARD BODY --}}
                <div class="card-body">
                <div class="form-group">
                    <label for="user_id">Dosen</label>
                    <input type="hidden" name="pengabdian_id" value="{{ $id }}">
                    {{ Form::select('user_id',$user, null, ['class' => 'form-control', 'id' => 'user_id', 'placeholder' => 'Pilih anggota pengabdian']) }}
                </div>
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
