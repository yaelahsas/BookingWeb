@extends('layouts.pemesan.pemesan_lembaga_app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              
              <!-- Halaman lembaga menampilkan daftar paket dari lembaga yang dipilih -->

              <div class="card-body">
                @foreach($Namalembaga as $nama)
                    <h1>{{$nama->nama_lembaga}}</h1>
                @endforeach


                      <div class="row">
                      @foreach($Datapaket as $paket)
                      <div class="col-lg-3">
                          <div class="card" style="width: 15rem; background: #212F3D; border-radius: 3%">
                            <br>
                            <span class="avatar text-center">
                                <img src="{{asset('uploads/imagepaket/'.$paket->image)}}" alt="image" width="210px" height="210px" style="border-radius: 5%; background: white ">
                             </span>
                            <div class="card-body">
                              <div class="text-center">
                                <p><h5 style="font-weight: bold;color: white">{{$paket->nama_paket}}</h5></p>
                              </div>  
                                <h5 style="color: #3498DB; font-weight: bold">Rp.{{$paket->biaya_paket}},-</h5>
                                <h6 style="color: white">Stok paket : {{$paket->stok}}</h6>
                                <h6 style="color: white">Sold : {{$paket->sold}}</h6>
                                <a href="{{route('paket-detail',$paket->id)}}" class="btn btn-primary">Detail</a>
                              </div>
                            </div>
                      </div>

                        @endforeach   
                      </div>

                <a href="{{ route('logout-pemesan') }}"> <button class="btn btn-danger">Logout</button></a>
              </div><!-- /.card-body -->
            </div>
            
          </section>
        
  </div>
  @endsection
