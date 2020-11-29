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
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tambah Data Peminjaman Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 215px;">Nama Peminjam</span>
                        </div>
                        <input type="text" class="form-control" name="nama_peminjam" placeholder="Nama Peminjam" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 215px;">Judul Buku</span>
                        </div>
                        <select name="id_buku" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            @foreach ($buku as $buku)
                                <option value="{{ $buku->id_buku }}">{{ $buku->judul }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 215px;">Tanggal Peminjaman</span>
                        </div>
                        <input type="date" class="form-control" name="tanggal_peminjaman" placeholder="Tanggal Peminjaman" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 215px;">Jatuh Tempo Pengembalian</span>
                        </div>
                        <input type="date" class="form-control" name="jatuh_tempo_pengembalian" placeholder="Jatuh Tempo Pengembalian" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Simpan Data Peminjaman</button>
                      </div>
                    </div>
                  </form>
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