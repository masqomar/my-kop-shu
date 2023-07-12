@extends('layouts.app')
@section('title','Laporan Neraca Saldo')
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
                <div class="card ">
                    <div class="card-header bg-navy">
                        <h3 class="card-title"><b style="font-size: 30px" class="mr-1">L</b>APORAN NERACA SALDO </h3><br>
                        <hr class="mt-3 mb-0" style="border: 1px solid #fff">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ route('admin.laporan-neraca-saldo.filter') }}" method="get">
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label for="">Date From</label>
                                        <input type="date" name="dari_tanggal" class="form-control">
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="">Date From</label>
                                        <input type="date" name="sampai_tanggal" class="form-control">
                                    </div>
                                    <div class="col-md-2 form-group" style="margin-top:25px;">
                                        <input type="submit" class="btn btn-primary" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive p-1">
                            <table class="table table-striped" width="100%">
                                <tr>
                                    <th style="text-align:center; width:5%"> </th>
                                    <th style="text-align:center; width:55%"> Nama Akun</th>
                                    <th style="text-align:center; width:20%"> Debet </th>
                                    <th style="text-align:center; width:20%"> Kredit </th>
                                </tr>
                                <tr>
                                    <td> &nbsp; <i class="nav-icon fas fa-folder-open"></i> </td>
                                    <td><strong> A. Aktiva Lancar </strong></td>
                                </tr>
                                @foreach($semuaTransaksiDebet as $debet)
                                @foreach($semuaTransaksiKredit as $kredit)
                                @php
                                $total_debet = $debet->total_debet;
                                $total_kredit = $kredit->total_kredit;
                                $saldo = $total_debet - $total_kredit;
                                @endphp
                                @if ($debet->id == $kredit->id)
                                <tr>
                                    <td></td>
                                    <td>A{{ $loop->iteration }}. {{ $debet->nama }}</td>
                                    <td style="text-align: right;">@rupiah ( $saldo )</td>
                                    <td style="text-align: right;"> 0 </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach

                                @foreach($semuaAkunDebet as $akunDebet)
                                @foreach($semuaAkunKredit as $akunKredit)
                                @php
                                $akun_debet = $akunDebet->total_akun_debet;
                                $akun_kredit = $akunKredit->total_akun_kredit;
                                $totalAktiva = $akun_kredit - $akun_debet;
                                $totalPasiva = $akun_debet - $akun_kredit;
                                @endphp
                                @if ($akunDebet->id == $akunKredit->id)
                                <tr>
                                    @if (strlen($akunDebet->kd_aktiva) != 1)
                                    <td> &nbsp; </td>
                                    <td>{{$akunDebet->kd_aktiva}}. {{$akunDebet->jns_trans}}</td>
                                    @else
                                    <td class="text-center"> &nbsp; <i class="nav-icon fas fa-folder-open"></i> </td>
                                    <td> <strong>{{$akunDebet->kd_aktiva}}. {{$akunDebet->jns_trans}}</strong></td>
                                    @endif

                                    @if ($akunDebet->akun == 'Aktiva')
                                    <td style="text-align: right;">@rupiah ($totalAktiva)</td>
                                    <td style="text-align: right;">0</td>
                                    @endif


                                    @if ($akunDebet->akun == 'Pasiva')
                                    <td style="text-align: right;">0</td>
                                    <td style="text-align: right;">@rupiah ($totalPasiva)</td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach
                                @endforeach

                                <tr>
                                    <td colspan="2" style="text-align: center;"><strong> JUMLAH KUABEH</td>
                                    <td style="text-align: right;"><strong>Coba Tebak Berapa...!!!</strong></td>
                                    <td style="text-align: right;"><strong>Hayo....!</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection