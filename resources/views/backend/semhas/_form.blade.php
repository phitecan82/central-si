<div class="form-group">
    <label for="ta_sempro_id">Nama Mahasiswa</label>
    {{ Form::select('ta_sempro_id', $mahasiswa, null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Mahasiswa']) }}
</div>

<div class="form-group">
    <label for="semhas_at">Tanggal</label>
    {{ Form::input('date','semhas_at', null, ['class' => 'form-control', 'id' => 'semhas_at']) }}
</div>

<div class="form-group">
    <label for="semhas_time">Jam</label>
    {{ Form::input('time','semhas_time', null, ['class' => 'form-control', 'id' => 'jam']) }}
</div>

<div class="form-group">
    <label for="ruangan_id">Ruangan</label>
    {{ Form::select('ruangan_id', $ruangan, null, ['class' => 'form-control', 'id' => 'ruangan', 'placeholder' => 'Ruangan']) }}
</div>

<div class="form-group">
    {{ Form::hidden('status', '1', null, ['class' => 'form-control', 'id' => 'status']) }}
</div>

<div class="form-group">
    <label for="rekomendasi">Rekomendasi</label>
    {{ Form::select('rekomendasi', $rekomendasi, null, ['class' => 'form-control', 'id' => 'rekomendasi']) }}
</div>

<div class="form-group">
    <label for="sidang_deadline_at">Tenggat Waktu Sidang</label>
    {{ Form::input('date','sidang_deadline_at', null, ['class' => 'form-control', 'id' => 'sidang_deadline_at']) }}
</div>

<div class="form-group">
    <label for="file_ba_seminar">File BA Seminar (PDF)</label>
    {{ Form::file('file_ba_seminar', null, ['class' => 'form-control', 'id' => 'file_ba_seminar', 'placeholder' => 'File BA Seminar']) }}
</div>

<div class="form-group">
    <label for="file_laporan_ta">File Laporan TA (PDF)</label>
    {{ Form::file('file_laporan_ta', null, ['class' => 'form-control', 'id' => 'file_laporan_ta', 'placeholder' => 'File Laporan TA']) }}
</div>

