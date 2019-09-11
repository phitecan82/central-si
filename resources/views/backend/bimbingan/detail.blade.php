@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Bimbingan' => route('admin.bimbingan.index'),
        'Riwayat' => route('admin.bimbingan.show', [$bimbingan->tugas_akhir_id]),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.bimbingan.edit', [$bimbingan->id]), 'icon-pencil', 'Edit Bimbingan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Detail Bimbingan
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    {{ Form::model($bimbingan, []) }}

                    <div class="form-group">
                        <label for="pembimbing_id">Pembimbing</label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'pembimbing_id', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Bimbingan</label>
                        {{ Form::text('tanggal', null, ['class' => 'form-control-plaintext', 'id' => 'tanggal', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="progress">Progres</label>
                        {{ Form::textarea('progress', null, ['class' => 'form-control-plaintext', 'id' => 'progress', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        {{ Form::textarea('catatan', null, ['class' => 'form-control-plaintext', 'id' => 'catatan', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="status_bimbingan">Status Bimbingan</label>
                        {{ Form::text('status_bimbingan', null, ['class' => 'form-control-plaintext', 'id' => 'catatan', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <div class="row">
                            @if($bimbingan->file != null)
                                <a href="{{ url('/storage/'.$bimbingan->file) }}" class="btn btn-success form-control col-2 ml-2" download>Download Disini</a>
                            @else
                                <i class="ml-3">"File Belum Diupload/Tidak Ada"</i>
                            @endif
                        </div>
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