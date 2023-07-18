<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPembagianShuController extends Controller
{
    public function index()
    {
        $pembagianShu = User::select('id', 'first_name', 'member_id')->where('status', 1)->paginate(10);
        // $setoranSiWajib = DB::table('tbl_trans_sp') 
        // ->leftJoin('users', 'users.id', 'tbl_trans_sp.anggota_id')
        // ->select('tbl_trans_sp.anggota_id', DB::raw("SUM(tbl_trans_sp.jumlah) as total_setoran_wajib"))
        // ->groupBy('tbl_trans_sp.anggota_id')
        // ->where('tbl_trans_sp.jenis_id', 41)
        // ->where('tbl_trans_sp.akun', 'Setoran')
        // ->paginate(10);
        // $penarikanSiWajib = DB::table('tbl_trans_sp') 
        // ->leftJoin('users', 'users.id', 'tbl_trans_sp.anggota_id')
        // ->select('tbl_trans_sp.anggota_id', DB::raw("SUM(tbl_trans_sp.jumlah) as total_penarikan_wajib"))
        // ->groupBy('tbl_trans_sp.anggota_id')
        // ->where('tbl_trans_sp.jenis_id', 41)
        // ->where('tbl_trans_sp.akun', 'Penarikan')
        // ->paginate(10);
        // $setoranSisuka = DB::table('tbl_trans_sp') 
        // ->leftJoin('users', 'users.id', 'tbl_trans_sp.anggota_id')
        // ->select('tbl_trans_sp.anggota_id', DB::raw("SUM(tbl_trans_sp.jumlah) as total_setoran_suka"))
        // ->groupBy('tbl_trans_sp.anggota_id')
        // ->where('tbl_trans_sp.jenis_id', 32)
        // ->where('tbl_trans_sp.akun', 'Setoran')
        // ->paginate(10); 

        // $testQuery = User::with('simpanan')->where('status', 1)->get();

        // return json_encode($testQuery);
        return view('admin.laporan-pembagian-shu.index', compact('pembagianShu'));
    }
}
