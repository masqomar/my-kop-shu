<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopupBulananRequest;
use App\Models\User;
use App\Models\UserTopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VoucherBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $topup = UserTopup::with('user:id,first_name,member_id')->where('note', 'Voucher Bulanan');

            return DataTables::of($topup)
                ->addColumn('note', function ($row) {
                    return str($row->note)->limit(100);
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name .  ' - '  . $row->user->member_id : '';
                })->addColumn('amount', function ($row) {
                    return 'Rp. ' . number_format($row->amount);
                })
                ->toJson();
        }
        return view('admin.voucher-bulanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', 1)->get();

        return view('admin.voucher-bulanan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopupBulananRequest $request)
    {
        $request->validated();
        DB::transaction(function () use ($request) {
            $id = $request->user_id;
            for ($i = 0; $i < count($id); $i++) {
                UserTopup::create([
                    'user_id' => $id[$i],
                    'amount'    => $request->amount,
                    'date'      => now(),
                    'note' => 'Voucher Bulanan',
                    'status' => 'Sukses',
                ]);

                $user = User::where('id', $id[$i])->first();
                $pengguna = $user->deposit($request->amount, ['description' => 'Voucher Bulanan']);

                // activity()->log('Topup saldo jimpay ' . $request->note . ' ke ' . $user->member_id . ' ' . $user->first_name);
            }
        });



        return redirect()
            ->route('admin.voucher-bulanan.index')
            ->with('success', __('Topup voucher bulanan berhasil disimpan'));
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
