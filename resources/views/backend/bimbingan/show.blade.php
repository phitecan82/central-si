@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Bimbingan' => route('admin.bimbingan.index'),
        'Riwayat' => '#'
    ]) !!}
@endsection
    
@section('toolbar')
    {!! cui_toolbar_btn(route('admin.bimbingan.create', [$id]), 'icon-plus', 'Tambah Bimbingan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Riwayat Bimbingan TA {{ $judul }}</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-6"></div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $bimbingans->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bimbingans as $bimbingan)
                            <tr>
                                <td>{{ $bimbingan->nama }}</td>
                                <td class="text-center">{{ $bimbingan->tanggal }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.bimbingan.detail', [$bimbingan->id])) !!}
                                    {!! cui_btn_edit(route('admin.bimbingan.edit', [$bimbingan->id])) !!}
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
                                {{ $bimbingans->links() }}
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
