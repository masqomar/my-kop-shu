<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKasTransaksiRequest;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PemasukanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transaksiKas = TransaksiKas::with('dari_kas', 'untuk_kas', 'jenis_akun')->where('akun', 'Pemasukan');

            return DataTables::of($transaksiKas)
                ->addColumn('kode_transaksi', function ($row) {
                    return 'TKD' . str_pad($row->id, 5, '0', STR_PAD_LEFT);
                })->addColumn('untuk_kas', function ($row) {
                    return $row->untuk_kas ? $row->untuk_kas->nama : '-';
                })->addColumn('jenis_akun', function ($row) {
                    return $row->jenis_akun ? $row->jenis_akun->jns_trans : '-';
                })->addColumn('jumlah', function ($row) {
                    return number_format($row->jumlah);
                })
                ->addColumn('action', 'admin.pemasukan-kas.include.action')
                ->toJson();
        }


        return view('admin.pemasukan-kas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisAkun = JenisAkun::where('pemasukan', 'Y')->where('aktif', 'Y')->get();
        $jenisKas = JenisKas::where('tmpl_pemasukan', 'Y')->where('aktif', 'Y')->get();

        return view('admin.pemasukan-kas.create', compact('jenisAkun', 'jenisKas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKasTransaksiRequest $request)
    {
        TransaksiKas::create($request->validated() + ([
            'akun' => 'Pemasukan',
            'untuk_kas_id' => $request->untuk_kas,
            'jns_trans' => $request->akun_id,
            'dk' => 'D'
        ]));

        return redirect()
            ->route('admin.pemasukan-kas.index')
            ->with('success', __('Pemasukan kas berhasil disimpan'));
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
