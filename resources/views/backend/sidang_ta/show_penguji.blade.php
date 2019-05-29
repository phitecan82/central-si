@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.sidang_ta.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.index'), 'icon-list', 'Kembali Ke Laman Sidang') !!}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Sidang
                </div>


                {{-- CARD BODY--}}
                <div class="card-body">                    
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Dosen</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Bersedia</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                                <tr>
                                    <td class="text-center">{{$sidangta->nama_dosen}}</td>
                                    <td class="text-center">

                                    @if($sidangta->jabatan = 1)

                                    <p>ketua sidang</p>
                                    @else

                                    <p>anggota sidang</p>
                                    
                                    @endif
                                    </td>
                                     <td class="text-center">

                                    @if($sidangta->jabatan = 0)

                                    <p>Tidak Bersedia</p>
                                    @else

                                    <p>Bersedia</p>
                                    
                                    @endif
                                    </td>
                                    <td class="text-center">  
                                    <!-- {!! cui_btn_delete(route('admin.sidang_ta.show_penguji', [$sidangta->id]), "Anda yakin akan menghapus data dosen ini?") !!}   -->
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                
        

                {{-- CARD FOOTER --}}
                <div class="card-footer">
                <!-- <a href="backend.sidang_ta.penguji">
                    <button class="btn btn-primary">Tambah Dosen Penguji Sidang</button>
                </a> -->

                </div>
            </div>
        </div>
    </div>

@endsection
