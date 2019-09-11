@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'nilaiTA' => route('admin.nilaiTA.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.nilaiTA.create'), 'icon-plus', 'Tambah Nilai Tugas Akhir') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Nilai TA</strong>
                </div>

                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $nilaiTAs->links() }}
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Judul Tugas AKhir</th>
                            <th class="text-center">Nilai Angka</th>
                            <th class="text-center">Nilai TA</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($nilaiTAs as $nilaiTA)
                            <tr>
                                <td>{{ $nilaiTA->nama }}</td>
                                <td>{{ $nilaiTA->judul }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_angka }}</td>
                                <td class="text-center">{{ $nilaiTA->nilai_akhir_ta }}</td>
                                <td class="text-center">
                                    {!! cui_btn_edit(route('admin.nilaiTA.edit', [$nilaiTA->id])) !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                <h6> data nilai TA belum ada </h6>
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
                                {{ $nilaiTAs->links() }}
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
