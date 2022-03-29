@extends('index')
@section('konten')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Tambah Data Transaksi</h4>
                        </div>
                        <form action="{{route ('tambah-transaksi')}}" method="POST">
                          @csrf
                        <div class="card-body">
                          
                            <div class="row">
                              <div class="col-md-4">
                          <div class="form-group">
                            <label>Pilih Outlet :</label>
                            <br>
                            <select class="form-control col-md-6" name="id_outlet">
                            <option value="" selected>--Pilih--</option>  
                            @foreach ($outlet as $data)
                            <option value="{{$data->id_outlet}}">{{$data->nama_outlet}}</option>            
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
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                    <div class="form-group">
                      <label>Pilih User :</label>
                      <br>
                      <select class="form-control col-md-6" name="id_user">
                      <option value="" selected>--Pilih--</option>  
                      @foreach ($user as $data)
                      <option value="{{$data->id_user}}">{{$data->nama}}</option>            
                      @endforeach
                      </select>  
                      <label 
                      @error('id_user') 
                      class="text-danger"
                      @enderror>
                      @error('id_user')
                      {{$message}}
                      @enderror
                    </label>
                  </div>
                </div>
                        
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Pilih Member :</label>
                            <br>
                            <select class="form-control col-md-6" name="id_member">
                            <option value="" selected>--Pilih--</option>  
                            @foreach ($member as $data)
                            <option value="{{$data->id_member}}">{{$data->nama}}</option>            
                            @endforeach
                            </select>  
                            <label 
                            @error('id_member') 
                            class="text-danger"
                            @enderror>
                            @error('id_member')
                            {{$message}}
                            @enderror
                          </label>
                        </div>
                      </div>
                        
                      

                      <div class="form-group">
                        <label>Berat :</label>
                        <input type="number" min="1" class="form-control col-md-2" name="weight">
                        <label 
                        @error('qty') 
                        class="text-danger"
                        @enderror>
                        @error('weight')
                        {{$message}}
                        @enderror
                      </label>
                      </div>

                      <div class="form-group">
                        <label>Lama Pengerjaan :</label>
                        <input type="number" min="1" class="form-control col-md-2" name="lama_pengerjaan">
                        <label 
                        @error('qty') 
                        class="text-danger"
                        @enderror>
                        @error('lama_pengerjaan')
                        {{$message}}
                        @enderror
                      </label>
                      </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Transaksi :</label>
                            <input type="date" value="{{old('tgl')}}" class="form-control col-md-6" name="tgl">
                            <label 
                            @error('tgl') 
                            class="text-danger"
                            @enderror>
                            @error('tgl')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          </div>

                          <div class="col-md-4">
                          <div class="form-group">
                            <label>Batas Waktu :</label>
                            <input type="date" value="{{old('batas_waktu')}}" class="form-control col-md-6" name="batas_waktu">
                            <label 
                            @error('batas_waktu') 
                            class="text-danger"
                            @enderror>
                            @error('batas_waktu')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          </div>
                          
                          <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Bayar :</label>
                            <input type="date" value="{{old('tgl_bayar')}}"class="form-control col-md-6" name="tgl_bayar">
                            <label 
                            @error('tgl_bayar') 
                            class="text-danger"
                            @enderror>
                            @error('tgl_bayar')
                            {{$message}}
                            @enderror
                          </label>
                          </div>
                          </div>
                        </div>

                          <div class="form-group">
                            <label>Status :</label>
                            <br>
                            <select class="form-control col-md-2" name="status">
                            <option value="" selected>--Pilih--</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="diambil">Diambil</option>
                            </select> 
                            <label 
                            @error('status') 
                            class="text-danger"
                            @enderror>
                            @error('status')
                            {{$message}}
                            @enderror
                          </label>
                          </div>

                          <div class="form-group">
                            <label>Status Bayar :</label>
                            <br>
                            <select class="form-control col-md-2" name="dibayar">
                            <option value="" selected>--Pilih--</option>
                            <option value="dibayar">Dibayar</option>
                            <option value="belum_dibayar">Belum dibayar</option>
                            </select> 
                            <label 
                            @error('dibayar') 
                            class="text-danger"
                            @enderror>
                            @error('dibayar')
                            {{$message}}
                            @enderror
                          </label>
                          </div>

                          <button class="btn btn-primary" type="submit">Tambah</button>
                        
                  </div>
                        </form>
            </div>
         </div>

    </div>
@stop



@push('scripts')

@endpush