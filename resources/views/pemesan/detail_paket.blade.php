@extends('layouts.pemesan.pemesan_detail_paket_app')

@section('content')


  <div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          


        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              
              <div class="card-body">
                
                <h1>DETAIL PAKET</h1><br>

                  @foreach($detailpaket as $detail)
                    <div class="row">
                      <div class="col-lg-5">  
                        <div class="card">
                           <div class="card-body text-center" style="background: #212F3D; border-radius: 1.5%">

                              <span class="avatar text-center">
                                <img src="{{asset('uploads/imagepaket/'.$detail->image)}}" alt="image" width="260px" height="260px" style="border-radius: 5%; background: white ">
                              </span><br><br>
                              <h3 class="text-center" style="font-weight: bold; color: white">{{$detail->durasi_paket}}</h3>
                              <h3 class="text-center" style="font-weight: bold; color: white">Rp.{{$detail->biaya_paket}}</h3>
                             
                            </div>
                          </div>
                          <div class="card" style="background: #212F3D">
                            <div class="card-body" style="font-weight: bold; color: white"><h5>Kuota : {{$detail->stok}}</h5></div>
                          </div>
                        </div>

                         <div class="col-lg-5">  
                        <div class="card">
                           <div class="card-body" style="border-color: #212F3D; border-width: 2px;">
                              <h1 style="font-weight: bold">{{$detail->nama_paket}}</h1><br>
                              <h4>~ {{$detail->fasilitas1}}</h4>
                              <h4>~ {{$detail->fasilitas2}}</h4>
                              <h4>~ {{$detail->fasilitas3}}</h4>
                              <h4>~ {{$detail->fasilitas4}}</h4>
                              <h4>~ {{$detail->fasilitas5}}</h4>
                              <h4>~ {{$detail->fasilitas6}}</h4><br><br><br>
                              

                              <button onclick="goBack()" class="btn btn-danger">Kembali</button>
                              <a href="{{route('paket-booking',$detail->id)}}" class="btn btn-primary">Booking</a><br><br><br>

                              
                            </div>
                          </div>
                        </div>

                    @endforeach
                   
                  </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
 @endsection