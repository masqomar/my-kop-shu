<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKasPengeluaranRequest;
use App\Http\Requests\StoreKasTransaksiRequest;
use App\Models\JenisAkun;
use App\Models\JenisKas;
use App\Models\TransaksiKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PengeluaranKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transaksiKas = TransaksiKas::with('dari_kas', 'untuk_kas', 'jenis_akun')->where('akun', 'Pengeluaran')->orderBy('id', 'DESC');

            return DataTables::of($transaksiKas)
                ->addColumn('kode_transaksi', function ($row) {
                    return 'TKK' . str_pad($row->id, 5, '0', STR_PAD_LEFT);
                })->addColumn('dari_kas', function ($row) {
                    return $row->dari_kas ? $row->dari_kas->nama : '-';
                })->addColumn('jenis_akun', function ($row) {
                    return $row->jenis_akun ? $row->jenis_akun->jns_trans : '-';
                })->addColumn('jumlah', function ($row) {
                    return number_format($row->jumlah);
                })
                ->addColumn('action', 'admin.pengeluaran-kas.include.action')
                ->toJson();
        }

        return view('admin.pengeluaran-kas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisAkun = JenisAkun::where('pengeluaran', 'Y')->where('aktif', 'Y')->get();
        $jenisKas = JenisKas::where('tmpl_pengeluaran', 'Y')->where('aktif', 'Y')->get();

        return view('admin.pengeluaran-kas.create', compact('jenisAkun', 'jenisKas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKasPengeluaranRequest $request)
    {
        TransaksiKas::create($request->validated() + ([
            'akun' => 'Pengeluaran',
            'dari_kas_id' => $request->dari_kas,
            'jns_trans' => $request->akun_id,
            'dk' => 'K',
            'update_data' => now(),
            'user_name' => Auth::user()->first_name
        ]));

        return redirect()
            ->route('admin.pengeluaran-kas.index')
            ->with('success', __('Pengeluaran kas berhasil disimpan'));
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
