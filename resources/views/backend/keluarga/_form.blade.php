<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Keluarga']) }}
</div>

<div class="form-group">
    <label for="hubungan">Hubungan</label>
    {{ Form::text('hubungan', null, ['class' => 'form-control', 'id' => 'hubungan', 'placeholder' => 'Hubungan Keluarga']) }}
</div>

<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    {{ Form::text('jenis_kelamin', null, ['class' => 'form-control', 'id' => 'jenis_kelamin', 'placeholder' => 'Jenis Kelamin Keluarga']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Keluarga']) }}
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir Keluarga']) }}
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    {{ Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Alamat Keluarga']) }}
</div>

<div class="form-group">
    <label for="no_hp">No. HP</label>
    {{ Form::text('no_hp', null, ['class' => 'form-control', 'id' => 'no_hp', 'placeholder' => 'No. HP Keluarga']) }}
</div>

<div class="form-group">
    <label for="email">email</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Keluarga']) }}
</div>

<div class="form-group">
    <label for="pekerjaan">Pekerjaan</label>
    {{ Form::text('pekerjaan', null, ['class' => 'form-control', 'id' => 'pekerjaan', 'placeholder' => 'Pekerjaan Keluarga']) }}
</div>

<div class="form-group">
    <label for="hidup">Hidup</label>
    {{ Form::text('hidup', null, ['class' => 'form-control', 'id' => 'hidup', 'placeholder' => 'Hidup Keluarga']) }}
</div>