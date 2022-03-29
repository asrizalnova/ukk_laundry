@extends('index')
{{-- @section('link') --}}
{{-- <li class="menu-header">Dashboard</li>
<li ><a class="nav-link" href="{{route ('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Content</li>
@if (auth()->user()->role=="admin")  
<li ><a class="nav-link" href="{{route ('tampil-outlet')}}"><i class="fas fa-home"></i> <span>Outlet</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-paket')}}"><i class="fas fa-box"></i> <span>Paket Laundry</span></a></li>
@endif
<li class="active"><a class="nav-link" href="{{route ('tampil-member')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-transaksi')}}"><i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span></a></li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-user')}}"><i class="fas fa-user-tie"></i> <span>Data Pengurus</span></a></li>
@endif
@stop --}}
@section('konten')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Tambah Data Member</h4>
                        </div>
                        <form action="{{route ('tambah-member')}}" method="POST">
                          @csrf
                        <div class="card-body">
                          
                          <div class="form-group">
                            <label>Nama Member :</label>
                            <input type="text" name="nama"value="{{old('nama')}}" class="form-control">
                            
                            <label 
                            @error('nama') 
                            class="text-danger"
                            @enderror>
                            @error('nama')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          
                          <div class="form-group">
                            <label>Alamat :</label>
                            <input name="alamat"value="{{old('alamat')}}" class="form-control" >
                            
                            <label 
                            @error('alamat') 
                            class="text-danger"
                            @enderror>
                            @error('alamat')
                            {{$message}}
                            @enderror
                          </label>
                          </div>

                          <div class="form-group">
                            <label>Jenis Kelamin :</label> 
                            <br>
                            <select class="form-control col-md-2" name="jenis_kelamin">
                            <option value="" selected>--Pilih--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                            </select>  
                            
                            <label 
                            @error('jenis_kelamin') 
                            class="text-danger"
                            @enderror>
                            @error('jenis_kelamin')
                            {{$message}}
                            @enderror
                          </label>
                          </div>

                          <div class="form-group">
                            <label>Nomor Telepon :</label>
                            <input type="number" name="tlp" value="{{old('tlp')}}"class="form-control">
                            
                            <label 
                            @error('tlp') 
                            class="text-danger"
                            @enderror>
                            @error('tlp')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          
                          <button class="btn btn-primary" type="submit">Tambah</button>
                        
                        </form>
                  </div>
            </div>
         </div>

    </div>
@stop



@push('scripts')

@endpush