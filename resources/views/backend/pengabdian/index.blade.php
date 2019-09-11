@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),

        'Pengabdian' => route('admin.pengabdian.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pengabdian.create'), 'icon-plus', 'Tambah Pengabdian') !!}

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Pengabdian</strong>

                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $pengabdians->links() }}

                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th class="text-center">Tahun</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Jumlah Anggota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($pengabdians as $pengabdian)
                            <tr>
                                <td class="text-center">{{ $pengabdian->tahun }}</td>
                                <td>{{ $pengabdian->judul }}</td>
                                <td class="text-center">{{ $pengabdian->members->count()}}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.pengabdian.show', [$pengabdian->id])) !!}
                                    {!! cui_btn_edit(route('admin.pengabdian.edit', [$pengabdian->id])) !!}
                                    {!! cui_btn_delete(route('admin.pengabdian.destroy', [$pengabdian->id]), "Anda yakin akan menghapus data pengabdian ini?") !!}

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=4 class=text-center>
                                <h4>Data pengabdian belum ada.</h4>
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
                                {{ $pengabdians->links() }}

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
