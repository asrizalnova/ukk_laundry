@extends('index')
@section('konten')
<div class="pagetitle">
    <h1>Paket</h1>
    <nav>
      <ol>
      </ol>
    </nav>
  </div>
  <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route ('tambah-paket')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            <hr>
            {{-- message simpan data --}}
            @if (session('message-simpan'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{(session('message-simpan'))}}
              </div>
            </div>
            @endif
             {{-- message update data --}}
             @if (session('message-update'))
             <div class="alert alert-info alert-dismissible show fade">
               <div class="alert-body">
                 <button class="close" data-dismiss="alert">
                   <span>×</span>
                 </button>
                 {{(session('message-update'))}}
               </div>
             </div>
             @endif
           

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id Paket</th>
        <th scope="col">Jenis</th>
        <th scope="col">Harga</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($data as $paket)
        <td>{{$paket->id_paket}}</td>
        <td>{{$paket->jenis}}</td>
        <td>{{$paket->harga}}</td>
        <td>
          <div class="column">
            <a href="{{ route('edit-paket', $paket->id_paket) }}" class="btn btn-success btn-sm">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('hapus-paket', $paket->id_paket) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </form>
    </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- End Table with stripped rows -->

@stop