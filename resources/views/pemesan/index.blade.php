@extends('layouts.pemesan.pemesan_dashboard_app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
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
                
                <div class="text-center" >
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="../img/brilliant1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="../img/brilliant3.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="../img/brilliant4.jpg" alt="Third slide">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    <!-- <span class="avatar">
                        <img src="../img/brilliant1.jpg" >
                    </span><br> -->
                </div>
                <div class="row">
                  <div class="col-sm-3"> 
                          <div class="card">
                            <div class="card-header">
                              <br>
                                <div class="text-center">
                                    <span class="avatar">
                                        <img src="../img/sertifikat_icon.png" alt="image" width="50px" height="50px">
                                    </span>
                                </div><br>
                              <h4 class="text-center">
                                Lembaga Tersertifikasi
                              </h4>
                              <div class="card-tools">
                              
                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content p-0">
                                <p class="text-center">
                                 Briliant English Course adalah lembaga pendidikan bahasan inggris dengan sertifiakt resmi SK. Dikpora RI No. 421.9/050/418.47/2015 
                               </p>
                              </div>
                            </div><!-- /.card-body -->
                          </div>
                  </div>

                   <div class="col-sm-3"> 
                          <div class="card">
                            <div class="card-header"><br>
                                <div class="text-center">
                                    <span class="avatar">
                                        <img src="../img/building_icon.jpg" alt="image" width="50px" height="50px">
                                    </span>
                                </div><br>
                              <h4 class="text-center" >
                               
                                Fasilitas Lengkap & Terpadu
                              </h4>
                              <div class="card-tools">
                              
                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content p-0">
                                <p class="text-center">
                                  Kursus, Camp, Warung, Laundry, Toko-toko berada dalam satu area. Jadi kamu tidak perlu berjalan jauh untuk mendapatkan kebutuhan sehari-hari.
                               </p>
                              </div>
                            </div><!-- /.card-body -->
                          </div>
                  </div>

                   <div class="col-sm-3"> 
                          <div class="card">
                            <div class="card-header">
                              <br>
                                <div class="text-center">
                                    <span class="avatar">
                                        <img src="../img/camp_icon.png" alt="image" width="50px" height="50px">
                                    </span>
                                </div><br>
                              <h4 class="text-center">
                                Bisa Pilih Camp
                              </h4>
                              <div class="card-tools">
                              
                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content p-0">
                                <p class="text-center">
                                 Briliant Kampung Inggris punya tiga jenis tempat tinggal, Camp Reguler, Homestay, dan Camp VIP. Letak Camp Brilliant berada satu kawasan dengan Brilliant, jadi kamu tidak perlu jalan jauh bahkan rental sepeda lagi.
                               </p>
                              </div>
                            </div><!-- /.card-body -->
                          </div>
                  </div>

                   <div class="col-sm-3"> 
                          <div class="card">
                            <div class="card-header">
                              <br>
                                <div class="text-center">
                                    <span class="avatar">
                                        <img src="../img/money_icon.png" alt="image" width="50px" height="50px">
                                    </span>
                                </div><br>
                              <h4 class="text-center">
                                Bisa Panjar Dulu <br>
                              </h4>
                              <div class="card-tools">
                              
                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content p-0">
                                <p class="text-center">
                                 Untuk memastikan kamu terdaftar sebagai siswa baru Brilliant Pare, kamu hanya                    perlu membayar panjar (DP) setelah registrasi online. 
                               </p>
                              </div>
                            </div><!-- /.card-body -->
                          </div>
                  </div>
                  
                </div>

                <a href="{{ route('logout-pemesan') }}"> <button class="btn btn-danger">Logout</button></a>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
@endsection