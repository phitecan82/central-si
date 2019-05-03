@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Proposal KP' => route('admin.proposal-kp.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.proposal-kp.create'), 'icon-plus', 'Tambah Proposal KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Proposal KP</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                            <form method="post" action="{{ route('admin.proposal-kpcari.show') }}" class="form-inline">
                                {{ csrf_field() }}
                                <input type="text" name="keyword" class="form-control" value="@if(isset($keyword)) {{ $keyword }} @endif" placeholder="Masukkan Keyword" />
                                <input type="submit" name="submit" class="btn btn-primary" value="Cari" />
                            </form>
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $kp_proposals->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="tabelProposalKP">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kp_proposals as $kp_proposal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kp_proposal->judul }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.proposal-kp.show', [$kp_proposal->id]), ' Detail') !!}
                                    {!! cui_btn_edit(route('admin.proposal-kp.edit', [$kp_proposal->id]), ' Edit') !!}
                                    {!! cui_btn_delete(route('admin.proposal-kp.destroy', [$kp_proposal->id]), "Anda yakin akan menghapus data proposal kp ini?", ' Hapus') !!}
                                    {!! cui_btn_view(route('admin.proposal-kp.showkelompok', [$kp_proposal->id]), ' Kelompok') !!}
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
                                {{ $kp_proposals->links() }}
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
