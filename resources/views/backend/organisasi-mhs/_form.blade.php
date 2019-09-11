
<div class="form-group">
    <label for="organisasi">Organisasi*</label>
     {{ Form::text('organisasi', null, ['class' => 'form-control', 'id' => 'organisasi', 'placeholder' => 'Organisasi Mahasiswa']) }}
</div>
<div class="form-group">
    <label for="jabatan_id">Jabatan*</label>
    {!! Form::select('jabatan_id', $jabatan, null, ['class' => 'form-control', 'id' => 'jabatan_id']) !!}
</div>
<div class="form-group">
    <label for="tgl_mulai">Tanggal Mulai Organisasi*</label>
    {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control', 'id' => 'tgl_mulai', 'placeholder' => 'Tanggal Organisasi Dimulai']) }}
</div>
<div class="form-group">
    <label for="tgl_selesai">Tanggal Selesai Organisasi*</label>
    {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control', 'id' => 'tgl_selesai', 'placeholder' => 'Tanggal Organisasi Selesai']) }}
</div>

<div class="form-group">
     <label for="file_bukti">File Bukti (PDF)</label>
    {{ Form::file('file_bukti', null, ['class' => 'form-control', 'id' => 'file_bukti', 'placeholder' => 'File Bukti']) }}
</div>
