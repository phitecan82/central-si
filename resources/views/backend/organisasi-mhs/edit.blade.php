@extends('backend.layouts.app')

 @section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Organisasi Mahasiswa' => route('admin.organisasi-mhs.index'),
        'Edit' => '#'
    ]) !!}
@endsection

 @section('toolbar')
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.create'), 'icon-plus', 'Tambah Organisasi Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.organisasi-mhs.index'), 'icon-list', 'List Organisasi Mahasiswa') !!}
@endsection

 @section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                 {{ Form::model($MhsOrganisasi, ['route' => ['admin.organisasi-mhs.update', $MhsOrganisasi->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}

                 {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Organisasi Mahasiswa
                </div>

                 {{-- CARD BODY--}}
               
              
                
                
                <div class="card-body">

                     <div class="form-group">
                        <label for="m">Nama Mahasiswa</label>
                        <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                            @foreach($namas as $nama)
                                <option value="{{ $nama->id }}" 
                                    @if($nama->id==$MhsOrganisasi->mahasiswa_id) 
                                    selected='selected'
                                    @endif>
                                    {{ $nama->nama }}      
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="organisasi">Organisasi</label>
                        {{ Form::text('organisasi', null, ['class' => 'form-control', 'id' => 'organisasi', 'placeholder' => 'Organisasi Mahasiswa', 'required' => 'required']) }}
                    </div>

                     <div class="form-group">
                        <label for="jabatan_id">Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                            @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}" 
                                    @if($jabatan->id==$MhsOrganisasi->jabatan_id) 
                                    selected='selected'
                                    @endif>
                                    {{ $jabatan->jabatan }}      
                                </option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="tgl_mulai">Tanggal Mulai</label>
                        {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control', 'id' => 'tgl_mulai', 'placeholder' => 'Tanggal Mulai Organisasi', 'required' => 'required']) }}
                    </div>

                     <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control', 'id' => 'tgl_selesai', 'placeholder' => 'Tanggal Selesai Organisasi', 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        <label for="file_bukti">Surat Bukti Pengesahan(.pdf)</label><br>
                        {{ Form::file('file_bukti', null, ['class' => 'form-control', 'id' => 'file_bukti', 'placeholder' => 'File Bukti', 'required' => 'required']) }}
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