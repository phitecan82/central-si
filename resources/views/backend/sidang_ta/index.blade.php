@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.mahasiswa.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.mahasiswa.create'), 'icon-plus', 'Tambah Mahasiswa') !!}
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
                            <form method="post" action="{{ route('admin.mahasiswacari.show') }}" class="form-inline">
                                {{ csrf_field() }}
                                <input type="text" name="keyword" class="form-control" value="@if(isset($keyword)) {{ $keyword }} @endif" placeholder="Masukkan Keyword" />
                                <input type="submit" name="submit" class="btn btn-primary" value="Cari" />
                            </form>
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--  @foreach($mahasiswas as $mahasiswa)  --}}
                            <tr>
                                <td>test</td>
                                <td class="text-center">test</td>
                                <td class="text-center">test</td>
                                <td class="text-center">
                                    {{--  {!! cui_btn_view(route('admin.mahasiswa.show', [$mahasiswa->id])) !!}
                                    {!! cui_btn_edit(route('admin.mahasiswa.edit', [$mahasiswa->id])) !!}
                                    {!! cui_btn_delete(route('admin.mahasiswa.destroy', [$mahasiswa->id]), "Anda yakin akan menghapus data dosen ini?") !!}  --}}
                                        {{ Form::button('Test', ['class' => 'col-sm-2 btn btn-sml btn-primary']) }}
                                        {{ Form::button('Test', ['class' => 'col-sm-2 btn btn-sml btn-warning']) }} 
                                        {{ Form::button('Test', ['class' => 'col-sm-2 btn btn-sml btn-danger']) }} 
                                </td>
                            </tr>
                        {{--  @endforeach  --}}
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
