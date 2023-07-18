@extends('layouts.app')
@section('title','Data Pengajuan Pinjaman')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-0">
            <div class="col-sm-6">
                <!-- <h4> Daftar Pengguna  </h4> -->
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif
                <div class="card ">
                    <div class="card-header bg-navy">
                        <h3 class="card-title"><b style="font-size: 30px" class="mr-1">D</b>ATA PENGAJUAN PINJAMAN </h3><br>
                        <hr class="mt-3 mb-0" style="border: 1px solid #fff">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('Id Ajuan') }}</th>
                                        <th>{{ __('Tanggal Pengajuan') }}</th>
                                        <th>{{ __('Nama Anggota') }}</th>
                                        <th>{{ __('Jenis') }}</th>
                                        <th>{{ __('Jumlah') }}</th>
                                        <th>{{ __('Tenor') }}</th>
                                        <th>{{ __('Keterangan') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Sisa Pinjaman') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengajuan as $pengajuan)
                                    <tr>
                                        <td align="center">{{$loop->iteration}}</td>
                                        <td align="center">{{$pengajuan->ajuan_id}}</td>
                                        <td align="center">{{date('j \\ F Y', strtotime($pengajuan->tgl_input))}}</td>
                                        <td>{{$pengajuan->user->member_id}}<br>{{$pengajuan->user->first_name}}</td>
                                        <td align="center">{{$pengajuan->jenis}}</td>
                                        <td align="center">Rp. {{number_format($pengajuan->nominal)}}</td>
                                        <td align="center">{{$pengajuan->lama_ags}} bulan</td>
                                        <td>{{$pengajuan->keterangan}}</td>
                                        <td align="center">{{$pengajuan->status}}</td>
                                        <td>
                                            @php
                                            $lamaJmlPinjam = App\Models\ViewPinjaman::where('anggota_id', $pengajuan->anggota_id)->sum('lama_angsuran');
                                            $blnSdh = App\Models\ViewPinjaman::where('anggota_id', $pengajuan->anggota_id)->sum('bln_sudah_angsur');
                                            $sisaJmlAngsuran = $lamaJmlPinjam - $blnSdh;
                                            $sisaJmlPinjam = App\Models\ViewPinjaman::where('anggota_id', $pengajuan->anggota_id)->where('lunas', 'Belum')->count();
                                            @endphp
                                            Sisa Jml Pinjaman : {{$sisaJmlPinjam}}<br>
                                            Sisa Jml Angsuran : {{$sisaJmlAngsuran}}<br>
                                            Sisa Tagihan : Rp. -
                                        </td>
                                        <td>act</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection