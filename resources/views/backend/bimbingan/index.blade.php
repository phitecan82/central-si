@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Bimbingan' => route('admin.bimbingan.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Mahasiswa TA</strong>
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
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Judul TA</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bimbingans as $bimbingan)
                            <tr>
                                <td>{{ $bimbingan->nama }}</td>
                                <td class="text-center">{{ $bimbingan->nim }}</td>
                                <td>{{ $bimbingan->judul }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.bimbingan.show', [$bimbingan->id])) !!}
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
