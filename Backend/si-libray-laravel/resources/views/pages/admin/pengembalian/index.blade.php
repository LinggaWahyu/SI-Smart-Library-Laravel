@extends('layouts.admin')

@section('title')
    Data Pengembalian Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Pengembalian</h1>
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
                  <h3 class="card-title">Data Pengembalian Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="crudTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID Peminjaman</th>
                      <th>Nama Anggota</th>
                      <th>Judul Buku</th>
                      <th>Tanggal Pengembalian</th>
                      <th>Status</th>
                      <th>Denda</th>
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
          { data: 'id_peminjaman', name: 'id_peminjaman' },
          { data: 'peminjaman.nama_peminjam', name: 'peminjaman.nama_peminjam' },
          { data: 'peminjaman.id_buku', name: 'peminjaman.id_buku' },
          { data: 'tanggal_pengembalian', name: 'tanggal_pengembalian' },
          { data: 'status', name: 'status', width: '10%' },
          { data: 'denda', name: 'denda',  width: '12%' },
        ]
      })
    </script>
@endpush