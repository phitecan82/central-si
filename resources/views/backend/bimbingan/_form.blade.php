<input type="hidden" name="tugas_akhir_id" value="{{ $id }}">

<div class="form-group">
    <label for="pembimbing_id">Pembimbing <strong style="color: red">*</strong></label>
    {{ Form::select('pembimbing_id',$pembimbing, null, ['class' => 'form-control', 'id' => 'pembimbing_id']) }}
</div>

<div class="form-group">
    <label for="tanggal">Tanggal Bimbingan <strong style="color: red">*</strong></label>
    {{ Form::date('tanggal', null, ['class' => 'form-control', 'id' => 'tanggal']) }}
</div>

<div class="form-group">
    <label for="progress">Progres <strong style="color: red">*</strong></label>
    {{ Form::textarea('progress', null, ['class' => 'form-control', 'id' => 'progress', 'placeholder' => 'Progres Bimbingan']) }}
</div>

<div class="form-group">
    <label for="catatan">Catatan <strong style="color: red">*</strong></label>
    {{ Form::textarea('catatan', null, ['class' => 'form-control', 'id' => 'catatan', 'placeholder' => 'Catatan Pembimbing']) }}
</div>

<div class="form-group">
    <label for="status_bimbingan">Status Bimbingan <strong style="color: red">*</strong></label>
    {{ Form::select('status_bimbingan',array('0' => 'Belum Dilihat', '1' => 'Belum Disetujui', '2' => 'Disetujui'), null, ['class' => 'form-control', 'id' => 'status_bimbingan']) }}
</div>

<div class="form-group">
    <label for="file">File</label>
    {{ Form::file('file', null, ['class' => 'form-control', 'id' => 'file']) }}
</div>

<strong style="color: red">*</strong><i>Wajib Diisi!</i>

