@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Semhas' => route('admin.semhas.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.semhas.create'), 'icon-plus', 'Tambah Data Semhas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    List Semhas
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                            
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $semhass->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Jam</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($semhass as $semhas)
                            <tr>
                                <td class="text-center">{{ $semhas->nama_mahasiswa }}</td>
                                <td class="text-center">{{ $semhas->semhas_at }}</td>
                                <td class="text-center">{{ $semhas->semhas_time }}</td>
                                <td class="text-center">{{ $semhas->nama }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.semhas.show', [$semhas->id])) !!}
                                    {!! cui_btn_edit(route('admin.semhas.edit', [$semhas->id])) !!}
                                    {!! cui_btn_delete(route('admin.semhas.destroy', [$semhas->id]), "Anda yakin akan menghapus data semhas ini?") !!}
                                    {!! cui_btn(route('admin.pesertasemhas.index', [$semhas->id]), 'icon-people','Peserta') !!}
                                
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data semhas belum ada
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
                                {{ $semhass->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection