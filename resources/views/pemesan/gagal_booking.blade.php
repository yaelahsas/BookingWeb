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
                
                <h1>PROFIL ANDA BELUM LENGKAP, SILAKAN LENGKAPI PROFIL</h1><br>
                <a href="{{ route('pemesan-editprofil') }}"><button class="btn btn-success">Lengkapi Profil</button></a>
                
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
    <!-- /.content -->
  </div>
  @endsection