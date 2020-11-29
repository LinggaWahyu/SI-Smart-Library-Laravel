@extends('layouts.app')

@section('title')
    Smart Library Home Page
@endsection

@section('content')
  <section class="page-content">
    <div class="page-home">
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 justify-content-center text-center">
              <div class="header-title">
                <h2><b>Smart Library</b></h2>
                <h5>UIN Maulana Malik Ibrahim Malang</h5>
                <br />
                <p>
                  "Kalau engkau ingin menjadi penulis, ada dua hal yang harus
                  kau lakukan, banyak membaca dan menulis. Setahuku, tidak ada
                  jalan lain selain dua hal ini. Dan tidak ada jalan pintas."
                  - Stephen King
                </p>
              </div>
              <a href="{{ route('login') }}"
                ><div class="btn btn-primary mt-4">Get Started</div></a
              >
            </div>
            <div class="col-lg-6 justify-content-center text-center">
              <img
                src="/SI-Library/images/header.png"
                alt="Header Image"
                width="500px"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection