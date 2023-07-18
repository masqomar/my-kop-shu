<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisBarangRequest;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataBarangController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $jenisBarang = JenisBarang::query();

            return DataTables::of($jenisBarang)
                ->addColumn('harga', function ($row) {
                    return 'Rp.' . number_format($row->harga);
                })->addColumn('type', function ($row) {
                    return $row->type ? $row->type : '-';
                })->addColumn('merk', function ($row) {
                    return $row->merk ? $row->merk : '-';
                })->addColumn('ket', function ($row) {
                    return $row->ket ? $row->ket : '-';
                })->addColumn('action', 'admin.data-barang.include.action')
                ->toJson();
        }

        return view('admin.data-barang.index');
    }

    public function create()
    {
        return view('admin.data-barang.create');
    }

    public function store(JenisBarangRequest $request)
    {
        JenisBarang::create($request->validated());

        return redirect()
            ->route('admin.data-barang.index')
            ->with('success', __('Data barang berhasil disimpan'));
    }
}
