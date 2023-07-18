<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenarikanSimpananRequest;
use App\Models\JenisKas;
use App\Models\JenisSimpanan;
use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PenarikanSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transaksiSimpanan = Simpanan::with('user')->where('dk', 'K');

            return DataTables::of($transaksiSimpanan)
                ->addColumn('kode_transaksi', function ($row) {
                    return 'TRK' . str_pad($row->id, 5, '0', STR_PAD_LEFT);
                })->addColumn('member_id', function ($row) {
                    return $row->user ? $row->user->member_id : '-';
                })->addColumn('first_name', function ($row) {
                    return $row->user ? $row->user->first_name : '-';
                })->addColumn('jenis_akun', function ($row) {
                    return $row->jenis_akun ? $row->jenis_akun->jns_trans : '-';
                })->addColumn('jumlah', function ($row) {
                    return number_format($row->jumlah);
                })
                ->addColumn('action', 'admin.penarikan-simpanan.include.action')
                ->toJson();
        }

        return view('admin.penarikan-simpanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', 1)->get();
        $jenisSimpanan = JenisSimpanan::where('tampil', 'Y')->get();
        $jenisKas = JenisKas::where('tmpl_penarikan', 'Y')->where('aktif', 'Y')->get();

        return view('admin.penarikan-simpanan.create', compact('users', 'jenisSimpanan', 'jenisKas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenarikanSimpananRequest $request)
    {
        $request->validated();
        DB::transaction(function () use ($request) {
            $id = $request->user_id;
            for ($i = 0; $i < count($id); $i++) {
                Simpanan::create([
                    'anggota_id' => $id[$i],
                    'tgl_transaksi'    => $request->tgl_transaksi,
                    'jumlah'    => $request->jumlah_penarikan,
                    'keterangan'    => $request->keterangan,
                    'kas_id'    => $request->dari_kas,
                    'jenis_id'    => $request->jenis_simpanan,
                    'akun' => 'Penarikan',
                    'dk' => 'K',
                ]);

                // activity()->log('Penarikan simpanan anggota ' . $request->keterangan . ' ke ' . $user->member_id . ' ' . $user->first_name);
            }
        });

        return redirect()
            ->route('admin.penarikan-simpanan.index')
            ->with('success', __('Penarikan simpanan berhasil disimpan'));
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
