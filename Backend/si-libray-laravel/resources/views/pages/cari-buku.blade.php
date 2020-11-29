@extends('layouts.app')

@section('title')
    Smart Library Cari Buku
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
                <h3 style="padding-top: 10px">Cari Buku</h3>
                <form class="form-inline" action="{{ route('cari-buku-keyword') }}" method="POST">
                  @csrf
                  <input
                    class="form-control mr-sm-2"
                    type="search"
                    name="keyword"
                    placeholder="Search"
                    aria-label="Search"
                    value="{{ $keyword }}"
                  />
                  <button
                    class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                  >
                    Search
                  </button>
                </form>
              </nav>
              <!-- /.card-header -->
              <div class="card-body">
                <table
                  class="table table-bordered table-hover"
                >
                  <thead>
                    <tr>
                      <th>Nomor Buku</th>
                      <th>Judul</th>
                      <th>Penulis</th>
                      <th>Penerbit</th>
                      <th>Stok</th>
                      <th>Kategori</th>
                      <th>Nomor Rak</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($books == null)
                        <tr>
                          <td colspan="7" class="text-center">Data buku tidak ditemukan</td>
                        </tr>
                    @else
                      @foreach ($books as $book)
                        <tr>
                          <td>{{ $book->nomor_buku }}</td>
                          <td>{{ $book->judul }}</td>
                          <td>{{ $book->penulis }}</td>
                          <td>{{ $book->penerbit }}</td>
                          <td>{{ $book->stok_buku }}</td>
                          <td>{{ $book->kategori->nama_kategori_buku }}</td>
                          <td>{{ $book->nomor_rak }}</td>
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