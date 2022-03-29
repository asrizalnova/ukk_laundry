@extends('index')
@section('konten')
<div class="pagetitle">
    <h1>Data User</h1>
    <nav>
      <ol>
      </ol>
    </nav>
  </div>
  <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route ('tambah-user')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            <hr>
            
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id Outlet</th>
                  <th scope="col">Nama Outlet</th>          
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Role</th>
                </tr>
              </thead>
    </thead>
    <tbody>
        @foreach($data as $user)

      <tr>
        <td>{{$user->id_outlet}}</td>
        <td>{{$user->outlet->nama_outlet}}</td>
        <td>{{$user->nama}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->role}}</td>

        <td>
          <div class="column">
            <a href="{{ route('edit-user', $user->id) }}" class="btn btn-success btn-sm">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('hapus-user', $user->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
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