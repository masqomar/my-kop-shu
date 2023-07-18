<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->type == 'user' || Auth::user()->type == 'store')
        return Redirect::to('/home');
        else {
            return Redirect::to('/admin/home');
        }
    } else {
        // User is not logged in, handle the appropriate response
        // For example, you can redirect them to the login page
        return Redirect::to('/login');
    }
});

Auth::routes();

/*---- All User Routes List----*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    // Dashboard User
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Bayar
    Route::get('bayar', [App\Http\Controllers\User\BayarController::class, 'index'])->name('user.bayar.index');
    Route::get('bayar/cari', [App\Http\Controllers\User\BayarController::class, 'cari'])->name('user.bayar.cari');
    Route::post('bayar/store', [App\Http\Controllers\User\BayarController::class, 'store'])->name('user.bayar.store');
    Route::get('bayar/sukses', [App\Http\Controllers\User\BayarController::class, 'sukses'])->name('user.bayar.sukses');

    // Transfer Saldo ke anggota lain
    Route::get('transfer', [App\Http\Controllers\User\TransferController::class, 'index'])->name('user.transfer.index');
    Route::get('transfer/manual', [App\Http\Controllers\User\TransferController::class, 'manualTransfer'])->name('user.transfer.manual');
    Route::get('cari-anggota', [App\Http\Controllers\User\TransferController::class, 'fetch'])->name('user.transfer.fetch');
    Route::post('transfer/simpanManualTransfer', [App\Http\Controllers\User\TransferController::class, 'simpanManualTransfer'])->name('user.transfer.simpanManualTransfer');
    Route::get('transfer/scantransfer', [App\Http\Controllers\User\TransferController::class, 'scantransfer'])->name('user.transfer.scantransfer');
    Route::get('transfer/cari', [App\Http\Controllers\User\TransferController::class, 'cari'])->name('user.transfer.cari');
    Route::post('transfer/kirimSaldo', [App\Http\Controllers\User\TransferController::class, 'kirimSaldo'])->name('user.transfer.kirimSaldo');

     // Topup Saldo
     Route::get('topup', [App\Http\Controllers\User\TopupController::class, 'index'])->name('user.topup.index');
     Route::get('topup/cash', [App\Http\Controllers\User\TopUpController::class, 'topUpCash'])->name('user.topup.cash');
     Route::post('topup/store', [App\Http\Controllers\User\TopUpController::class, 'store'])->name('user.topup.store');
     Route::get('topup/konfirmasi', [App\Http\Controllers\User\TopUpController::class, 'konfirmasi'])->name('user.topup.konfirmasi');
    //  Route::get('topup/sukarela', [App\Http\Controllers\User\TopUpController::class, 'topUpSukarela'])->name('user.topup.sukarela');
     // Route::post('topup/storeSukarela', [TopUpController::class, 'storeSukarela'])->name('user.topup.storeSukarela');

    // Simpanan Wajib
    Route::get('simpanan-wajib', [App\Http\Controllers\User\SimWajibController::class, 'index'])->name('user.sim-wajib.index');

    // Simpanan Sukarela
    Route::get('simpanan-sukarela', [App\Http\Controllers\User\SimSukarelaController::class, 'index'])->name('user.sim-sukarela.index');
    Route::get('simpanan-sukarela/{id}/detail', [App\Http\Controllers\User\SimSukarelaController::class, 'show'])->name('user.sim-sukarela.show'); Route::get('simpanan-sukarela/pencairan', [SimSukarelaController::class, 'tarik'])->name('user.sim-sukarela.tarik');
    // Route::post('simpanan-sukarela/pencairan', [App\Http\Controllers\User\SimSukarelaController::class, 'tarikStore'])->name('user.sim-sukarela.tarikStore');

    // Riwayat Transaksi
    Route::get('riwayat-transaksi', [App\Http\Controllers\User\RiwayatTransaksiController::class, 'index'])->name('user.riwayat-transaksi.index');

     // Profil
     Route::get('profil', [App\Http\Controllers\User\ProfilController::class, 'index'])->name('user.profil.index');
     Route::get('edit-profil', [App\Http\Controllers\User\ProfilController::class, 'editProfil'])->name('user.profil.detail');

});
  




Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
require __DIR__.'/admin_routes.php';
require __DIR__.'/mitra_routes.php';