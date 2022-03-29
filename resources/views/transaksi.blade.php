@extends('index')
@section('konten')
<div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
      <ol>
      </ol>
    </nav>
  </div>
  <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           
            <a href="{{route ('tambah-transaksi')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            
            <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fas fa-clipboard-list"></i> Export Data</a>
            <hr>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id Transaksi</th>
        <th scope="col">Id Member</th>
        <th scope="col">Id User</th>
        <th scope="col">Batas Waktu</th>
        <th scope="col">Tgl Bayar</th>
        <th scope="col">Status</th>
        <th scope="col">Dibayar</th>
      </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $data)
      <tr>
        <td>{{$data->id_transaksi}}</td>
        <td>{{$data->id_member}}</td>
        <td>{{$data->id_user}}</td>
        <td>{{$data->batas_waktu}}</td>
        <td>{{$data->tgl_bayar}}</td>
        <td>{{$data->status}}</td>
        <td>{{$data->dibayar}}</td>



        {{-- <td>
          <div class="column">
            <a href="{{ route('edit-transaksi', $transaksi->id_transaksi) }}" class="btn btn-success btn-sm">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('hapus-transaksi', $transaksi->id_transaksi) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </form>
    </div>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- End Table with stripped rows -->

@stop