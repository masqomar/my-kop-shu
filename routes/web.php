<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
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
     Route::get('ganti-password', [App\Http\Controllers\User\ProfilController::class, 'changePassword'])->name('user.profil.password');
     Route::get('edit-profil', [App\Http\Controllers\User\ProfilController::class, 'editProfil'])->name('user.profil.detail');

});
  
/*---- All Admin Routes List----*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        
    // Dashboard Admin
    Route::get('home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    
    // Pemasukan Kas
    Route::get('pemasukan-kas', [App\Http\Controllers\Admin\PemasukanKasController::class, 'index'])->name('admin.pemasukan-kas.index');
    Route::get('pemasukan-kas/create', [App\Http\Controllers\Admin\PemasukanKasController::class, 'create'])->name('admin.pemasukan-kas.create');
    Route::post('pemasukan-kas/store', [App\Http\Controllers\Admin\PemasukanKasController::class, 'store'])->name('admin.pemasukan-kas.store');
    
    // Pengeluaran Kas
    Route::get('pengeluaran-kas', [App\Http\Controllers\Admin\PengeluaranKasController::class, 'index'])->name('admin.pengeluaran-kas.index');
    Route::get('pengeluaran-kas/create', [App\Http\Controllers\Admin\PengeluaranKasController::class, 'create'])->name('admin.pengeluaran-kas.create');
    Route::post('pengeluaran-kas/store', [App\Http\Controllers\Admin\PengeluaranKasController::class, 'store'])->name('admin.pengeluaran-kas.store');
    
    // Transfer Kas
    Route::get('transfer-kas', [App\Http\Controllers\Admin\TransferKasController::class, 'index'])->name('admin.transfer-kas.index');
    Route::get('transfer-kas/create', [App\Http\Controllers\Admin\TransferKasController::class, 'create'])->name('admin.transfer-kas.create');
    Route::post('transfer-kas/store', [App\Http\Controllers\Admin\TransferKasController::class, 'store'])->name('admin.transfer-kas.store');

    // Setor Simpanan
    Route::get('setor-simpanan', [App\Http\Controllers\Admin\SetoranSimpananController::class, 'index'])->name('admin.setor-simpanan.index');
    Route::get('setor-simpanan/create', [App\Http\Controllers\Admin\SetoranSimpananController::class, 'create'])->name('admin.setor-simpanan.create');

    // Voucher Bulanan
    Route::get('voucher-bulanan', [App\Http\Controllers\Admin\VoucherBulananController::class, 'index'])->name('admin.voucher-bulanan.index');
    Route::get('voucher-bulanan/create', [App\Http\Controllers\Admin\VoucherBulananController::class, 'create'])->name('admin.voucher-bulanan.create');
    Route::post('voucher-bulanan/store', [App\Http\Controllers\Admin\VoucherBulananController::class, 'store'])->name('admin.voucher-bulanan.store');

    // Topup JIMPay
    Route::get('topup', [App\Http\Controllers\Admin\TopupController::class, 'index'])->name('admin.topup.index');
    Route::get('topup/create', [App\Http\Controllers\Admin\TopupController::class, 'create'])->name('admin.topup.create');
    Route::post('topup/store', [App\Http\Controllers\Admin\TopupController::class, 'store'])->name('admin.topup.store');

    
    // Master Data
    Route::get('jenis-akun', [App\Http\Controllers\Admin\JenisAkunController::class, 'index'])->name('admin.jenis-akun.index');
    Route::get('jenis-simpanan', [App\Http\Controllers\Admin\JenisSimpananController::class, 'index'])->name('admin.jenis-simpanan.index');
    Route::get('lama-angsuran', [App\Http\Controllers\Admin\LamaAngsuranController::class, 'index'])->name('admin.lama-angsuran.index');
    Route::get('data-anggota', [App\Http\Controllers\Admin\DataAnggotaController::class, 'index'])->name('admin.data-anggota.index');
    
    // Laporan Laporan
    Route::get('laporan-neraca-saldo', [App\Http\Controllers\Admin\LaporanNeracaSaldoController::class, 'index'])->name('admin.laporan-neraca-saldo.index');
    Route::get('laporan-neraca-saldo/filter', [App\Http\Controllers\Admin\LaporanNeracaSaldoController::class, 'filter'])->name('admin.laporan-neraca-saldo.filter');
    Route::get('laporan-laba-rugi', [App\Http\Controllers\Admin\LaporanLabaRugiController::class, 'index'])->name('admin.laporan-laba-rugi.index');
    Route::get('laporan-shu', [App\Http\Controllers\Admin\LaporanShuController::class, 'index'])->name('admin.laporan-shu.index');

    });
});
  
/*---- All Admin Routes List----*/
Route::middleware(['auth', 'user-access:mitra'])->group(function () {
  
    Route::get('/mitra/home', [App\Http\Controllers\HomeController::class, 'mitraHome'])->name('mitra.home');
});


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
