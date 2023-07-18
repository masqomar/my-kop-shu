<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use App\Models\PinjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DataPinjamanController extends Controller
{
    public function index()
    {
        $dataPinjaman = DB::table('tbl_pinjaman_h')
        ->leftJoin('tbl_pinjaman_d', 'tbl_pinjaman_d.pinjam_id', 'tbl_pinjaman_h.id')
        ->leftJoin('tbl_barang', 'tbl_barang.id', 'tbl_pinjaman_h.barang_id')
        ->leftJoin('users', 'users.id', 'tbl_pinjaman_h.anggota_id')
        ->select('tbl_pinjaman_h.id', 'tgl_pinjam', 'anggota_id', 'barang_id', 'lama_angsuran', 'jumlah', 'bunga', 'biaya_adm', 'lunas', 'users.member_id', 'users.first_name', 'users.last_name', 'tbl_barang.nm_barang', 'tbl_barang.harga', DB::raw("SUM(jumlah_bayar) as sudah_bayar"), DB::raw("COUNT(angsuran_ke) as sisa_angsuran"))
        ->groupBy('tbl_pinjaman_h.id', 'tgl_pinjam', 'anggota_id', 'barang_id', 'lama_angsuran', 'jumlah', 'bunga', 'biaya_adm', 'lunas', 'users.member_id', 'users.first_name', 'users.last_name', 'tbl_barang.nm_barang', 'tbl_barang.harga')
        ->paginate(5);

        // return json_encode($dataPinjaman);
        return view('admin.pinjaman.index', compact('dataPinjaman'));
    }

    public function create()
    {
        //
    }
}
