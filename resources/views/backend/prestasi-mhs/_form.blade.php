<div class="form-group">
    <label for="mahasiswa_id">Mahasiswa*</label>
    {!! Form::select('mahasiswa_id', $mahasiswas, null, ['class' => 'form-control', 'id' => 'mahasiswa_id']) !!}
</div>

<div class="form-group">
    <label for="nama_lomba">Nama Lomba*</label>
    {{ Form::text('nama_lomba', null, ['class' => 'form-control', 'id' => 'nama_lomba', 'placeholder' => 'Nama Lomba']) }}
</div>

<div class="form-group">
    <label for="prestasi">Prestasi*</label>
    {{ Form::text('prestasi', null, ['class' => 'form-control', 'id' => 'prestasi', 'placeholder' => 'Prestasi']) }}
</div>

<div class="form-group">
    <label for="tingkat">Tingkat</label>
    {{ Form::select('tingkat', array('' => 'Pilih Tingkat', '0' => 'Kab/Kota', '1' => 'Provinsi', '2' => 'Regional', '3' => 'Nasional', '4' => 'Internasional'), null, ['class' => 'form-control', 'id' => 'tingkat']) }}
</div>

<div class="form-group">
    <label for="penyelenggara">Penyelenggara</label>
    {{ Form::text('penyelenggara', null, ['class' => 'form-control', 'id' => 'penyelenggara', 'placeholder' => 'Penyelenggara']) }}
</div>

<div class="form-group">
    <label for="tempat">Tempat</label>
    {{ Form::text('tempat', null, ['class' => 'form-control', 'id' => 'tempat', 'placeholder' => 'Tempat']) }}
</div>

<div class="form-group">
    <label for="tgl_mulai">Tanggal Mulai</label>
    {{ Form::input('date', 'tgl_mulai', null, ['class' => 'form-control', 'id' => 'tgl_mulai']) }}
</div>

<div class="form-group">
    <label for="tgl_selesai">Tanggal Selesai</label>
    {{ Form::input('date', 'tgl_selesai', null, ['class' => 'form-control', 'id' => 'tgl_selesai']) }}
</div>

<div class="form-group">
    <label for="sertifikat">Sertifikat</label>
    {{ Form::input('file', 'sertifikat', null, ['class' => 'form-control', 'id' => 'sertifikat']) }}
</div>