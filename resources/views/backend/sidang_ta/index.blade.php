@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.sidang_ta.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.create'), 'icon-plus', 'Tambah sidang') !!}
@endsection

@section('content')
    <div class="row justify-content-center">    
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Sidang TA
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Tanggal Sidang TA</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($taSidang as $taSidang)                             
                                <tr>
                                    <td>{{$taSidang->nama_mahasiswa}}</td>
                                    <td class="text-center">{{$taSidang->nim}}</td>
                                    <td class="text-center">{{$taSidang->nama_ruang}}</td>
                                    <td class="text-center">{{$taSidang->sidang_at}}</td>
                                    <td class="text-center">
                                         {!! cui_btn_view(route('admin.sidang_ta.show', [$taSidang->id])) !!}
                                        {!! cui_btn_edit(route('admin.sidang_ta.edit', [$taSidang->id])) !!}
                                        {!! cui_btn_delete(route('admin.sidang_ta.destroy', [$taSidang->id]), "Anda yakin akan menghapus data sidang TA ini?") !!}  
                                        
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
