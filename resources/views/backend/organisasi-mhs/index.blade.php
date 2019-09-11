@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Organisasi Mahasiswa' => route('admin.organisasi-mhs.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.create'), 'icon-plus', 'Tambah Organisasi Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Organisasi Mahasiswa</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                 
                    <table class="table table-striped table-hover mt-4" id="tabelOrganisasiMahasiswa">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th> 
                            <th class="text-center">Organisasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mhs_organisasis as $mhs_organisasi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><center>{{ $mhs_organisasi->nim}}</center></td>
                                <td><center>{{ $mhs_organisasi->nama}}</center></td>
                                <td><center>{{ $mhs_organisasi->organisasi }}</center></td>
                               
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.organisasi-mhs.show', [$mhs_organisasi->id])) !!}
                                    {!! cui_btn_edit(route('admin.organisasi-mhs.edit', [$mhs_organisasi->id])) !!}
                                    {!! cui_btn_delete(route('admin.organisasi-mhs.destroy', [$mhs_organisasi->id]), "Anda yakin akan menghapus data organisasi ini?") !!}
                                    
                                </td>
                            </tr>
                            <tr>
                         
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $mhs_organisasis->links() }}

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
