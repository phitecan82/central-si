@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        $user => route('admin.keluarga.index', [$user]),
        'keluarga' => route('admin.keluarga.show', [$user, $id]),
        'index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.keluarga.create', [$user, $id]), 'icon-plus', 'Tambah Anggota Keluarga') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List keluarga {{ $nama->nama }}</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $keluargas->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Hubungan</th>
                            <th>Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($keluargas as $keluarga)
                            <tr>
                                <td>{{ $keluarga->nama }}</td>
                                <td>{{ $keluarga->hubungan }}</td>
                                <td>{{ $keluarga->jenis_kelamin }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.keluarga.detail', [$user, $keluarga->id])) !!}
                                    {!! cui_btn_edit(route('admin.keluarga.edit', [$user, $keluarga->id])) !!}
                                    {!! cui_btn_delete(route('admin.keluarga.destroy', [$user, $keluarga->id]), "Anda yakin akan menghapus data keluarga ini?") !!}
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
                                {{ $keluargas->links() }}
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
