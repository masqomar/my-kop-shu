<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SetoranSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transaksiSimpanan = Simpanan::with('user');

            return DataTables::of($transaksiSimpanan)
                ->addColumn('kode_transaksi', function ($row) {
                    return 'TRD' . str_pad($row->id, 5, '0', STR_PAD_LEFT);
                })->addColumn('member_id', function ($row) {
                    return $row->user ? $row->user->member_id : '-';
                })->addColumn('first_name', function ($row) {
                    return $row->user ? $row->user->first_name : '-';
                })->addColumn('jenis_akun', function ($row) {
                    return $row->jenis_akun ? $row->jenis_akun->jns_trans : '-';
                })->addColumn('jumlah', function ($row) {
                    return number_format($row->jumlah);
                })
                ->addColumn('action', 'admin.setor-simpanan.include.action')
                ->toJson();
        }

        return view('admin.setor-simpanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setor-simpanan.create');
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
