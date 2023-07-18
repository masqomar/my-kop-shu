<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\anggotaRequest;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DataAnggotaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:data anggota view')->only('index', 'show');
    //     $this->middleware('permission:data anggota create')->only('create', 'store');
    //     $this->middleware('permission:data anggota edit')->only('edit', 'update');
    //     $this->middleware('permission:data anggota delete')->only('destroy');
    // }
    
    protected $avatarPath = '/uploads/images/avatars/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('type', 'user');

            return Datatables::of($users)
                ->addColumn('avatar', function ($row) {
                    if ($row->avatar == null) {
                        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($row->email))) . '&s=500';
                    }
                    return asset($this->avatarPath . $row->avatar);
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Aktif';
                    }
                    return 'Tidak Aktif';
                })

                ->addColumn('action', 'admin.data-anggota.include.action')
                ->toJson();
        }

        return view('admin.data-anggota.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(anggotaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $attr = $request->validated() + (['country_code' => '62', 'type' => 'user']);
            $attr['password'] = bcrypt($request->password);

            $anggotaId = User::insert($attr);

            Anggota::create([
                'nama'  => $request->first_name,
                'identitas' => $request->member_id,
                'jk' => 'L',
                'tmp_lahir' => 'Kediri',
                'tgl_lahir' => now(),
                'status' => 'Single',
                'agama' => 'Islam',
                'departement' => 'LC',
                'pekerjaan' => 'Karyawan',
                'alamat' => 'Kediri',
                'kota' => 'Kediri',
                'notelp' => $request->mobile,
                'tgl_daftar' => now(),
                'jabatan_id' => 2,
                'aktif' => 'Y',
                'file_pic' => ''
            ]);
        });

        return redirect()
            ->route('admin.data-anggota.index')
            ->with('success', __('Anggota baru berhasil disimpan'));
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
