<div class="form-group">
<label for="user_id">Username</label>
    {{ Form::select('user_id',$user, null, ['class' => 'form-control', 'id' => 'user_id']) }}
</div>

<div class="form-group">
<label for="jenjang_id">Jenjang Pendidikan</label>
    {{ Form::select('jenjang_id',$jenjang, null, ['class' => 'form-control', 'id' => 'tingkat']) }}
</div>


<div class="form-group">
    <label for="nama_sekolah">Nama Sekolah</label>
    {{ Form::text('nama_sekolah', null, ['class' => 'form-control', 'id' => 'nama_sekolah', 'placeholder' => 'Nama Sekolah']) }}

</div>

<div class="form-group">
    <label for="jurusan">Jurusan</label>
    {{ Form::text('jurusan', null, ['class' => 'form-control', 'id' => 'jurusan', 'placeholder' => 'Jurusan ']) }}
</div>

<div class="form-group">
    <label for="tahun_masuk">Tahun Masuk</label>
    {{ Form::text('tahun_masuk', null, ['class' => 'form-control', 'id' => 'tahun_masuk', 'placeholder' => 'Tahun Masuk ']) }}
</div>

<div class="form-group">
    <label for="tahun_lulus">Tahun Lulus</label>
    {{ Form::text('tahun_lulus', null, ['class' => 'form-control', 'id' => 'tahun_lulus', 'placeholder' => 'Tahun Lulus']) }}
</div>

<div class="form-group">
    <label for="lokasi_sekolah">Lokasi Sekolah</label>
    {{ Form::text('lokasi_sekolah', null, ['class' => 'form-control', 'id' => 'lokasi_sekolah', 'placeholder' => 'Lokasi Sekolah ']) }}
</div>


<div class="form-group">
    <label for="dalam_negeri">Dalam Negri</label>
    {{ Form::select('dalam_negeri',['0'=>'Tidak','1'=>'Ya'], null, ['class' => 'form-control', 'id' => 'dalam_negri', 'placeholder' => 'Pilih Salah Satu']) }}
</div>

<div class="form-group">
    <label for="nomor_ijazah">Nomor Ijazah</label>
    {{ Form::text('nomor_ijazah', null, ['class' => 'form-control', 'id' => 'email', 'nomor_ijazah','placeholder' => 'Nomor Ijazah ']) }}
</div>

<div class="form-group">
    <label for="file_ijazah">File Ijazah Ijazah</label><br>
    {{ Form::file('file_ijazah', null, ['class' => 'form-control', 'id' => 'file_ijazah', 'file_ijazah','placeholder' => 'File Ijazah']) }}
</div>

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#user_id").select2();
    });
</script>
@endsection
