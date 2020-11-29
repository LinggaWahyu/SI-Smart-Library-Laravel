@extends('layouts.admin')

@section('title')
    Data Peminjaman Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Peminjaman</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 mt-3 text-right">
              <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('peminjaman.create') }}">Tambah Peminjaman</a>
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
                  <h3 class="card-title">Data Peminjaman Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="crudTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nama Peminjam</th>
                      <th>Judul Buku</th>
                      <th>Taggal Peminjaman</th>
                      <th>Jatuh Tempo Pengembalian</th>
                      <th>Status</th>
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
          { data: 'nama_peminjam', name: 'nama_peminjam' },
          { data: 'buku.judul', name: 'buku.judul' },
          { data: 'tanggal_peminjaman', name: 'tanggal_peminjaman' },
          { data: 'jatuh_tempo_pengembalian', name: 'jatuh_tempo_pengembalian' },
          { data: 'status', name: 'status', width: '12%' },
          { data: 'action', name: 'action', orderable: false, searchable: false, width: '12%' },
        ]
      })
    </script>
@endpush