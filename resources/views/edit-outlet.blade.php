 @extends('index')
{{--@section('konten')
<li class="menu-header">Dashboard</li>
<li ><a class="nav-link" href="{{route ('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Content</li>
@if (auth()->user()->role=="admin") 
<li class="active"><a class="nav-link" href="{{route ('tampil-outlet')}}"><i class="fas fa-home"></i> <span>Outlet</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-paket')}}"><i class="fas fa-box"></i> <span>Paket Laundry</span></a></li>
@endif
<li ><a class="nav-link" href="{{route ('tampil-member')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-transaksi')}}"><i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span></a></li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-user')}}"><i class="fas fa-user-tie"></i> <span>Data User</span></a></li>
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
                          <h4>Edit Data Outlet</h4>
                        </div>
                        <form action="{{route ('edit-outlet',$outlet->id_outlet)}}" method="POST">
                          @csrf
                          @method('put')
                        <div class="card-body">
                          
                          <div class="form-group">
                            
                            <label>Nama Outlet :</label>
                            <input type="text" name="nama_outlet" 

                            @if (old('nama'))
                            value="{{old('nama')}}" 
                            @else
                            value="{{$outlet->nama_outlet}}" 
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
                          
                         
                          
                          <button class="btn btn-primary" type="submit">Simpan</button>                        
                        </form>
                  </div>
            </div>
         </div>

    </div>
@stop



@push('scripts')

@endpush