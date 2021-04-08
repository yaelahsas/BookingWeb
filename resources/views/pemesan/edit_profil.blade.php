@extends('layouts.pemesan.pemesan_profil_app')

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
                <div class="text-center">
                  <h1>PERBARUI PROFIL</h1>
                </div><br>

                <div class="col-lg-12">
                @foreach($userpemesan as $pem)
                <div class="row">
                  <div class="col-lg-4"></div>
                      <div class="col-lg-4 text-center">
                          <form method="post" action="{{url('updatefoto',$pem->id)}}" enctype="multipart/form-data">
                               {{csrf_field()}}
                               {{method_field('PUT')}}
                                 <span class="avatar">
                                          <img src="{{asset('uploads/fotoprofil/'.$pem->image)}}" alt="image" width="150px" height="150px" style="border-radius: 100%; border: 3px solid black ">
                                       </span><br><br>

                                      <div class="form-group">
                                          <label for="image"> Ganti Foto Profil</label>
                                          <input type="file" class="form-control" id="image" name="image" placeholder=" " required=""  />
                                      </div> 

                                      <button class="btn btn-primary">Ganti Foto Profil</button>
                          </form>
                          <br>
                          <a href="{{ route('pemesan-bookingpending') }}" class="btn btn-primary">Status Booking</a>
                          <a href="{{ route('pemesan-bookingsukses') }}" class="btn btn-primary">Status Booking sukses</a>

                      </div>
                    <div class="col-lg-4 "></div>
                </div><br>

                 @endforeach

              <div class="row">
                <div class="col-lg-6">
                  @foreach($userpemesan as $member)
                <form method="post" action="{{url('updateprofil',$member->id)}}" enctype="multipart/form-data">
                           
                                   
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=" Masukkan Nama Anda" value="{{$member->name}}"/>
                            </div>

                             <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder=" Masukkan Nama Anda" value="{{$member->username}}"/>
                            </div>

                             <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder=" Masukkan Email Anda" value="{{$member->email}}"/>
                            </div>

                            <div class="form-group">
                                <label for="nohp">No. HP</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" placeholder=" Masukkan Nomor Handphone Anda" value="{{$member->nohp}}"/>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder=" Masukkan Alamat Anda" value="{{$member->alamat}}"/>
                            </div>

                            <div class="form-group">
                              <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                  
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>

                              </select>
                            </div>
                                                      
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan Terakhir anda" value="{{$member->pendidikan}}"/>
                            </div>

                           
                            @include('sweet::alert')

                          <button class="btn btn-primary" type="Submit">Perbarui Profil</button>
                    
                       @endforeach

                </form>
                </div>
              </div>
          </div>
                
                <!-- <a href="{{ route('logout-pemesan') }}"> <button class="btn btn-primary">Logout</button></a> -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
 @endsection