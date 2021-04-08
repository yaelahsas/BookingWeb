@extends('layouts.pemesan.pemesan_booking_paket_app')

@section('content')


  <div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              
              <div class="card-body">
              
                @foreach($bookingpaket as $paket)
                <h1>{{$paket->Datalembaga->nama_lembaga}}</h1><!-- mengambil nama lembaga dari tabel lembaga -->
                <h1>Booking Paket Belajar {{$paket->nama_paket}}</h1><br>
                  <a href="{{route('paket-detail',$paket->id)}}"><button class="btn btn-danger">Kembali</button></a>
                @endforeach               

                      <div class="row">
                      <div class="col-lg-6"><br>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                            @foreach($Pemesan as $pem)
                            <tr>
                              <th>Nama </th>
                              <td>{{$pem->name}}</td>
                            </tr>    

                              <tr>
                              <th>Email</th>
                              <td>{{$pem->email}}</td>
                            </tr>  

                             <tr>
                              <th>Alamat </th>
                              <td>{{$pem->alamat}}</td>
                            </tr>         

                             <tr>
                              <th>Nomor HP</th>
                              <td>{{$pem->nohp}}</td>
                            </tr>    

                             
                             <tr>
                              <th>Jenis Kelamin</th>
                              <td>{{$pem->jenis_kelamin}}</td>
                            </tr>

                             <tr>
                              <th>Pendidikan</th>
                              <td>{{$pem->pendidikan}}</td>
                            </tr>    

                            @endforeach
                            </table>
                        </div><br>
                    </div>
              <div class="col-lg-6">
                <form method="post" action="{{route('paket-prosesbooking')}}" enctype="multipart/form-data">
                   
                                   
                        {{csrf_field()}}

                          @foreach($bookingpaket as $paket)
                            <div class="form-group">
                              <label>Paket Belajar</label>
                                <select  class="form-control">                                 
                                    <option>{{$paket->nama_paket}}</option>                                
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Durasi Paket</label>
                                <select  class="form-control">                            
                                    <option>{{$paket->durasi_paket}}</option>                                 
                              </select>
                            </div>

                          @endforeach

                            <div class="form-group">
                                 <label>Periode Booking</label>
                                <select name="periode_booking" class="form-control">
                                    <option>1 Bulan</option>
                                    <option>2 Bulan</option>
                                    <option>3 Bulan</option>
                                    <option>4 Bulan</option>
                                    <option>5 Bulan</option>

                                 
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_booking">Tanggal Booking</label>
                                <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required="" />
                            </div>


                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::user()->id }}" required=""/>
                            </div>

                           

                            @foreach($bookingpaket as $book)
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_paket" name="id_paket" value="{{$book->id }}" required="" />
                            </div>

                             <div class="form-group">
                                <input type="hidden" class="form-control" id="id_lembaga" name="id_lembaga" value="{{ $book->id_lembaga }}" required=""  />
                            </div>
                            @include('sweet::alert')

                         
                          <button class="btn btn-primary" type="Submit">Checkout</button>
                </form>
            </div>
                <br>
               
                  @endforeach
                </div>
              </div>

             
               
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
 @endsection