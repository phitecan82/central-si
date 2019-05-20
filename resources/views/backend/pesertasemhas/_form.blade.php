<div class="form-group">
    <label for="mahasiswa">Nama Mahasiswa</label>
    {{ Form::hidden('id',$tes, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'id']) }}
    {{ Form::select('id', $mahasiswas, null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Mahasiswa']) }}
</div>