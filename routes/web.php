<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin/home', 'HomeController@index')->name('admin.home');
    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');

    /** Routing Pengelolaan Dosen */
    Route::post('/admin/dosen/cari', 'DosenCariController@show')->name('admin.dosencari.show'); //routing pencarian dosen
    Route::get('/admin/dosen/cari', 'DosenController@index')->name('admin.dosencari.index'); //routing pencarian dosen

    Route::get('/admin/dosen', 'DosenController@index')->name('admin.dosen.index');  //routing lihat daftar dosen
    Route::post('/admin/dosen', 'DosenController@store')->name('admin.dosen.store'); //routing simpan data dosen baru
    Route::get('/admin/dosen/create', 'DosenController@create')->name('admin.dosen.create'); //routing tampilkan form data dosen baru
    Route::delete('/admin/dosen/{dosen}', 'DosenController@destroy')->name('admin.dosen.destroy'); //routing hapus data dosen baru
    Route::patch('/admin/dosen/{dosen}', 'DosenController@update')->name('admin.dosen.update'); //routing simpan perubahan data dosen
    Route::get('/admin/dosen/{dosen}', 'DosenController@show')->name('admin.dosen.show'); //routing tampilkan detail dosen
    Route::get('/admin/dosen/{dosen}/edit', 'DosenController@edit')->name('admin.dosen.edit');  //routing tampilkan form edit dosen

/** Routing Pengelolaan Mahasiswa */
Route::post('/admin/mahasiswa/cari', 'MahasiswaCariController@show')->name('admin.mahasiswacari.show'); //routing pencarian mahasiswa
Route::get('/admin/mahasiswa/cari', 'MahasiswaController@index')->name('admin.mahasiswacari.index'); //routing pencarian mahasiswa
Route::get('/admin/mahasiswa', 'MahasiswaController@index')->name('admin.mahasiswa.index');  //routing lihat daftar mahasiswa
Route::post('/admin/mahasiswa', 'MahasiswaController@store')->name('admin.mahasiswa.store'); //routing simpan data mahasiswa baru
Route::get('/admin/mahasiswa/create', 'MahasiswaController@create')->name('admin.mahasiswa.create'); //routing tampilkan form data mahasiswa baru
Route::delete('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@destroy')->name('admin.mahasiswa.destroy'); //routing hapus data mahasiswa baru
Route::patch('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@update')->name('admin.mahasiswa.update'); //routing simpan perubahan data mahasiswa
Route::get('/admin/mahasiswa/{mahasiswa}', 'MahasiswaController@show')->name('admin.mahasiswa.show'); //routing tampilkan detail mahasiswa
Route::get('/admin/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit')->name('admin.mahasiswa.edit');  //routing tampilkan form edit mahasiswa



/**  routing pengabdian */
Route::post('/admin/mahasiswa/cari', 'pengabdiancariController@show')->name('admin.pengabdiancari.show'); //routing pencarian mahasiswa
    Route::get('/admin/mahasiswa/cari', 'pengabdianController@index')->name('admin.pengabdiancari.index'); //routing pencarian mahasiswa
   Route::get('/admin/pengabdian', 'pengabdianController@index')->name('admin.pengabdian.index');  //routing lihat daftar

   Route::post('/admin/pengabdian', 'pengabdianController@store')->name('admin.pengabdian.store'); //routing simpan data pengabdian baru
   Route::get('/admin/pengabdian/create', 'pengabdianController@create')->name('admin.pengabdian.create'); //routing tampilkan form data mahasiswa baru
   Route::delete('/admin/pengabdian/{pengabdian}', 'pengabdianController@destroy')->name('admin.pengabdian.destroy'); //routing hapus data mahasiswa baru
   Route::patch('/admin/pengabdian/{pengabdian}', 'pengabdianController@update')->name('admin.pengabdian.update'); //routing simpan perubahan data mahasiswa
   Route::get('/admin/pengabdian/{pengabdian}', 'pengabdianController@show')->name('admin.pengabdian.show'); //routing tampilkan detail mahasiswa
   Route::get('/admin/pengabdian/{pengabdian}/edit', 'pengabdianController@edit')->name('admin.pengabdian.edit');  //routing tampilkan form edit mahasiswa

    /** Routing untuk tugas mulai dari sini */

    /** Riwayat Pendidikan */

    Route::get('/admin/pendidikan', 'pendidikanController@index')->name('admin.pendidikan.index'); 
    Route::post('/admin/pendidikan', 'pendidikanController@store')->name('admin.pendidikan.store');
    Route::get('/admin/pendidikan/create', 'pendidikanController@create')->name('admin.pendidikan.create'); 
    Route::delete('/admin/pendidikan/{pendidikan}', 'pendidikanController@destroy')->name('admin.pendidikan.destroy'); 
    Route::patch('/admin/pendidikan/{pendidikan}', 'pendidikanController@update')->name('admin.pendidikan.update'); 
    Route::get('/admin/pendidikan/{pendidikan}', 'pendidikanController@show')->name('admin.pendidikan.show');
    Route::get('/admin/pendidikan/{pendidikan}/edit', 'pendidikanController@edit')->name('admin.pendidikan.edit'); 
    Route::get('/admin/pendidikan/{type}/{ikan}/{file_id}', 'pendidikanController@getDownload')->name('admin.pendidikan.download');

  /** Pengelolaan Nilai Tugas Akhir */
    Route::get('/admin/nilaiTA', 'NilaiTAController@index')->name('admin.nilaiTA.index');  //routing lihat daftar nilaiTA
    Route::post('/admin/nilaiTA', 'NilaiTAController@store')->name('admin.nilaiTA.store'); //routing simpan data nilai ta baru
    Route::get('/admin/nilaiTA/create', 'NilaiTAController@create')->name('admin.nilaiTA.create'); //routing tampilkan form data nilaiTA baru
    Route::patch('/admin/nilaiTA/{id}', 'NilaiTAController@update')->name('admin.nilaiTA.update'); //routing simpan perubahan data nilaiTA
    Route::get('/admin/nilaiTA/{id}/edit', 'NilaiTAController@edit')->name('admin.nilaiTA.edit');  //routing tampilkan form edit nilaiTA

    /** Routing Organisasi Mahasiswa*/
    Route::get('/admin/organisasi-mhs', 'OrganisasiMhsController@index')->name('admin.organisasi-mhs.index');  //routing lihat daftar organisasimhs
    Route::post('/admin/organisasi-mhs', 'OrganisasiMhsController@store')->name('admin.organisasi-mhs.store'); //routing simpan data organisasimhs baru
    Route::get('/admin/organisasi-mhs/create', 'OrganisasiMhsController@create')->name('admin.organisasi-mhs.create'); //routing tampilkan form data organisasimhs baru
    Route::delete('/admin/organisasi-mhs/{id}', 'OrganisasiMhsController@destroy')->name('admin.organisasi-mhs.destroy'); //routing hapus data organisasimhs baru
    Route::patch('/admin/organisasi-mhs/{id}', 'OrganisasiMhsController@update')->name('admin.organisasi-mhs.update'); //routing simpan perubahan data organisasimhs
    Route::get('/admin/organisasi-mhs/{id}', 'OrganisasiMhsController@show')->name('admin.organisasi-mhs.show'); //routing tampilkan detail organisasimhs
    Route::get('/admin/organisasi-mhs/{id}/edit', 'OrganisasiMhsController@edit')->name('admin.organisasi-mhs.edit');  //routing tampilkan form edit organisasimhs

    /** Daftar Keluarga   */
    /**  */

    Route::get('/admin/keluarga', 'keluargaController@index')->name('admin.keluarga.index');  //routing lihat daftar mahasiswa


     Route::get('/admin/keluarga', 'keluargaController@index')->name('admin.keluarga.index');  //routing lihat daftar mahasiswa
    Route::post('/admin/keluarga', 'kekuargaController@store')->name('admin.keluarga.store'); //routing simpan data mahasiswa baru
    Route::get('/admin/keluarga/create', 'keluargaController@create')->name('admin.keluarga.create'); //routing tampilkan form data mahasiswa baru
    Route::delete('/admin/keluarga/{mahasiswa}', 'keluargaController@destroy')->name('admin.keluarga.destroy'); //routing hapus data mahasiswa baru
    Route::patch('/admin/keluarga/{mahasiswa}', 'keluargaController@update')->name('admin.keluarga.update'); //routing simpan perubahan data mahasiswa
    Route::get('/admin/keluarga/{mahasiswa}', 'keluargaontroller@show')->name('admin.keluarga.show'); //routing tampilkan detail mahasiswa
    Route::get('/admin/keluarga/{mahasiswa}/edit', 'keluargaController@edit')->name('admin.keluarga.edit');  //routing tampilkan form edit mahasiswa

    /** Pengelolaan Penelitian */
    Route::get('/admin/penelitian', 'PenelitianController@index')->name('admin.penelitian.index');  //routing lihat daftar mahasiswa
    Route::post('/admin/penelitian', 'PenelitianController@store')->name('admin.penelitian.store'); //routing simpan data mahasiswa baru
    Route::get('/admin/penelitian/create', 'PenelitianController@create')->name('admin.penelitian.create'); //routing tampilkan form data mahasiswa baru
    Route::delete('/admin/penelitian/{penelitian}', 'PenelitianController@destroy')->name('admin.penelitian.destroy'); //routing hapus data mahasiswa baru
    Route::patch('/admin/penelitian/{penelitian}', 'PenelitianController@update')->name('admin.penelitian.update'); //routing simpan perubahan data mahasiswa
    Route::get('/admin/penelitian/{penelitian}', 'PenelitianController@show')->name('admin.penelitian.show'); //routing tampilkan detail mahasiswa
    Route::get('/admin/penelitian/{penelitian}/edit', 'PenelitianController@edit')->name('admin.penelitian.edit');  //routing tampilkan form edit mahasiswa

     /** Routing untuk tendik */
    
    Route::post('/admin/tendik/cari', 'TendikCariController@show')->name('admin.tendikcari.show'); //routing pencarian tendik
    Route::get('/admin/tendik/cari', 'TendikController@index')->name('admin.tendikcari.index'); //routing pencarian tendik
    Route::get('/admin/tendik', 'TendikController@index')->name('admin.tendik.index');  //routing lihat daftar tendik
    Route::post('/admin/tendik', 'TendikController@store')->name('admin.tendik.store'); //routing simpan data tendik baru
    Route::get('/admin/tendik/create', 'TendikController@create')->name('admin.tendik.create'); //routing tampilkan form data tendik baru
    Route::delete('/admin/tendik/{tendik}', 'TendikController@destroy')->name('admin.tendik.destroy'); //routing hapus data tendik baru
    Route::patch('/admin/tendik/{tendik}', 'TendikController@update')->name('admin.tendik.update'); //routing simpan perubahan data tendik
    Route::get('/admin/tendik/{tendik}', 'TendikController@show')->name('admin.tendik.show'); //routing tampilkan detail tendik
    Route::get('/admin/tendik/{tendik}/edit', 'TendikController@edit')->name('admin.tendik.edit');  //routing tampilkan form edit tendik


//     /** Pengelolaan Penelitian */
//     Route::get('/admin/penelitian', 'PenelitianController@index')->name('admin.penelitian.index');  //routing lihat daftar mahasiswa
//     Route::post('/admin/penelitian', 'PenelitianController@store')->name('admin.penelitian.store'); //routing simpan data mahasiswa baru
//     Route::get('/admin/penelitian/create', 'PenelitianController@create')->name('admin.penelitian.create'); //routing tampilkan form data mahasiswa baru
//     Route::delete('/admin/penelitian/{penelitian}', 'PenelitianController@destroy')->name('admin.penelitian.destroy'); //routing hapus data mahasiswa baru
//     Route::patch('/admin/penelitian/{penelitian}', 'PenelitianController@update')->name('admin.penelitian.update'); //routing simpan perubahan data mahasiswa
//     Route::get('/admin/penelitian/{penelitian}', 'PenelitianController@show')->name('admin.penelitian.show'); //routing tampilkan detail mahasiswa
//     Route::get('/admin/penelitian/{penelitian}/edit', 'PenelitianController@edit')->name('admin.penelitian.edit');  //routing tampilkan form edit mahasiswa

//     Route::post('/admin/penelitian-user/create', 'PenelitianUserController@store')->name('admin.penelitian-user.store'); //form tambah anggota
//     Route::get('/admin/penelitian-user/create/{penelitian}', 'PenelitianUserController@create')->name('admin.penelitian-user.create'); //form tambah anggota
//     Route::delete('/admin/penelitian-user/{penelitian}/{user}', 'PenelitianUserController@destroy')->name('admin.penelitian-user.destroy'); //hapus anggota


    Route::get('pembimbing/submit', 'PembimbingSubmissionController@create')->name('admin.pembimbing.create');
    Route::post('pembimbing/submit', 'PembimbingSubmissionController@store')->name('admin.pembimbing.store');

    // Routing pengelolaan tendik
    Route::post('/admin/tendik/cari', 'TendikCariController@show')->name('admin.tendikcari.show'); //routing pencarian tendik
    Route::get('/admin/tendik/cari', 'TendikController@index')->name('admin.tendikcari.index'); //routing pencarian mahasiswa
    Route::get('/admin/tendik', 'TendikController@index')->name('admin.tendik.index');  //routing lihat daftar tendik
    Route::post('/admin/tendik', 'TendikController@store')->name('admin.tendik.store'); //routing simpan data tendik baru
    Route::get('/admin/tendik/create', 'TendikController@create')->name('admin.tendik.create'); //routing tampilkan form data tendik baru
    Route::delete('/admin/tendik/{tendik}', 'TendikController@destroy')->name('admin.tendik.destroy'); //routing hapus data tendik baru
    Route::patch('/admin/tendik/{tendik}', 'TendikController@update')->name('admin.tendik.update'); //routing simpan perubahan data tendik
    Route::get('/admin/tendik/{tendik}', 'TendikController@show')->name('admin.tendik.show'); //routing tampilkan detail tendik
    Route::get('/admin/tendik/{tendik}/edit', 'TendikController@edit')->name('admin.tendik.edit');  //routing tampilkan form edit tendik
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    //Laravel Permission spatie/permissions
    Route::resource('permissions', 'Backend\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Backend\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Backend\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Backend\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Backend\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Backend\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

