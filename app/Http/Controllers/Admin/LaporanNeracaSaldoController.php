<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanNeracaSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $semuaTransaksiDebet = DB::table('nama_kas_tbl')
        ->leftJoin('v_transaksi', 'v_transaksi.untuk_kas', 'nama_kas_tbl.id')
        ->select(DB::raw("SUM(debet) as total_debet"), 'nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->groupBy('nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->where('nama_kas_tbl.aktif', 'Y')
        ->orderBy('id')
        ->get();
        $semuaTransaksiKredit = DB::table('nama_kas_tbl')
        ->leftJoin('v_transaksi', 'v_transaksi.dari_kas', 'nama_kas_tbl.id')
        ->select(DB::raw("SUM(kredit) as total_kredit"), 'nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->groupBy('nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->where('nama_kas_tbl.aktif', 'Y')        
        ->orderBy('id')
        ->get();
         $semuaAkunDebet = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(debet) as total_akun_debet"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->get();
         $semuaAkunKredit = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(kredit) as total_akun_kredit"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->get();
        
        return view('admin.laporan-neraca-saldo.index', compact('semuaTransaksiDebet', 'semuaTransaksiKredit', 'semuaAkunDebet', 'semuaAkunKredit'));
    }

    public function filter(Request $request)
    {
        $dari_tanggal =  $request->dari_tanggal;
        $sampai_tanggal =  $request->sampai_tanggal;
        
        $semuaTransaksiDebet = DB::table('nama_kas_tbl')
        ->leftJoin('v_transaksi', 'v_transaksi.untuk_kas', 'nama_kas_tbl.id')
        ->select(DB::raw("SUM(debet) as total_debet"), 'nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->groupBy('nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->where('nama_kas_tbl.aktif', 'Y')
        ->orderBy('id')
        ->whereDate('v_transaksi.tgl', '>=', $dari_tanggal)
        ->whereDate('v_transaksi.tgl', '<=', $sampai_tanggal)
        ->get();
        $semuaTransaksiKredit = DB::table('nama_kas_tbl')
        ->leftJoin('v_transaksi', 'v_transaksi.dari_kas', 'nama_kas_tbl.id')
        ->select(DB::raw("SUM(kredit) as total_kredit"), 'nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->groupBy('nama_kas_tbl.nama', 'nama_kas_tbl.id')
        ->where('nama_kas_tbl.aktif', 'Y')        
        ->orderBy('id')
        ->whereDate('v_transaksi.tgl', '>=', $dari_tanggal)
        ->whereDate('v_transaksi.tgl', '<=', $sampai_tanggal)
        ->get();
         $semuaAkunDebet = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(debet) as total_akun_debet"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->whereDate('v_transaksi.tgl', '>=', $dari_tanggal)
        ->whereDate('v_transaksi.tgl', '<=', $sampai_tanggal)
        ->get();
         $semuaAkunKredit = DB::table('jns_akun')
        ->leftJoin('v_transaksi', 'v_transaksi.transaksi', 'jns_akun.id')
        ->select(DB::raw("SUM(kredit) as total_akun_kredit"), 'jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->groupBy('jns_akun.kd_aktiva', 'jns_akun.jns_trans', 'jns_akun.id', 'jns_akun.akun')
        ->where('jns_akun.aktif', 'Y')
        ->orderByRaw('LPAD(kd_aktiva, 1, 0) ASC')
        ->orderByRaw('LPAD(kd_aktiva, 5, 1) ASC')
        ->whereDate('v_transaksi.tgl', '>=', $dari_tanggal)
        ->whereDate('v_transaksi.tgl', '<=', $sampai_tanggal)
        ->get();
        
        return view('admin.laporan-neraca-saldo.index', compact('semuaTransaksiDebet', 'semuaTransaksiKredit', 'semuaAkunDebet', 'semuaAkunKredit'));
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
