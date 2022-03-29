@extends('index')
{{-- @section('link') 
<li class="menu-header">Dashboard</li>
<li class="active"><a class="nav-link" href="{{route ('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Content</li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-outlet')}}"><i class="fas fa-home"></i> <span>Outlet</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-paket')}}"><i class="fas fa-box"></i> <span>Paket Laundry</span></a></li>
@endif
<li ><a class="nav-link" href="{{route ('tampil-member')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-transaksi')}}"><i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span></a></li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-user')}}"><i class="fas fa-user-tie"></i> <span>Data Pengurus</span></a></li>
@endif

@stop --}}
@section('konten')
  <!-- Main Content -->
 

  <section class="section">
    <div class="section-header">
      

      <p class="section-lead">
        Edit Profile
      </p>
        
      <form action="{{route ('edit-user',$user->id)}}" method="POST">
        @csrf
        @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label>Pilih Outlet :</label>
                    <br>
                    <select class="form-control col-md-2" name="id_outlet">
                    {{-- <option value="" selected>--Pilih--</option>   --}}
                    @foreach ($outlet as $data)
                    <option value="{{$data->id_outlet}}"{{old('id_outlet',$user->id_outlet) == $data->id_outlet  ? "selected" : ''}}>{{$data->nama_outlet}}</option>    
                    @endforeach
                    </select>  
                    <label 
                    @error('id_outlet') 
                    class="text-danger"
                    @enderror>
                    @error('id_outlet')
                    {{$message}}
                    @enderror
                  </label>
                  </div>
                          
                
                          {{-- <div class="form-group">
                            <label>username :</label>
                            <input type="username" name="username" value="{{old('username')}}" class="form-control">
                            <label 
                            @error('username') 
                            class="text-danger"
                            @enderror>
                            @error('username')
                            {{$message}}
                            @enderror
                          </label>
                          </div> --}}

                          <div class="form-group">
                            <label>username :</label>
                            <input type="text" name="username" 

                            @if (old('username'))
                            value="{{old('username')}}" 
                            @else
                            value="{{$user->username}}" 
                            @endif
                            class="form-control">

                            <label 
                            @error('username') 
                            class="text-danger"
                            @enderror>
                            @error('username')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          
                          <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" name="nama" 

                            @if (old('nama'))
                            value="{{old('nama')}}" 
                            @else
                            value="{{$user->nama}}" 
                            @endif
                            class="form-control">

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
                            <label>Role :</label>
                            <br>
                            <select class="form-control col-md-2" name="role">
                            <option value="" selected>--Pilih--</option>
                            <option value="admin"{{ old('admin', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="kasir"{{ old('kasir', $user->role) == 'kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="owner"{{ old('owner', $user->role) == 'owner' ? 'selected' : '' }}>Owner</option>
                            
                            </select> 
                            <label
                            @error('role') 
                            class="text-danger"
                            @enderror>
                            @error('role')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                    <div class="card-footer text-left">
                      {{-- <a href="{{route('edit-user')}}" class="btn btn-primary">Back</a> --}}
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
@stop



@push('scripts')

@endpush