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