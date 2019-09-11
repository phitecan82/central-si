@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pengabdian' => route('admin.pengabdian.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pengabdian.index'), 'icon-list', 'List Pengabdian') !!}
@endsection

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">

                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($pengabdian, []) }}

                    <div class="form-group">
                        <label for="judul"><strong>Judul</strong></label>
                        {{ Form::text('judul', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tahun"><strong>Tahun</strong></label>
                        {{ Form::text('tahun', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="total_dana"><strong>Total Dana</strong></label>
                        {{ Form::text('total_dana', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="skema_pengabdian_id"><strong>Skema Pengabdian</strong></label>
                        {{ Form::text('skema', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="sumber_dana_id"><strong>Sumber Dana</strong></label>
                        {{ Form::text('sumber_dana', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}

                    </div>

                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection