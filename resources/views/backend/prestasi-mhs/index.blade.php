@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Prestasi' => route('admin.prestasi-mhs.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.prestasi-mhs.create'), 'icon-plus', 'Tambah Prestasi Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Prestasi Mahasiswa</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $prestasis->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Mahasiswa</th>
                            <th class="text-center">Nama Lomba</th>
                            <th class="text-center">Prestasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prestasis as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nama }}</td>
                                <td>{{ $prestasi->nama_lomba }}</td>
                                <td>{{ $prestasi->prestasi }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.prestasi-mhs.show', [$prestasi->id])) !!}
                                    {!! cui_btn_edit(route('admin.prestasi-mhs.edit', [$prestasi->id])) !!}
                                    {!! cui_btn_delete(route('admin.prestasi-mhs.destroy', [$prestasi->id]), "Anda yakin akan menghapus data prestasi ini?") !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $prestasis->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
