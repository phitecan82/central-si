<div class="form-group">

    <label for="judul">Judul</label>
    {{ Form::textarea('judul', null, ['class' => 'form-control', 'id' => 'judul', 'placeholder' => 'Judul Pengabdian']) }}
</div>

<div class="form-group">
    <label for="tahun">Tahun</label>
    {{ Form::text('tahun', null, ['class' => 'form-control', 'id' => 'tahun', 'placeholder' => 'Tahun Pengabdian']) }}
</div>

<div class="form-group">
    <label for="total_dana">Total Dana</label>
    {{ Form::text('total_dana', null, ['class' => 'form-control', 'id' => 'total_dana', 'placeholder' => 'Total Dana Pengabdian']) }}
</div>

<div class="form-group">
    <label for="skema_pengabdian_id">Skema Pengabdian</label>
    {{ Form::select('skema_pengabdian_id', $skema_pengabdian, null, ['class' => 'form-control', 'id' => 'skema_pengabdian_id']) }}
</div>

<div class="form-group">
    <label for="sumber_dana_id">Sumber Dana Pengabdian</label>
    {{ Form::select('sumber_dana_id', $sumber_dana, null, ['class' => 'form-control', 'id' => 'sumber_dana_id']) }}
</div>

<div class="form-group">
    <label for="file_kontrak">File Kontrak (PDF)</label>
    {{ Form::file('file_kontrak', null, ['class' => 'form-control', 'id' => 'file_kontrak']) }}
</div>

<div class="form-group">
    <label for="file_laporan">File Laporan (PDF)</label>
    {{ Form::file('file_laporan', null, ['class' => 'form-control', 'id' => 'file_laporan']) }}
</div>

