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
                  <h3 class="card-title">Tambah Data Mahasiswa Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>NIM</label>
                          <input type="text" name="NIM" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Mahasiswa</label>
                          <input type="text" name="nama_mahasiswa" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email_mahasiswa" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Jurusan</label>
                          <select name="id_jurusan" class="form-control">
                            @foreach ($jurusan as $jurusan)
                                <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="alamat_mahasiswa" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nomor Telepon</label>
                          <input type="number" name="no_telp_mahasiswa" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Simpan Data Mahasiswa</button>
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