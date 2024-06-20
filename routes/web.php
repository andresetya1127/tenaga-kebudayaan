<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Auth Dan Registrasi User
Route::controller(Auth::class)->group(function () {
    Route::post('authenticate/user/login', 'auth')->name('auth')->middleware('guest');
    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::get('log-out/user', 'logOut')->name('logOut.user')->middleware('auth');
    Route::get('register', 'register')->name('register')->middleware('guest');
    Route::post('register/store/user', 'register_store')->name('auth.store')->middleware('guest');
});



//============================ Route Landing ==============================
Route::get('/cagar-budaya', \App\Livewire\Landing\CagarBudaya::class)->name('landing.cagar-budaya');
Route::get('/detail-cagar-budaya/{id}', \App\Livewire\Landing\DetailCagar::class)->name('detail.cagar-budaya');

Route::get('/odcb', \App\Livewire\Landing\ObjekDiduga::class)->name('landing.odcb');
Route::get('/detail-odcb/{id}', \App\Livewire\Landing\DetailObjekDiduga::class)->name('detail.odcb');

Route::get('/karya-seni', \App\Livewire\Landing\KaryaSeni::class)->name('landing.karya-seni');
Route::get('/detail-karya-seni/{id}', \App\Livewire\Landing\DetailKaryaSeni::class)->name('detail.karya-seni');

Route::get('/karya-budaya', \App\Livewire\Landing\KaryaBudaya::class)->name('landing.karya-budaya');
Route::get('/detail-karya-budaya/{id}', \App\Livewire\Landing\DetailKaryaBudaya::class)->name('detail.karya-budaya');

Route::get('/lembaga-komunitas', \App\Livewire\Landing\LembagaKomunitas::class)->name('landing.lembaga-komunitas');
Route::get('/detail-lembaga-komunitas/{id}', \App\Livewire\Landing\DetailLembagaKomunitas::class)->name('detail.lembaga');

Route::get('/wbtb', \App\Livewire\Landing\Wbtb::class)->name('landing.wbtb');
Route::get('/detail-wbtb/{id}', \App\Livewire\Landing\DetailWbtb::class)->name('detail.wbtb');

Route::get('berita/all-news', \App\Livewire\Berita\BertaAll::class)->name('all.berita');
Route::get('berita/show-news/{id}', \App\Livewire\Berita\BeritaShow::class)->name('show.berita');

Route::get('/', \App\Livewire\Landing\Index::class)->name('home');
// Route::get('/urun-daya', \App\Livewire\Landing\UrunDaya::class)->name('urun-daya');
Route::get('/dasar-hukum', \App\Livewire\Landing\DasarHukum::class)->name('dasar-hukum');

Route::get('/galeri/all-galeri', \App\Livewire\Landing\Galeri::class)->name('all-galeri');
//============================ End =============================================



// Admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', \App\Livewire\Landing\Dashboard::class)->name('landing.dashboard');

    Route::middleware('admin')->group(function () {


        //============================ Route Laporan ==============================
        Route::get('admin/laporan', \App\Livewire\Laporan\Index::class)->name('index.laporan');

        Route::post('/laporan-pdf/{laporan}', [PdfController::class, 'exportPdf'])->name('pdf');
        //============================ End =============================================


        //============================ Route Cagar Budaya ==============================
        Route::get('admin/cagar-budaya', \App\Livewire\CagarBudayaV2\Show::class)->name('index.cagar_budaya');

        Route::get('admin/add/cagar-budaya', \App\Livewire\CagarBudayaV2\Add::class)->name('add.cagar_budaya');

        Route::get('admin/draft/cagar-budaya', \App\Livewire\CagarBudayaV2\Draft::class)->name('draft.cagar_budaya');

        Route::get('admin/draft/{id}/cagar-budaya', \App\Livewire\CagarBudayaV2\Complete::class)->name('complete.cagar_budaya');

        Route::get('admin/edit/{id}/cagar-budaya', \App\Livewire\CagarBudayaV2\Edit::class)->name('edit.cagar_budaya');
        //============================ End =============================================


        //============================ Route ODCB ==============================
        Route::get('admin/odcb', \App\Livewire\Odcb\Show::class)->name('index.odcb');

        Route::get('admin/add/odcb', \App\Livewire\Odcb\Add::class)->name('add.odcb');

        // Route::get('admin/draft/odcb', \App\Livewire\Odcb\Draft::class)->name('draft.odcb');

        // Route::get('admin/draft/{id}/odcb', \App\Livewire\Odcb\Complete::class)->name('complete.odcb');

        Route::get('admin/edit/{id}/odcb', \App\Livewire\Odcb\Edit::class)->name('edit.odcb');
        //============================ End =============================================

        // //============================ Route ODCB ==============================
        // Route::get('admin/odcb', \App\Livewire\Odcb\Show::class)->name('index.odcb');
        // Route::get('admin/add/odcb', \App\Livewire\Odcb\Add::class)->name('add.odcb');
        // Route::get('admin/edit/{id}/odcb', \App\Livewire\Odcb\Edit::class)->name('edit.odcb');
        // Route::get('admin/complete/{id}/odcb', \App\Livewire\Odcb\Complete::class)->name('complete.odcb');
        // Route::get('admin/draft/odcb', \App\Livewire\Odcb\Draft::class)->name('draft.odcb');
        // //============================ End =============================================

        //============================ Route WBTB ==============================
        Route::get('admin/wbtb', \App\Livewire\Wbtb\Show::class)->name('index.wbtb');
        Route::get('admin/add/wbtb', \App\Livewire\Wbtb\Add::class)->name('add.wbtb');
        Route::get('admin/edit/{id}/wbtb', \App\Livewire\Wbtb\Edit::class)->name('edit.wbtb');
        //============================ End =============================================


        //============================ Route Dasar Hukum ==============================
        Route::get('admin/dasar-hukum', \App\Livewire\DasarHukum\Show::class)->name('index.dasar-hukum');
        //============================ End =============================================



        //============================ Route Informasi ==============================
        Route::get('admin/setting-info', \App\Livewire\Informasi::class)->name('setting.info');
        //============================ End =============================================


        //============================ Route List Admin ==============================
        Route::get('admin/access-admin', \App\Livewire\ListAdmin::class)->name('list.admin');
        //============================ End =============================================





    });

    //============================ Route Galeri ==============================
    Route::get('admin/list-galeri', \App\Livewire\Galeri\Index::class)->name('list.galeri');
    Route::get('admin/album/{id}', \App\Livewire\Galeri\Album::class)->name('album.galeri');
    //============================ End =============================================

    //============================ Route Karya Budaya ==============================
    Route::get('admin/karya-budaya', \App\Livewire\KaryaBudaya\Show::class)->name('index.karya-budaya');

    Route::get('admin/add/karya-budaya',  \App\Livewire\KaryaBudaya\Add::class)->name('add.karya-budaya');

    Route::get('admin/edit/{id}/karya-budaya',  \App\Livewire\KaryaBudaya\Edit::class)->name('edit.karya-budaya');
    //============================ End =============================================


    //============================ Route Karya Seni ==============================
    Route::get('admin/karya-seni', \App\Livewire\KaryaSeni\Show::class)->name('index.karya-seni');

    Route::get('admin/add/karya-seni', \App\Livewire\KaryaSeni\Add::class)->name('add.karya-seni');

    Route::get('admin/edit/{id}/karya-seni',  \App\Livewire\KaryaSeni\Edit::class)->name('edit.karya-seni');
    //============================ End =============================================

    //============================ Route Pendataan Tenaga Kebudayaan ==============================
    Route::get('admin/pendataan-kebudayaan',  \App\Livewire\PendataanBudaya\Show::class)->name('index.pendataan-kebudayaan');

    Route::get('admin/add/pendataan-kebudayaan', \App\Livewire\PendataanBudaya\Add::class)->name('add.pendataan-kebudayaan');

    Route::get('admin/edit/{id}/pendataan-kebudayaan', \App\Livewire\PendataanBudaya\Edit::class)->name('edit.pendataan-kebudayaan');
    //============================ End =============================================




    //============================ Route Lembaga Komunitas ==============================
    Route::get('admin/lembaga-budaya', \App\Livewire\LembagaKomunitas\Show::class)->name('index.lembaga-komunitas');

    Route::get('admin/add/lembaga-budaya', \App\Livewire\LembagaKomunitas\Add::class)->name('add.lembaga-komunitas');

    Route::get('admin/edit/{id}/lembaga-budaya', \App\Livewire\LembagaKomunitas\Edit::class)->name('edit.lembaga-komunitas');
    //============================ End =============================================




    //============================ Route Lembaga Komunitas ==============================
    Route::get('admin/list-berita', \App\Livewire\Berita\BeritaList::class)->name('list.berita');
    Route::get('admin/add-news', \App\Livewire\Berita\BeritaAdd::class)->name('add.berita');
    Route::get('admin/update-news/{id}', \App\Livewire\Berita\BeritaEdit::class)->name('edit.berita');
    //============================ End =============================================




    //============================ Route Profile ==============================
    Route::get('admin/profile-setting', \App\Livewire\Profile\Setting::class)->name('setting.profile');
    //============================ End =============================================


    //============================ Route Setting Tema ==============================
    Route::get('admin/theme-setting', \App\Livewire\UiSetting::class)->name('setting.theme');
    //============================ End =============================================


    //============================ Route Pembugaran ==============================
    Route::get('admin/pembugaran/{param}/{id}', \App\Livewire\Detail::class)->name('pembugaran.show');
    //============================ End =============================================



});
