@extends('layouts.admin.admin_kelola_paket_app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- /.content-header -->

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
                
                <h1>KELOLA PAKET</h1>

                <a href="{{ route('paket-tambahpaket') }}"><button class="btn btn-success">Tambah Paket</button></a><br><br>

                <div class="row">
                @foreach($Daftarpaket as $paket)
                  <div class="col-lg-3">
                    <div class="card" style="width: 15rem; background: #212F3D ">
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
                          <a href="{{route('paket-editpaket',$paket->id)}}" class="btn btn-primary">Update</a>
                          <a href="{{route('paket-deletepaket',$paket->id)}}" class="btn btn-danger">Hapus Paket</a>
                        </div>
                      </div>
                    </div>

                  @endforeach
               
              </div>

                <a href="{{ route('logout-admin') }}"> <button class="btn btn-danger">Logout</button></a>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
 @endsection