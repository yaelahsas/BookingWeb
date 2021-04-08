@extends('layouts.super-admin.superadmin_kelola_lembaga_app')

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
                
                <h1>Detail Lembaga</h1>

                
                <div class="row">
                  <div class="col-lg-6">
                    @foreach($Detaillembaga as $detail)
                    <table class="table table-striped">
                        <tr>
                          <th>Nama Lembaga</th>
                          <td>{{$detail->nama_lembaga}}</td>
                        </tr>

                         <tr>
                          <th>Alamat Lembaga</th>
                          <td>{{$detail->alamat}}</td>
                        </tr>
                    </table>
                    @endforeach
                  </div>

                  <div class="col-lg-6">
                     
                    <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Nama Admin</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>

                     @php
                          $no = 1;
                      @endphp
                    @foreach($Dataadmin as $admin)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$admin->name}}</td>
                          <td>{{$admin->status}}</td>
                          <td>
                            <button class="btn btn-primary">Ubah Status</button>
                          </td>
                        </tr>
                    @endforeach
                    </table>
                  </div>
                </div>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaltambahadmin">
                  Tambah User Admin
                </button>
                
              </div><!-- /.card-body -->

             
                

                <!-- Modal -->
                <div class="modal fade" id="modaltambahadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <!-- input data admin di tabel user -->
                         <form method="post" action="{{url('superadmin-tambahadmin')}}" enctype="multipart/form-data">
                              
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Nama Admin</label>
                                <input type="text" class="form-control" id="name" name="name" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required=""/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required=""/>
                            </div>

                            @foreach($Detaillembaga as $detail)
                             <div class="form-group">
                              <input type="hidden" class="form-control" id="id_lembaga" name="id_lembaga" value="{{ $detail->id}}" />
                            </div>
                            @endforeach

                             <button class="btn btn-primary" type="Submit">Tambah Admin</button>
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