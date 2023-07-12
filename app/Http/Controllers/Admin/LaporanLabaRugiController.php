<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use App\Models\PinjamanDetail;
use App\Models\ViewPinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanLabaRugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPinjaman = DB::table('v_hitung_pinjaman')->sum('jumlah');
        $keuntungan = DB::table('v_hitung_pinjaman')->sum(DB::raw('biaya_adm * lama_angsuran'));
        $kembang = DB::table('v_hitung_pinjaman')->sum(DB::raw('bunga_pinjaman * lama_angsuran'));
        $tagihan = DB::table('v_hitung_pinjaman')->sum(DB::raw('tagihan'));
        $pembulatan = $tagihan - ($totalPinjaman + + $kembang + $keuntungan); 
        $estimasiPendapatan = $tagihan - $totalPinjaman;

        $totalAngsuran = DB::table('tbl_pinjaman_d')
        ->leftJoin("tbl_pinjaman_h", 'tbl_pinjaman_h.id', 'tbl_pinjaman_d.pinjam_id')
        ->sum('jumlah_bayar');

        $pendapatanPinjaman = $totalAngsuran - $totalPinjaman;

        $akunPendapatan = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(debet) as total_akun_debet"), DB::raw("SUM(kredit) as total_akun_kredit"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->where('laba_rugi', 'PENDAPATAN')
        ->havingRaw('CHAR_LENGTH(kd_aktiva) > 1')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->get();

        $akunBiaya = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(debet) as total_biaya_debet"), DB::raw("SUM(kredit) as total_biaya_kredit"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->where('laba_rugi', 'BIAYA')
        ->havingRaw('CHAR_LENGTH(kd_aktiva) > 1')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->get();

        return view('admin.laporan-laba-rugi.index', compact('totalPinjaman', 'keuntungan', 'kembang', 'tagihan', 'pembulatan', 'estimasiPendapatan', 'pendapatanPinjaman', 'akunPendapatan', 'akunBiaya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
