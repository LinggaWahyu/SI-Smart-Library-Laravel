@extends('layouts.admin')

@section('title')
    Laporan Peminjaman Smart Library
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Laporan Peminjaman Perpustakaan</h1>
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
                  <h3 class="card-title">Laporan Peminjaman Smart Library</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <form role="form" action="{{ route('laporan-peminjaman-bulan') }}" method="POST" class="mb-5">
                        @csrf
                        <div class="form-group" style="float: left;">
                          <label>Bulan</label>
                          <select class="custom-select form-control" name="bulan">
                            @for ($i = 1; $i <= 12; $i++)
                                @php
                                    $dateObj   = DateTime::createFromFormat('!m', $i);
                                    $monthName = $dateObj->format('F');

                                    $dateObjSelected = DateTime::createFromFormat('!m', $bulan);
                                    $monthNameSelected = $dateObjSelected->format('F');
                                @endphp
                                @if ($bulan == $i)
                                  <option value="{{ $i }}" selected>{{ $monthName }}</option>
                                @else
                                  <option value="{{ $i }}">{{ $monthName }}</option> 
                                @endif
                                
                            @endfor
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary ml-4" style="margin-top: 31px">Pilih</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="crudTable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nama Peminjaman</th>
                      <th>Judul Buku</th>
                      <th>Tanggal Peminjaman</th>
                      <th>Tanggal Jatuh Tempo Pengembalian</th>
                      <th>Status</th>
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
    <script src="{{url('Admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{url('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
    <script>
      var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        dom: '<"html5buttons">Bfrtip',
        language: {
                buttons: {
                    colvis : 'Show / Hide', // label button show / hide
                    colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
                }
        },
        buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend:'csv'},
                    {extend: 'pdf', title:'Laporan Peminjaman Smart Library Bulan {{ $monthNameSelected }}'},
                    {extend: 'excel', title: 'Laporan Peminjaman Smart Library Bulan {{ $monthNameSelected }}'},
                    {extend:'print',title: 'Laporan Peminjaman Smart Library Bulan {{ $monthNameSelected }}'},
        ],
        ajax: {
          url: '{!! url()->current() !!}',
        },
        columns: [
          { data: 'nama_peminjam', name: 'nama_peminjam' },
          { data: 'buku.judul', name: 'buku.judul' },
          { data: 'tanggal_peminjaman', name: 'tanggal_peminjaman' },
          { data: 'jatuh_tempo_pengembalian', name: 'jatuh_tempo_pengembalian' },
          { data: 'status', name: 'status', width: '12%' },
        ]
      })
    </script>
@endpush