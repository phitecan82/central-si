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
    {!! cui_toolbar_btn(route('admin.keluarga.show', [$user, $keluarga->user_id]), 'icon-list', 'List Keluarga') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Detail Keluarga
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    {{ Form::model($keluarga, []) }}
                   <div class="form-group">
                        <label for="nama">Nama</label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'placeholder' => 'Nama', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="hubungan">Hubungan
                            {{ Form::text('hubungan', null, ['class' => 'form-control-plaintext', 'id' => 'hubungan', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin
                            {{ Form::text('jenis_kelamin', null, ['class' => 'form-control-plaintext', 'id' => 'jenis_kelamin', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            {{ Form::text('tempat_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir', 'readonly' => 'readonly']) }}
                        </div>


                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            {{ Form::date('tanggal_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            {{ Form::text('alamat', null, ['class' => 'form-control-plaintext', 'id' => 'alamat', 'placeholder' => 'Alamat', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="nohp">No. HP</label>
                            {{ Form::text('no_hp', null, ['class' => 'form-control-plaintext', 'id' => 'nohp', 'placeholder' => 'No HP', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            {{ Form::text('email', null, ['class' => 'form-control-plaintext', 'id' => 'email', 'placeholder' => 'E-Mail', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            {{ Form::text('pekerjaan', null, ['class' => 'form-control-plaintext', 'id' => 'pekerjaan', 'placeholder' => 'Pekerjaan', 'readonly' => 'readonly']) }}
                        </div>

                        <div class="form-group">
                            <label for="hidup">Hidup
                            {{ Form::text('hidup', null, ['class' => 'form-control-plaintext', 'id' => 'hidup', 'readonly' => 'readonly']) }}
                        </div>
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
