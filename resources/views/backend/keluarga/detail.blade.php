@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'keluarga' => route('admin.keluarga.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
 
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    keluarga
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($keluarga, []) }}

                    <div class="form-group">
                        <label for="id"><strong>ID</strong></label>
                        {{ Form::text('id', null, ['class' => 'form-control-plaintext', 'id' => 'id', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="user_id"><strong>User ID</strong></label>
                        {{ Form::text('user_id', null, ['class' => 'form-control-plaintext', 'id' => 'user_id', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="hubungan"><strong>Hubungan</strong></label>
                        {{ Form::text('hubungan', null, ['class' => 'form-control-plaintext', 'id' => 'hubungan', 'readonly' => 'readonly']) }}
                    </div>

                     
                    <div class="form-group">
                        <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                        {{ Form::text('jenis_kelamin', null, ['class' => 'form-control-plaintext', 'id' => 'jenis_kelamin', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir"><strong>Tempat Lahir</strong></label>
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tempat_lahir', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                        {{ Form::text('tanggal_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'nip', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        {{ Form::text('alamat', null, ['class' => 'form-control-plaintext', 'id' => 'alamat', 'readonly' => 'readonly']) }}
                    </div>
                
                    <div class="form-group">
                        <label for="no_hp"><strong>No.HP</strong></label>
                        {{ Form::text('no_hp', null, ['class' => 'form-control-plaintext', 'id' => 'no_hp', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        {{ Form::email('email','admin@admin.com', ['class' => 'form-control-plaintext', 'id-' => 'email', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">

                        <label for="pekerjaan"><strong>Pekerjaan</strong></label>
                        {{ Form::text('pekerjaan', null, ['class' => 'form-control-plaintext', 'id' => 'pekerjaan ', 'readonly' => 'readonly']) }}
                    </div>

                     <div class="form-group">
                        <label for="hidup"><strong>Hidup</strong></label>
                        {{ Form::text('hidup', null, ['class' => 'form-control-plaintext', 'id' => 'hidup', 'readonly' => 'readonly']) }}
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