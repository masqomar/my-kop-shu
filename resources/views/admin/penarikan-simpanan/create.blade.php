@extends('layouts.app')

@section('title', __('Penarikan Simpanan'))

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-navy">
                        <h3 class="card-title"><b style="font-size: 30px" class="mr-1">P</b>ENARIKAN SIMPANAN ANGGOTA </h3><br>
                        <hr class="mt-3 mb-0" style="border: 1px solid #fff">
                    </div>
                    <form action="{{ route('admin.penarikan-simpanan.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="card-body">

                            <div class="form-group">
                                <label>{{ __('Tanggal') }}</label>
                                <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control @error('tgl_transaksi') is-invalid @enderror" required />
                                @error('tgl_transaksi')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Nama Anggota') }}</label>
                                <select class="chosen-select form-control @error('user_id') is-invalid @enderror" name="user_id[]" id="user-id" data-placeholder="Maksimal 10 orang ya...untuk 1x input" multiple required>
                                    @foreach ($users as $user)
                                    <option value="{!! $user['id'] !!}">
                                        {{ $user->member_id }} || {{ $user->first_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Jenis Simpanan') }}</label>
                                <select name="jenis_simpanan" class="form-control">
                                    @foreach ($jenisSimpanan as $simpanan)
                                    <option value="{{$simpanan->id}}">{{$simpanan->jns_simpan}}</option>
                                    @endforeach
                                </select>
                                @error('jenis_simpanan')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Jumlah Penarikan') }}</label>
                                <input type="number" name="jumlah_penarikan" id="jumlah_penarikan" class="form-control @error('jumlah_penarikan') is-invalid @enderror" required />
                                @error('jumlah_penarikan')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Keterangan') }}</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" />
                                @error('keterangan')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ambil Dari Kas</label>
                                <select name="dari_kas" class="form-control">
                                    @foreach ($jenisKas as $kas)
                                    <option value="{{$kas->id}}">{{$kas->nama}}</option>
                                    @endforeach
                                </select>
                                @error('dari_kas')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <input type="hidden" name="dk" value="K" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('styles')
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, anggota tidak ditemukan!"
    })
</script>
@endsection