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
                
                <h1>Selamat Datang</h1><br>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaltambahlembaga">
                  Tambah Lembaga
                </button><br><br>

               <div class="row">
                @foreach($Daftarlembaga as $lembaga)
                  <div class="col-lg-3">
                    <div class="card" style="width: 15rem; background: #212F3D ">
                      <br>
                      <span class="avatar text-center">
                          <img src="#" alt="image" width="210px" height="210px" style="border-radius: 5%; background: white ">
                       </span>
                      <div class="card-body">
                        <div class="text-center">
                          <p><h5 style="font-weight: bold;color: white">{{$lembaga->nama_lembaga}}</h5></p>
                        </div>  
                          <h5 style="color: #3498DB; font-weight: bold">Alamat : {{$lembaga->alamat}}</h5>
                          <a href="{{route('superadmin-detaillembaga',$lembaga->id)}}" class="btn btn-primary">Detail</a>
                          <!-- <a href="{{route('superadmin-deletelembaga',$lembaga->id)}}" class="btn btn-danger">Hapus</a> -->
                          
                        </div>
                      </div>
                    </div>

                  @endforeach
               
              </div>
                 
                <a href="{{ route('logout-superadmin') }}"> <button class="btn btn-danger">Logout</button></a>
              </div><!-- /.card-body -->


                <div class="modal fade" id="modaltambahlembaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Lembaga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                      
                         <form method="post" action="{{url('superadmin-addlembaga')}}" enctype="multipart/form-data">
                           
                                   
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama_lembaga">Nama Lembaga</label>
                                <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" required=""/>
                            </div>

                           <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required=""/>
                            </div>

                             <button class="btn btn-primary" type="Submit">Tambah Lembaga</button>
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