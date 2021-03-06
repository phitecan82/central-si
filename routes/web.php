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
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group( function(){
    Route::get('/home', 'HomeController@index')->name('admin.home');
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

    /** Routing untuk tugas mulai dari sini */

    // Routing sidang TA
    Route::get('/admin/sidang', 'SidangController@index')->name('admin.sidang_ta.index');
    Route::get('/admin/sidang/create', 'SidangController@create')->name('admin.sidang_ta.create');
    Route::post('/admin/sidang', 'SidangController@store')->name('admin.sidang_ta.store');
    Route::get('/admin/sidang/{sidangta}/edit', 'SidangController@edit')->name('admin.sidang_ta.edit');
    Route::patch('/admin/sidang/{id}', 'SidangController@update')->name('admin.sidang_ta.update');
    Route::get('/admin/sidang/{sidangta}/show', 'SidangController@show')->name('admin.sidang_ta.show');
    Route::delete('/admin/sidang/{sidangta}', 'SidangController@destroy')->name('admin.sidang_ta.destroy');

    
    Route::get('/admin/sidang/penguji', 'SidangController@lihat')->name('admin.sidang_ta.show_penguji');
    Route::get('/admin/sidang/{sidangta}/lihat', 'SidangController@lihat')->name('admin.sidang_ta.lihat');
    
    Route::get('/admin/sidang/{sidangta}/penguji', 'SidangController@add')->name('admin.sidang_ta.penguji'); //routing menampilkan form tambah penguji sidang
    Route::post('/admin/penguji', 'SidangController@insert')->name('admin.sidang_ta.insert'); //roting simpan data sidang baru
    Route::delete('admin/sidang/show/{sidangta}', 'SidangController@destroydosen')->name('admin.sidang_ta.delete');
    Route::get('pembimbing/submit', 'PembimbingSubmissionController@create')->name('admin.pembimbing.create');
    Route::post('pembimbing/submit', 'PembimbingSubmissionController@store')->name('admin.pembimbing.store');

    Route::get('storage/{filename}', function ($filename)
    {
        $path = public_path('storage/files/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });
});
    
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    //Laravel Permission spatie/permissions
    Route::resource('permissions', 'Backend\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Backend\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Backend\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Backend\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Backend\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Backend\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

