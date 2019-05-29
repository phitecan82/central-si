<input type="hidden" name="user_id" value="{{ $id }}">
<input type="hidden" name="user" value="{{ $user }}">
<div class="form-group">
    <label for="nama">Nama</label>
    {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama']) }}
</div>

<div class="form-group">
    <label for="hubungan">Hubungan
    {{ Form::select('hubungan',array('0' => 'Ayah', '1' => 'Ibu', '2' => 'Saudara'), null, ['class' => 'form-control', 'id' => 'hubungan']) }}
</div>

<div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin
    {{ Form::select('jenis_kelamin',array('0' => 'Laki-Laki', '1' => 'Perempuan'), null, ['class' => 'form-control', 'id' => 'jenis_kelamin']) }}
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir']) }}
</div>


<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    {{ Form::date('tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir']) }}
</div>

<div class="form-group">
    <label for="alamat">alamat</label>
    {{ Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Alamat']) }}
</div>

<div class="form-group">
    <label for="nohp">No. HP</label>
    {{ Form::text('no_hp', null, ['class' => 'form-control', 'id' => 'nohp', 'placeholder' => 'No HP']) }}
</div>

<div class="form-group">
    <label for="email">E-Mail</label>
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail']) }}
</div>

<div class="form-group">
    <label for="pekerjaan">Pekerjaan</label>
    {{ Form::text('pekerjaan', null, ['class' => 'form-control', 'id' => 'pekerjaan', 'placeholder' => 'Pekerjaan']) }}
</div>

<div class="form-group">
    <label for="hidup">Hidup
    {{ Form::select('hidup',array('0' => 'Meninggal', '1' => 'Hidup'), null, ['class' => 'form-control', 'id' => 'hidup']) }}
</div>