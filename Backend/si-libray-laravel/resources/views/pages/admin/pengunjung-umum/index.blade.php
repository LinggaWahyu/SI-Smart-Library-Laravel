@extends('layouts.admin')

@section('title')
    Data Pengunjung Umum Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Pengunjung Umum</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 mt-3 text-right">
              <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('pengunjung-umum.create') }}">Tambah Pengunjung Umum</a>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pengunjung Umum Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="crudTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nomor Identitas</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No. Telp</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('addon-script')
    <script>
      var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '{!! url()->current() !!}',
        },
        columns: [
          { data: 'nomor_identitas', name: 'nomor_identitas' },
          { data: 'nama_pengunjung', name: 'nama_pengunjung' },
          { data: 'email_pengunjung', name: 'email_pengunjung' },
          { data: 'no_telp_pengunjung', name: 'no_telp_pengunjung' },
          { data: 'action', name: 'action', orderable: false, searchable: false, width: '10%' },
        ]
      })
    </script>
@endpush