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
    {!! cui_toolbar_btn(route('admin.proposal-kp.add', [$KpProposal->id]), 'icon-plus', 'Tambah Anggota Kelompok KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Daftar Anggota Kelompok Proposal KP "{{ $KpProposal->judul }}"</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    
                <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($anggotas as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.mahasiswa.show', [$anggota->mahasiswa_id]), ' Detail') !!}
                                    {!! cui_btn_delete(route('admin.proposal-kp.hapusanggota', [$anggota->id]), "Anda yakin akan menghapus anggota kelompok proposal kp ini?", ' Hapus') !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection