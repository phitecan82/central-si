<div class="form-group">
    <label for="mahasiswa_id">Nama Mahasiswa</label>
    {{ Form::select('mahasiswa_id', $mahasiswa, null, ['class' => 'form-control', 'id' => 'mahasiswa_id']) }}
</div>

<div class="form-group">
    <label for="tanggal">Tanggal</label>
    {{ Form::date('tanggal', null, ['class' => 'form-control', 'id' => 'tgl_logbook', 'placeholder' => 'Tanggal']) }}
</div>

<div class="form-group">
    <label for="logbook">Logbook</label>
    {{ Form::textarea('logbook', null, ['class' => 'form-control', 'id' => 'isi_logbook', 'placeholder' => 'Logbook Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="catatan">Catatan</label>
    {{ Form::textarea('catatan', null, ['class' => 'form-control', 'id' => 'isi_catatan', 'placeholder' => 'Catatan Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="status">Status</label>
    {{ Form::select('status', [0 => 'Belum Disetujui', 1=> 'Telah Disetujui', 2=> 'Ditolak'], null, ['class' => 'form-control', 'id' => 'isi_status']) }}

</div>
