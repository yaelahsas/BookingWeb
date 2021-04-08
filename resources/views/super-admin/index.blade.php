@extends('layouts.super-admin.superadmin_dashboard_app')

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
                
                <h1>Selamat Datang {{ Auth::user()->name }}</h1>

               

                <a href="{{ route('logout-superadmin') }}"> <button class="btn btn-danger">Logout</button></a>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
        
  </div>
 @endsection