@extends('layouts.admin.admin_info_booking_app')

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
                
                <h1>INFORMASI BOOKING</h1>


                 <form action="{{url('admin_booking_cari')}}" method="GET">
                      <label> Cari Kode </label>
                      <div class="form-row">
                          <div class="col-sm-4">
                              <input type="text" class="form-control" name="carikode" placeholder="Masukkan Kode Booking" value="{{ old('carikode') }}">
                          </div>
                          <div class="col">
                              <input type="submit" class="btn btn-primary" value="CARI">
                          </div>
                      </div>
                  </form><br><br>

                @foreach($Infobooking as $info)
                <table class="table table-striped">
                  
                  <tr>
                    <th>Kode Booking</th>
                    <td>{{$info->kode_booking}}</td>
                  </tr>

                  <tr>
                    <th>Nama Pemesan</th>
                    <td>{{$info->infopemesan->name}}</td>
                  </tr>

                   <tr>
                    <th>Alamat</th>
                    <td>{{$info->infopemesan->alamat}}</td>
                  </tr>

                  <tr>
                    <th>Nomor Hp</th>
                    <td>{{$info->infopemesan->nohp}}</td>
                  </tr>

                  <tr>
                    <th>Paket</th>
                    <td>{{$info->Paket->nama_paket}}</td>
                  </tr>

                </table>
                <br><br>
                 
                @endforeach

                  

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