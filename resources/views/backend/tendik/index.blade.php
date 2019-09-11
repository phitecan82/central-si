@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Tendik' => route('admin.tendik.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.tendik.create'), 'icon-plus', 'Tambah Tendik') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                            <form method="post" action="{{ route('admin.tendikcari.show') }}" class="form-inline">
                                {{ csrf_field() }}
                                
                                <input type="text" name="keyword" class="form-control" value="@if(isset($keyword)) {{ $keyword }} @endif" placeholder="Masukkan Keyword" />

                                <input type="submit" name="submit" class="btn btn-primary" value="Cari" />
                            </form>

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $tendiks->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($tendiks as $tendik)
                            <tr>
                                <td>{{ $tendik->nama }}</td>
                                <td class="text-center">{{ $tendik->nip }}</td>
                                <td class="text-center">{{ $tendik->nik }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.tendik.show', [$tendik->id])) !!}
                                    {!! cui_btn_edit(route('admin.tendik.edit', [$tendik->id])) !!}
                                    {!! cui_btn_delete(route('admin.tendik.destroy', [$tendik->id]), "Anda yakin akan menghapus data tendik ini?") !!}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Data Tendik Belum Ada
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
                                {{ $tendiks->links() }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
