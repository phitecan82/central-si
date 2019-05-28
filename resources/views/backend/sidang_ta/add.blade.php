<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="form-group">
    <label for="nama">Pilih Mahasiswa*</label>
    {{ Form::select('ta_semhas', $mahasiswa, null, ['class' => 'form-control', 'id' => 'ta_semhas', 'required']) }}
</div>

<div class="form-group">
    <label for="sidang_at">Tanggal Sidang*</label>
    {{ Form::date('sidang_at', null, ['class' => 'form-control', 'id' => 'sidang_at', 'required']) }}
</div>

<div class="form-group">
    <label for="sidang_time">Jam Sidang*</label>
    {{ Form::time('sidang_time', null, ['class' => 'form-control', 'id' => 'sidang_time', 'required']) }}
</div>

<div class="form-group">
    <label for="ruangan">Ruangan*</label>
    {{ Form::select('ruangan', $ruangan, null, ['class' => 'form-control', 'id' => 'ruangan', 'required']) }}
</div>

<div class="form-group">
    <label for="status">Status*</label>
    {{ Form::select('status', ['0' => 'Diajukan', '10' => 'Pengajuan Diterima', '11' => 'Menunggu Sidang', '12' => 'Selesai', '13' => 'Batal', '14'=>'Gagal', '20' => 'Pengajuan Ditolak'] , null, ['class' => 'form-control', 'id' => 'status', 'required']) }}
</div>

<div class="form-group">
    <label for="nilai_angka">Nilai Angka</label>
    {{ Form::number('nilai_angka', null, ['class' => 'form-control', 'id' => 'nilai_angka', 'placeholder' => 'nilai_angka']) }}
</div>

<div class="form-group">
    <label for="nilai_huruf">Nilai Angka</label>
    {{ Form::text('nilai_huruf', null, ['class' => 'form-control', 'id' => 'nilai_huruf', 'placeholder' => 'nilai_huruf', 'readonly']) }}
</div>

<div class="form-group">
    <label for="nilai_toefl">Nilai TOEFL</label>
    {{ Form::number('nilai_toefl', null, ['class' => 'form-control', 'id' => 'nilai_toefl',]) }}
</div>

<div class="form-group">
    <label for="file_toefl">File TOEFL</label>
    {{ Form::file('file_toefl', null, ['class' => 'form-control', 'id' => 'file_toefl',]) }}
</div>

<div class="form-group">
    <label for="file_laporan">File Laporan</label>
    {{ Form::file('file_laporan', null, ['class' => 'form-control', 'id' => 'file_laporan']) }}
</div>

<div class="form-group">
    <label for="file_lembaran_pengesahan">Lembaran Pengesahan </label>
    {{ Form::file('file_lembaran_pengesahan', null, ['class' => 'form-control', 'id' => 'file_lembaran_pengesahan']) }}
</div>

<p>* = wajib diisi</p>

<script>
    
</script>