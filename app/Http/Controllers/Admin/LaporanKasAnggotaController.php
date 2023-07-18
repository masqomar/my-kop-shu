<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanKasAnggotaController extends Controller
{
    public function index()
    {
        $dataAnggota = User::paginate(10);
        $angsuran = DB::table('tbl_pinjaman_h')
        ->leftJoin('tbl_pinjaman_d', 'tbl_pinjaman_d.pinjam_id', 'tbl_pinjaman_h.id')
        ->leftJoin('users', 'users.id', 'tbl_pinjaman_h.anggota_id')
        ->select(DB::raw("SUM(jumlah_bayar) as dibayar"), 'tbl_pinjaman_h.anggota_id')
        ->groupBy('tbl_pinjaman_h.anggota_id')
        ->get();

        return view('admin.laporan-kas-anggota.index', compact('dataAnggota', 'angsuran'));
    }
}
