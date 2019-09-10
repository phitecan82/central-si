@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Logbook' => route('admin.logbook.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.logbook.create'), 'icon-plus', 'Tambah Logbook Mahasiswa') !!}
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Logbook</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $kpLogbook->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Mahasiswa</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Logbook</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($kpLogbook as $logbook)
                            <tr>
                                <td>{{ $logbook->nama }}</td>
                                <td class="text-center">{{ $logbook->tanggal }}</td>
                                <td class="text-center">{{ $logbook->logbook }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.logbook.show', [$logbook->id])) !!}
                                    {!! cui_btn_edit(route('admin.logbook.edit', [$logbook->id])) !!}
                                    {!! cui_btn_delete(route('admin.logbook.destroy', [$logbook->id]), "Anda yakin akan menghapus data logbook ini?") !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Data logbook belum ada
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $kpLogbook->links() }}
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