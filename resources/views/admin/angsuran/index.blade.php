@extends('layouts.app')
@section('title','Data Angsuran')
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
                    <div class="card-header bg-navy" >
                        <h3 class="card-title"><b style="font-size: 30px" class="mr-1">D</b>ATA ANGSURAN ANGGOTA </h3><br>
                        <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Kode') }}</th>
                                        <th>{{ __('Tanggal Pinjam') }}</th>
                                        <th>{{ __('Nama Anggota') }}</th>
                                        <th>{{ __('Pokok Pinjaman') }}</th>
                                        <th>{{ __('Tenor') }}</th>
                                        <th>{{ __('Angsuran Pokok') }}</th>
                                        <th>{{ __('Keuntungan') }}</th>
                                        <th>{{ __('Angsuran  Per Bulan') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.angsuran.index') }}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'kode_transaksi',
                name: 'kode_transaksi',
            },
            {
                data: 'tgl_pinjam',
                name: 'tgl_pinjam',
            },
            {
                data: 'user',
                name: 'user',
                orderable: true,
                searchable: true,
                render: function(data, type, full, meta) {
                    return `<div>
                    ${data.member_id}<br>${data.first_name}
                        </div>`;
                }
            },
            {
                data: 'pokok_pinjaman',
                name: 'pokok_pinjaman',
            },
            {
                data: 'lama_pinjaman',
                name: 'lama_pinjaman',
            },
            {
                data: 'angsuran_pokok',
                name: 'angsuran_pokok',
            },
            {
                data: 'margin',
                name: 'margin',
            },
            {
                data: 'angsuran_bulanan',
                name: 'angsuran_bulanan',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
    });
</script>
@endsection