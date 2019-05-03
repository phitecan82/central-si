@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Proposal KP' => route('admin.proposal-kp.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.proposal-kp.destroy', [$KpProposal->id]), $KpProposal->id, 'icon-trash', 'Hapus Proposal KP', 'Anda yakin akan menghapus Proposal ini?') !!}
    {!! cui_toolbar_btn(route('admin.proposal-kp.index'), 'icon-list', 'List Proposal KP') !!}
    {!! cui_toolbar_btn(route('admin.proposal-kp.create'), 'icon-plus', 'Tambah Proposal KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Proposal KP</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($KpProposal, []) }}

                    <div class="form-group">
                        <label for="judul"> <b>Judul</b> </label>
                        {{ Form::text('judul', null, ['class' => 'form-control-plaintext', 'id' => 'judul', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="instansi_id"> <b>Instansi</b> </label>
                        {!! Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'instansi_id', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>

                    <div class="form-group">
                        <label for="latar_belakang"> <b>Latar Belakang</b> </label>
                        {{ Form::textarea('latar_belakang', null, ['class' => 'form-control-plaintext', 'id' => 'latar_belakang', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="tujuan"> <b>Tujuan</b> </label>
                        {{ Form::textarea('tujuan', null, ['class' => 'form-control-plaintext', 'id' => 'tujuan', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="usulan_mulai_at"> <b>Usulan Mulai</b> </label>
                        {{ Form::input('date', 'usulan_mulai_at', null, ['class' => 'form-control-plaintext', 'id' => 'usulan_mulai_at', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="usulan_selesai_at"> <b>Usulan Selesai</b> </label>
                        {{ Form::input('date', 'usulan_selesai_at', null, ['class' => 'form-control-plaintext', 'id' => 'usulan_selesai_at', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    <div class="form-group">
                        <label for="status_proposal"> <b>Status Proposal</b> </label>
                        {!! Form::text('status_proposal', null, ['class' => 'form-control-plaintext', 'id' => 'status_proposal', 'readonly' => 'readonly', 'disabled']) !!}
                    </div>

                    <div class="form-group">
                        <label for="catatan"> <b>Catatan</b> </label>
                        {{ Form::textarea('catatan', null, ['class' => 'form-control-plaintext', 'id' => 'catatan', 'readonly' => 'readonly', 'disabled']) }}
                    </div>

                    {{ Form::close() }}
                    
                    <h5>Daftar anggota kelompok KP</h5>
                    <ul>
                    @foreach($anggotas as $anggota)
                        <li>{{ $anggota->nama }}</li>
                    @endforeach
                    </ul>

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection