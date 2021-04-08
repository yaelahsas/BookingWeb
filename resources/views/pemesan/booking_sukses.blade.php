@extends('layouts.pemesan.pemesan_status_booking_app')

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
                
                <h1>Booking Sukses</h1>
               
                
                @foreach($statusbooking as $status)
                 <a href="#"> <button class="btn btn-success">Cetak PDF</button></a>
                <div class="row">
                  <div class="col-lg-4">
                      <div class="card-body text-center">
                         <h4>Kode Booking</h4>
                         <h1>{{$status->kode_booking}}</h1>
                      </div><br>
                  </div>

                   <div class="col-lg-8">
                      <div class="card-body">
                         <h4>Data Pemesan</h4>
                            <table class="table table-striped"> 
                                <tr>
                                  <th>Nama</th>
                                  <th>:</th>
                                  <td>{{$status->infopemesan->name}}</td>
                                </tr> 

                                <tr>
                                  <th>Alamat</th>
                                  <th>:</th>
                                  <td>{{$status->infopemesan->alamat}}</td>
                                </tr> 

                                <tr>
                                  <th>Nomor Hp</th>
                                  <th>:</th>
                                  <td>{{$status->infopemesan->nohp}}</td>
                                </tr> 

                                <tr>
                                  <th>Jenis Kelamin</th>
                                  <th>:</th>
                                  <td>{{$status->infopemesan->jenis_kelamin}}</td>
                                </tr> 

                                <tr>
                                  <th>Pendidikan</th>
                                  <th>:</th>
                                  <td>{{$status->infopemesan->pendidikan}}</td>
                                </tr> 

                                <tr>
                                  <th>Tanggal Booking</th>
                                  <th>:</th>
                                  <td>{{$status->tanggal_booking}}</td>
                                </tr> 

                            </table>
                      </div><br>
                  </div>
                </div>


                <h4>Data Paket Belajar</h4>
                <div class="row">
                  <div class="col-lg-1"></div>

                      <div class="col-lg-2">
                          <div class="card-body text-center">
                             <table class="table table-striped">
                               <tr>
                                 <th>Nama Paket</th>
                               </tr>
                               <tr>
                                 <td>{{$status->Paket->nama_paket}}</td>
                               </tr>
                             </table>
                          </div><br>
                      </div>

                       <div class="col-lg-2">
                          <div class="card-body text-center">
                             <table class="table table-striped">
                               <tr>
                                 <th>Durasi Paket</th>
                               </tr>
                               <tr>
                                 <td>{{$status->Paket->durasi_paket}}</td>
                               </tr>
                             </table>
                          </div><br>
                      </div>

                       <div class="col-lg-2">
                          <div class="card-body text-center">
                             <table class="table table-striped">
                               <tr>
                                 <th>Periode</th>
                               </tr>
                               <tr>
                                 <td>{{$status->periode_booking}}</td>
                               </tr>
                             </table>
                          </div><br>
                      </div>

                       <div class="col-lg-2">
                          <div class="card-body text-center">
                             <table class="table table-striped">
                               <tr>
                                 <th>Biaya Paket</th>
                               </tr>
                               <tr>
                                 <td>{{$status->Paket->biaya_paket}}</td>
                               </tr>
                             </table>
                          </div><br>
                      </div>

                       <div class="col-lg-2">
                          <div class="card-body text-center">
                             <table class="table table-striped">
                               <tr>
                                 <th>Status Booking</th>
                               </tr>
                               <tr>
                                 <td>{{$status->status_booking}}</td>
                               </tr>
                             </table>
                          </div><br>
                      </div>

                  <div class="col-lg-1"></div>    
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