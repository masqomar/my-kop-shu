@extends('layouts.app')
@section('title','Data Anggota')
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
                    <div class="card-header bg-navy" >
                        <h3 class="card-title"><b style="font-size: 30px" class="mr-1">D</b>ATA ANGGOTA </h3>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.data-anggota.create') }}" class="btn btn-primary sm-3">
                                <i class="fas fa-plus"></i>
                                {{ __('Tambah') }}
                            </a>
                        </div>
                        <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Avatar') }}</th>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Nama') }}</th>
                                        <th>{{ __('No Anggota') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Status') }}</th>
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
<style>
    img {
  border-radius: 50%;
}
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.data-anggota.index') }}",
        columns: [
            {
                data: 'avatar',
                name: 'avatar',
                orderable: false,
                searchable: false,
                render: function(data, type, full, meta) {
                    return `<div class="avatar">
                            <img src="${data}" alt="avatar" height="50" width="50">
                        </div>`;
                }
            },
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'first_name',
                name: 'first_name'
            },
            {
                data: 'member_id',
                name: 'member_id'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'status',
                name: 'status'
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