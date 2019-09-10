@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Tendik' => route('admin.tendik.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.tendik.edit', [$tendik->id]), 'icon-note', 'Edit Tendik') !!}
    {!! cui_toolbar_btn_delete(route('admin.tendik.destroy', [$tendik->id]), $tendik->id, 'icon-trash', 'Hapus Tendik', 'Anda yakin akan menghapus tendik ini?') !!}
        {!! cui_toolbar_btn(route('admin.tendik.index'), 'icon-list', 'List tendik') !!}
    {!! cui_toolbar_btn(route('admin.tendik.create'), 'icon-plus', 'Tambah tendik') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">

                    Tendik

                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($tendik, []) }}

                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nip"><strong>NIP</strong></label>
                        {{ Form::text('nip', null, ['class' => 'form-control-plaintext', 'id' => 'nip', 'readonly' => 'readonly']) }}
                    </div>
                    
                    <div class="form-group">
                        <label for="nik"><strong>NIK</strong></label>
                        {{ Form::text('nik', null, ['class' => 'form-control-plaintext', 'id' => 'nik', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir"><strong>Tempat Lahir</strong></label>
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tempat_lahir', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                        {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tanggal_lahir', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        {{ Form::text('email', null, ['class' => 'form-control-plaintext', 'id' => 'email', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nohp"><strong>No. HP</strong></label>
                        {{ Form::text('nohp', null, ['class' => 'form-control-plaintext', 'id' => 'nohp', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="photo"><strong>Photo</strong></label>
<!--                         {{ Form::text('photo', null, ['class' => 'form-control-plaintext', 'id' => 'photo', 'readonly' => 'readonly']) }}
 -->                    </div>

                    <div class="form-group">
                        
                        <!-- <label for="photo"><strong>Photo</strong></label> -->
                        <img src="{{URL::asset('storage/foto_tendik/'.$tendik->photo)}}" style="width:150px; height:150px; float:left; 
                        border-radius:50%; margin-right:25px;">
                    </div>

                    
                     

                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection