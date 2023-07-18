<?php

use App\Http\Controllers\Admin\DataAnggotaController;
use Illuminate\Support\Facades\Route;

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
        Route::post('setor-simpanan/store', [App\Http\Controllers\Admin\SetoranSimpananController::class, 'store'])->name('admin.setor-simpanan.store');

        // Penarikan Simpanan
        Route::get('penarikan-simpanan', [App\Http\Controllers\Admin\PenarikanSimpananController::class, 'index'])->name('admin.penarikan-simpanan.index');
        Route::get('penarikan-simpanan/create', [App\Http\Controllers\Admin\PenarikanSimpananController::class, 'create'])->name('admin.penarikan-simpanan.create');
        Route::post('penarikan-simpanan/store', [App\Http\Controllers\Admin\PenarikanSimpananController::class, 'store'])->name('admin.penarikan-simpanan.store');

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

        // Master Barang
        Route::get('data-barang', [App\Http\Controllers\Admin\DataBarangController::class, 'index'])->name('admin.data-barang.index');
        Route::get('data-barang/create', [App\Http\Controllers\Admin\DataBarangController::class, 'create'])->name('admin.data-barang.create');
        Route::post('data-barang/store', [App\Http\Controllers\Admin\DataBarangController::class, 'store'])->name('admin.data-barang.store');

        // Master Anggota
        Route::get('data-anggota', [App\Http\Controllers\Admin\DataAnggotaController::class, 'index'])->name('admin.data-anggota.index');
        Route::get('data-anggota/create', [App\Http\Controllers\Admin\DataAnggotaController::class, 'create'])->name('admin.data-anggota.create');
        Route::post('data-anggota/store', [App\Http\Controllers\Admin\DataAnggotaController::class, 'store'])->name('admin.data-anggota.store');

        // Pinjaman Anggota
        Route::get('pinjaman', [App\Http\Controllers\Admin\DataPinjamanController::class, 'index'])->name('admin.pinjaman.index');
        Route::get('pinjaman/create', [App\Http\Controllers\Admin\DataPinjamanController::class, 'create'])->name('admin.pinjaman.create');

        // Angsuran Pinjaman
        Route::get('angsuran', [App\Http\Controllers\Admin\BayarAngsuranController::class, 'index'])->name('admin.angsuran.index');
        Route::get('angsuran/create', [App\Http\Controllers\Admin\BayarAngsuranController::class, 'create'])->name('admin.angsuran.create');

        // Pinjaman Lunas
        Route::get('lunas', [App\Http\Controllers\Admin\PinjamanLunasController::class, 'index'])->name('admin.lunas.index');
        Route::get('lunas/create', [App\Http\Controllers\Admin\PinjamanLunasController::class, 'create'])->name('admin.lunas.create');

        // Laporan Laporan
        Route::get('laporan-neraca-saldo', [App\Http\Controllers\Admin\LaporanNeracaSaldoController::class, 'index'])->name('admin.laporan-neraca-saldo.index');
        Route::get('laporan-neraca-saldo/filter', [App\Http\Controllers\Admin\LaporanNeracaSaldoController::class, 'filter'])->name('admin.laporan-neraca-saldo.filter');
        Route::get('laporan-laba-rugi', [App\Http\Controllers\Admin\LaporanLabaRugiController::class, 'index'])->name('admin.laporan-laba-rugi.index');
        Route::get('laporan-shu', [App\Http\Controllers\Admin\LaporanShuController::class, 'index'])->name('admin.laporan-shu.index');
        Route::get('laporan-pembagian-shu', [App\Http\Controllers\Admin\LaporanPembagianShuController::class, 'index'])->name('admin.laporan-pembagian-shu.index');
        Route::get('laporan-kas-anggota', [App\Http\Controllers\Admin\LaporanKasAnggotaController::class, 'index'])->name('admin.laporan-kas-anggota.index');

        // Data Pinjaman
        Route::get('data-angsuran', [App\Http\Controllers\Admin\DataAngsuranController::class, 'index'])->name('admin.data-angsuran.index');
        Route::get('data-angsuran/create', [App\Http\Controllers\Admin\DataAngsuranController::class, 'create'])->name('admin.data-angsuran.create');

        // Data Pengajuan 
        Route::get('data-pengajuan', [App\Http\Controllers\Admin\DataPengajuanController::class, 'index'])->name('admin.data-pengajuan.index');

        // Log Activity
        Route::get('log-activity', [App\Http\Controllers\LogAcivityController::class, 'index'])->name('activities.index');

        // Setting Tabel
        Route::get('profil', [App\Http\Controllers\Admin\SettingTblController::class, 'profil'])->name('admin.setting.profil');
    });
});
