<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="form-group">
    <label for="nama">Pilih Mahasiswa <b style="color:red">*</b></label>
    {{ Form::select('ta_semhas_id', $mahasiswa, null, ['class' => 'form-control', 'id' => 'ta_semhas_id', 'required']) }}
</div>

<div class="form-group">
    <label for="sidang_at">Tanggal Sidang</label>
    {{ Form::date('sidang_at', null, ['class' => 'form-control', 'id' => 'sidang_at']) }}
</div>

<div class="form-group">
    <label for="sidang_time">Jam Sidang</label>
    {{ Form::time('sidang_time', null, ['class' => 'form-control', 'id' => 'sidang_time']) }}
</div>

<div class="form-group">
    <label for="ruangan">Ruangan</label>
    {{ Form::select('ruangan_id', $ruangan, null, ['class' => 'form-control', 'id' => 'ruangan']) }}
</div>

<div class="form-group">
    <label for="status">Status <b style="color:red">*</b></label>
    {{ Form::select('status', ['0' => 'Diajukan', '10' => 'Pengajuan Diterima', '11' => 'Menunggu Sidang', '12' => 'Selesai', '13' => 'Batal', '14'=>'Gagal', '20' => 'Pengajuan Ditolak'] , null, ['class' => 'form-control', 'id' => 'status', 'required']) }}
</div>

<div class="form-group">
    <label for="nilai_angka">Nilai Angka</label>
    {{ Form::number('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka', 'placeholder' => 'Nilai Angka']) }}
</div>

<div class="form-group">
    <label for="nilai_huruf">Nilai Huruf</label>
    {{ Form::text('nilai_huruf', null, ['class' => 'form-control', 'id' => 'nilai_huruf', 'placeholder' => 'Nilai Huruf']) }}
</div>

<div class="form-group">
    <label for="nilai_toefl">Nilai TOEFL</label>
    {{ Form::number('nilai_toefl', null, ['class' => 'form-control', 'id' => 'nilai_toefl', 'placeholder' => 'Nilai TOEFL']) }}
</div>

<div class="form-group">
    <label for="file_toefl">File TOEFL</label>
    <p>{{ Form::file('file_toefl', null, ['class' => 'form-control', 'id' => 'file_toefl']) }}</p>
</div>

<div class="form-group">
    <label for="file_laporan">File Laporan</label>
    <p>{{ Form::file('file_laporan', null, ['class' => 'form-control', 'id' => 'file_laporan']) }}</p>
</div>

<div class="form-group">
    <label for="file_lembaran_pengesahan">Lembaran Pengesahan </label>
    <p>{{ Form::file('file_lembaran_pengesahan', null, ['class' => 'form-control', 'id' => 'file_lembaran_pengesahan']) }}</p>
</div>

<div class="form-group">
    <label for="nilai_akhir_ta">Nilai Akhir TA </label>
    <p>{{ Form::number('nilai_akhir_ta', null, ['class' => 'form-control', 'id' => 'nilai_akhir_ta', 'placeholder' => 'Nilai Akhir TA']) }}</p>
</div>

<p><b style="color:red">*</b> = wajib diisi</p>

<script>
    
</script>