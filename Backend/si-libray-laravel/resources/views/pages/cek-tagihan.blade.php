@extends('layouts.app')

@section('title')
    Smart Library Cek Tagihan
@endsection

@section('content')
<section class="page-content">
  <div class="page-home">
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              >
                <h3 style="padding-top: 10px">Data Tagihan Buku</h3>
              </nav>
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              >
                <p>
                  Silahkan Hubungi Petugas perpustakaan untuk Konfirmasi
                  Tagihan Buku Anda
                </p>
              </nav>
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              ></nav>
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              >
                <p><b>Nama Anggota : </b>{{ $user['nama'] }}</p>
              </nav>
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              >
                <p><b>Jurusan : </b>{{ $user['jurusan'] }}</p>
              </nav>
              <nav
                class="navbar navbar-light bg-light justify-content-between"
              >
                <p><b>Nomer Telepon : </b>{{ $user['no_telp'] }}</p>
              </nav>
              <!-- /.card-header -->
              <div class="card-body">
                <table
                  id="example2"
                  class="table table-bordered table-hover"
                >
                  <thead>
                    <tr>
                      <th>Nomor Buku</th>
                      <th>Judul</th>
                      <th>Penulis</th>
                      <th>Penerbit</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Jatuh Tempo</th>
                      <th width="10%">Denda</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($tagihan == null)
                        <tr>
                          <td colspan="7" class="text-center">Tidak Memiliki Tagihan Peminjaman Buku</td>
                        </tr>
                    @else
                      @foreach ($tagihan as $tagihan)
                        <tr>
                          <td>{{ $tagihan->buku->nomor_buku }}</td>
                          <td>{{ $tagihan->buku->judul }}</td>
                          <td>{{ $tagihan->buku->penulis }}</td>
                          <td>{{ $tagihan->buku->penerbit }}</td>
                          <td>{{ $tagihan->tanggal_peminjaman }}</td>
                          <td>{{ $tagihan->jatuh_tempo_pengembalian }}</td>
                          @php
                            $date_now = strtotime(date("Y-m-d"));
                            $date_tempo = strtotime($tagihan->jatuh_tempo_pengembalian);

                            $beda = $date_tempo - $date_now;

                            $denda = 0;

                            if($beda > 0)
                            {
                                $denda = 0;
                            } else {
                                $selisih_hari = date_diff(date_create($tagihan->jatuh_tempo_pengembalian), date_create())->days;
                                $denda = 500 * $selisih_hari;
                            }

                            $denda_cetak = number_format($denda, 0, ".", ".");
                          @endphp
                          <td>Rp. {{ $denda_cetak }},-</td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection