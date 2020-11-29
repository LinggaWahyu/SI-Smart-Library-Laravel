@extends('layouts.admin')

@section('title')
    Data Buku Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Buku</h1>
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
                  <h3 class="card-title">Tambah Data Buku Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('buku.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nomor Buku</label>
                          <input type="text" name="nomor_buku" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Judul</label>
                          <input type="text" name="judul" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Penulis</label>
                          <input type="text" name="penulis" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Penerbit</label>
                          <input type="text" name="penerbit" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Stok Buku</label>
                          <input type="number" name="stok_buku" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori Buku</label>
                          <select name="id_kategori_buku" class="form-control">
                            @foreach ($kategori_buku as $kategori)
                                <option value="{{ $kategori->id_kategori_buku }}">{{ $kategori->nama_kategori_buku }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nomor Rak</label>
                          <input type="text" name="nomor_rak" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Simpan Data Buku</button>
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