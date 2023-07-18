<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BayarAngsuranController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $angsuran = Pinjaman::with('user:id,first_name,member_id')->where('lunas', 'Belum');

            return DataTables::of($angsuran)
            ->addColumn('kode_transaksi', function ($row) {
                return 'TPJ' . str_pad($row->id, 5, '0', STR_PAD_LEFT);
            })->addColumn('tgl_pinjam', function ($row) {
                return date('j \\ F Y', strtotime($row->tgl_pinjam));
            })->addColumn('first_name', function ($row) {
                return $row->user;
            })->addColumn('pokok_pinjaman', function ($row) {
                return 'Rp. ' .number_format($row->jumlah);
            })->addColumn('lama_pinjaman', function ($row) {
                return $row->lama_angsuran . ' bulan';
            })->addColumn('angsuran_pokok', function ($row) {
                return 'Rp. '. number_format($row->jumlah / 6);
            })->addColumn('margin', function ($row) {
                return 'Rp. ' . number_format($row->biaya_adm);
            })->addColumn('angsuran_bulanan', function ($row) {
                return 'Rp. ' . number_format($row->jumlah / 6 + $row->biaya_adm);
            })->addColumn('action', 'admin.angsuran.include.action')
                ->toJson();
        }

        return view('admin.angsuran.index');
    }

    public function create()
    {
        //
    }
}
