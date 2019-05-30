<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

{{form::hidden('ta_sidang_id', $id, null, ['class' => 'required'])}}

<div class="form-group">
    <label for="nama">Pilih Dosen*</label>
    {{ Form::select('dosen_id', $dosen, null, ['class' => 'form-control', 'id' => 'ta_semhas', 'required']) }}
</div>

<div class="form-group">
    <label for="ruangan">Jabatan*</label>
    {{ Form::select('jabatan', [0 => 'Ketua', 1 => 'Anggota'], null, ['class' => 'form-control', 'id' => 'ruangan', 'required']) }}
</div>

<div class="form-group">
    <label for="ruangan">Kesediaan*</label>
    {{ Form::select('bersedia', [0 => 'Tidak Bersedia', 1 => 'Bersedia'], null, ['class' => 'form-control', 'id' => 'ruangan', 'required']) }}
</div>

<p>* = wajib diisi</p>