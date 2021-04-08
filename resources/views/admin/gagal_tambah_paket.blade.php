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
                
              <h1>PROFIL ANDA BELUM LENGKAP, SILAKAN LENGKAPI PROFIL</h1><br>
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahprofiladmin">
                  Tambah Profil anda
                </button>

              </div><!-- /.card-body -->

               <!-- Modal -->
                <div class="modal fade" id="tambahprofiladmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                      
                         <form method="post" action="{{url('admin-tambah_profil')}}" enctype="multipart/form-data">
                           
                                   
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama_admin">Nama</label>
                                <input type="text" class="form-control" id="nama_admin" name="nama_admin" required="" value="{{ Auth::user()->name }}"/>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::user()->id }}"/>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_lembaga" name="id_lembaga" value="{{ Auth::user()->id_lembaga }}" />
                            </div>
                           
                             <button class="btn btn-primary" type="Submit">Tambah Profil</button>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                       
                      </div>
                    </div>
                  </div>
                </div>



            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
  @endsection