<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAngsuranController extends Controller
{
    public function index()
    {
        $dataAngsuran =  DB::table('tbl_pinjaman_h')
        ->leftJoin('tbl_pinjaman_d', 'tbl_pinjaman_d.pinjam_id', 'tbl_pinjaman_h.id')
        ->leftJoin('users', 'users.id', 'tbl_pinjaman_h.anggota_id')
        ->select('tbl_pinjaman_h.id', 'tgl_pinjam', 'anggota_id', 'lama_angsuran', 'jumlah', 'bunga', 'biaya_adm', 'lunas', 'users.member_id', 'users.first_name', 'users.last_name', DB::raw("SUM(jumlah_bayar) as sudah_bayar"), DB::raw("COUNT(angsuran_ke) as sisa_angsuran"))
        ->groupBy('tbl_pinjaman_h.id', 'tgl_pinjam', 'anggota_id', 'lama_angsuran', 'jumlah', 'bunga', 'biaya_adm', 'lunas', 'users.member_id', 'users.first_name', 'users.last_name')
        ->paginate(10);

        // return json_encode($dataAngsuran);
        return view('admin.data-angsuran.index', compact('dataAngsuran'));
    }

    public function create()
    {
        //
    }
}
