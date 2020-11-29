@extends('layouts.admin')

@section('title')
    Data Mahasiswa Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Mahasiswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 mt-3 text-right">
              <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
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
                  <h3 class="card-title">Data Mahasiswa Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="crudTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                      <th>Alamat</th>
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
          { data: 'NIM', name: 'NIM' },
          { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
          { data: 'email_mahasiswa', name: 'email_mahasiswa' },
          { data: 'jurusan.nama_jurusan', name: 'jurusan.nama_jurusan' },
          { data: 'alamat_mahasiswa', name: 'alamat_mahasiswa' },
          { data: 'no_telp_mahasiswa', name: 'no_telp_mahasiswa' },
          { data: 'action', name: 'action', orderable: false, searchable: false, width: '10%' },
        ]
      })
    </script>
@endpush