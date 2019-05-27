@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Sidang TA' => route('admin.sidang_ta.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.sidang_ta.create'), 'icon-plus', 'Tambah Data Sidang') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List sidangta</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">



                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $sidangtas->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sidangtas as $sidangta)
                            <tr>
                                <td>{{ $sidangta->id}}</td>
                                <td class="text-center">{{ $sidangta->sidang_at}}</td>
                                <td class="text-center">{{ $sidangta->sidang_time}}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.sidang_ta.show', [$sidangta->id])) !!}
                                    {!! cui_btn_edit(route('admin.sidang_ta.edit', [$sidangta->id])) !!}
                                    {!! cui_btn_delete(route('admin.sidang_ta.destroy', [$sidangta->id]), "Anda yakin akan menghapus data ini?") !!}
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
                                {{ $sidangtas->links() }}
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
