@extends('layouts.admin')

@section('title')
    Data Dosen Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Dosen</h1>
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
                  <h3 class="card-title">Tambah Data Dosen Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('dosen.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">NIP</span>
                        </div>
                        <input type="text" class="form-control" name="NIP" placeholder="NIP" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">Nama Dosen</span>
                        </div>
                        <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">Email</span>
                        </div>
                        <input type="email" class="form-control" name="email_dosen" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">Alamat</span>
                        </div>
                        <input type="text" class="form-control" name="alamat_dosen" placeholder="Alamat" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">Nomor Telfon</span>
                        </div>
                        <input type="number" class="form-control" name="no_telp_dosen" placeholder="Nomor Telfon" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1" style="width: 140px;">Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Simpan Data Dosen</button>
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