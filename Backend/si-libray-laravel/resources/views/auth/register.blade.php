@extends('layouts.auth')

@section('title')
    Register Smart Library
@endsection

@section('content')
  <section class="page-content">
    <div class="page-login">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-5">
            @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            <div class="login-card">
              <div class="card">
                <div class="card-body text-center">
                  <h4><b>Register Smart Library</b></h4>
                  <br />
                  <form class="text-left" action="{{ route('pengunjung-umum.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nomor_identitas"
                        >NIM / NIP / Nomor Identitas</label
                      >
                      <input type="text" class="form-control" name="nomor_identitas" value="{{ old('nomor_identitas') }}" />
                      <small id="nomor_identitas" class="form-text text-muted"
                        >Masukkan NIM atau NIP atau Nomor Identitas
                        anda.</small
                      >
                    </div>
                    <div class="form-group">
                      <label for="nama_pengunjung">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nama_pengunjung"
                        name="nama_pengunjung"
                        value="{{ old('nama_pengunjung') }}"
                      />
                    </div>
                    <div class="form-group">
                      <label for="email_pengunjung">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email_pengunjung"
                        name="email_pengunjung"
                        value="{{ old('email_pengunjung') }}"
                      />
                    </div>
                    <div class="form-group">
                      <label for="no_telp_pengunjung">Nomor Telepon</label>
                      <input
                        type="text"
                        class="form-control"
                        id="no_telp_pengunjung"
                        name="no_telp_pengunjung"
                        value="{{ old('no_telp_pengunjung') }}"
                      />
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                      />
                    </div>
                    <button
                      type="submit"
                      class="btn btn-primary btn-block mt-4"
                    >
                      Register
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-7 justify-content-center text-center">
            <img
              src="/SI-Library/images/register-image.png"
              alt="Login Imagae"
              width="500px"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
