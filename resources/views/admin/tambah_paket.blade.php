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
                
                <h1>TAMBAH PAKET</h1>

               
                
                <div class="row">
                <div class="col-lg-6">
                 
                <form method="post" action="{{url('paket-addpaket')}}" enctype="multipart/form-data">
                           
                                   
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Nama Paket</label>
                                <input type="text" class="form-control" id="nama_paket" name="nama_paket" required=""/>
                            </div>

                           <div class="form-group">
                                <label for="jenis_paket">jenis paket</label>
                                <input type="text" class="form-control" id="jenis_paket" name="jenis_paket" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="durasi_paket">durasi paket (Bulan)</label>
                                <input type="text" class="form-control" id="durasi_paket" name="durasi_paket" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="biaya_paket">biaya paket (Rp)</label>
                                <input type="text" class="form-control" id="biaya_paket" name="biaya_paket" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" required=""/>
                            </div>

                            <div class="form-group">
                              <label for="image">Gambar</label>
                              <input type="file" class="form-control" id="image" name="image"  required="" />
                          </div> 
                  </div>


                  <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fasilitas1">Fasilitas 1</label>
                                <input type="text" class="form-control" id="fasilitas1" name="fasilitas1" required="" placeholder="Opsional" />
                            </div>

                             <div class="form-group">
                                <label for="fasilitas2">Fasilitas 2</label> 
                                <input type="text" class="form-control" id="fasilitas2" name="fasilitas2" required="" placeholder="Opsional"/>
                            </div>

                             <div class="form-group">
                                <label for="fasilitas3">Fasilitas 3</label>
                                <input type="text" class="form-control" id="fasilitas3" name="fasilitas3" required="" placeholder="Opsional"/>
                            </div>

                             <div class="form-group">
                                <label for="fasilitas4">Fasilitas 4</label>
                                <input type="text" class="form-control" id="fasilitas4" name="fasilitas4" required="" placeholder="Opsional"/>
                            </div>

                             <div class="form-group">
                                <label for="fasilitas5">Fasilitas 5</label>
                                <input type="text" class="form-control" id="fasilitas5" name="fasilitas5" required="" placeholder="Opsional"/>
                            </div>
                             <div class="form-group">
                                <label for="fasilitas6">Fasilitas 6</label>
                                <input type="text" class="form-control" id="fasilitas6" name="fasilitas6" required="" placeholder="Opsional"/>
                            </div>

                            <div class="form-group">
                              <input type="hidden" class="form-control" id="id_lembaga" name="id_lembaga" value="{{ Auth::user()->id_lembaga }}" />
                            </div>

                            @foreach($Dataadmin as $admin)
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="{{ $admin->id }}" />
                            </div>
                            @endforeach
                  </div>     
                            @include('sweet::alert')

                          <button class="btn btn-primary" type="Submit">Tambah Paket</button>
                    
                      

                </form>
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