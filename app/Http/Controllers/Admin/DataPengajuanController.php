<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DataPengajuanController extends Controller
{
    public function index()
    {
        $dataPengajuan = Pengajuan::with('user:id,member_id,first_name')->paginate(10);
        // $dataAngsuran =  DB::table('tbl_pinjaman_h')
        //     ->leftJoin('tbl_pinjaman_d', 'tbl_pinjaman_d.pinjam_id', 'tbl_pinjaman_h.id')
        //     ->leftJoin('users', 'users.id', 'tbl_pinjaman_h.anggota_id')
        //     ->select('tbl_pinjaman_h.anggota_id', DB::raw("SUM(jumlah_bayar) as sudah_bayar"))
        //     ->groupBy('tbl_pinjaman_h.anggota_id')
        //     ->paginate(10);

        // return json_encode($dataPengajuan);

        return view('admin.data-pengajuan.index', compact('dataPengajuan'));
    }

    public function create()
    {
        //
    }
}
