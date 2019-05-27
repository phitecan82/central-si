@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'keluarga' => route('admin.keluarga.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.keluarga.create'), 'icon-plus', 'Tambah Daftar Keluarga') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Daftar Keluarga</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                           
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{$keluargas ->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No.Hp</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($keluargas  as $keluarga )
                            <tr>
                                <td>{{$keluarga ->nama }}</td>
                                <td class="text-center">{{$keluarga ->alamat }}</td>
                                <td class="text-center">{{$keluarga ->no_hp }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.keluarga.show', [$keluarga->id])) !!}
                                    {!! cui_btn_edit(route('admin.keluarga.edit', [$keluarga->id])) !!}
                                    {!! cui_btn_delete(route('admin.keluarga.destroy', [$keluarga->id]), "Anda yakin akan menghapus data keluarga ini?") !!}
                                </td>
                            </tr>


                        @empty

                        <tr> 
                           <td colspan="4" class="text-center" >
                               Data Daftar Keluarga  Belum Ada
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
