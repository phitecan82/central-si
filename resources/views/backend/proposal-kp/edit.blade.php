@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Proposal KP' => route('admin.proposal-kp.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.proposal-kp.create'), 'icon-plus', 'Tambah Proposal KP') !!}
    {!! cui_toolbar_btn(route('admin.proposal-kp.index'), 'icon-list', 'List Proposal KP') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($KpProposal, ['route' => ['admin.proposal-kp.update', $KpProposal->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Proposal KP
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        {{ Form::text('judul', null, ['class' => 'form-control', 'id' => 'judul', 'placeholder' => 'Judul Proposal', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        <label for="instansi_id">Instansi</label>
                        <select name="instansi_id" id="instansi_id" class="form-control" required>
                            @foreach($instansis as $instansi)
                                <option value="{{ $instansi->id }}" 
                                    @if($instansi->id==$KpProposal->instansi_id) 
                                    selected='selected'
                                    @endif>
                                    {{ $instansi->nama }}      
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="latar_belakang">Latar Belakang</label>
                        {{ Form::textarea('latar_belakang', null, ['class' => 'form-control', 'id' => 'latar_belakang', 'placeholder' => 'Latar Belakang Proposal', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        {{ Form::textarea('tujuan', null, ['class' => 'form-control', 'id' => 'tujuan', 'placeholder' => 'Tujuan Proposal', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        <label for="usulan_mulai_at">Usulan Mulai</label>
                        {{ Form::input('date', 'usulan_mulai_at', null, ['class' => 'form-control', 'id' => 'usulan_mulai_at', 'placeholder' => 'Usulan Mulai KP', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        <label for="usulan_selesai_at">Usulan Selesai</label>
                        {{ Form::input('date', 'usulan_selesai_at', null, ['class' => 'form-control', 'id' => 'usulan_selesai_at', 'placeholder' => 'Usulan Selesai KP', 'required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        <label for="status_proposal">Status Proposal</label>
                        <select name="status_proposal" id="status_proposal" class="form-control" required>
                            <option value="0"
                                @if($KpProposal->status_proposal==0) 
                                    selected='selected'
                                @endif
                                >Tidak Disetujui
                            </option>
                            <option value="1"
                                @if($KpProposal->status_proposal==1) 
                                    selected='selected'
                                @endif
                                >Disetujui
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        {{ Form::textarea('catatan', null, ['class' => 'form-control', 'id' => 'catatan', 'placeholder' => 'Catatan']) }}
                    </div>
                </div>

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
