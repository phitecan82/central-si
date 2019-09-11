@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Logbook' => route('admin.logbook.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.logbook.destroy', [$kpLogbook->id]), $kpLogbook->id, 'icon-trash', 'Hapus Logbook', 'Anda yakin akan menghapus data logbook ini?') !!}
    {!! cui_toolbar_btn(route('admin.logbook.index'), 'icon-list', 'List Logbook Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.logbook.create'), 'icon-plus', 'Tambah Logbook Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Logbook
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($kpLogbook, []) }}

                     <div class="form-group">
                        <label for="mahasiswa_id"><strong>Nama Mahasiswa</strong></label>
                        {{ Form::text('mahasiswa_id', $nama, ['class' => 'form-control-plaintext', 'id' => 'mahasiswa_id', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tanggal"><strong>Tanggal</strong></label>
                        {{ Form::input('text', 'tanggal', null, ['class' => 'form-control-plaintext', 'id' => 'tanggal', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="logbook"><strong>Logbook</strong></label>
                          {{ Form::text('logbook', null, ['class' => 'form-control-plaintext', 'id' => 'logbook', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="catatan"><strong>Catatan</strong></label>
                        {{ Form::textarea('catatan', null, ['class' => 'form-control-plaintext', 'id' => 'catatan', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="status"><strong>Status</strong></label>
                        {{ Form::text('status', $status, ['class' => 'form-control-plaintext', 'id' => 'status', 'readonly' => 'readonly']) }}
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