<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">
            	<br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                	<br>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register </h1>
                                    </div>

                                    <form action="{{route('proses-register')}}" method="post">
										{{csrf_field()}}

										@if (count($errors) > 0)
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									    @endif

                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="nama" class="form-control" name="name" required="">
                                        </div>
									    
										<div class="form-group">
                                            <label>Username</label>
											<input type="username" class="form-control" name="username"  required="">
										</div>
										
										
										<div class="form-group">
                                            <label>Email</label>
											<input type="email" class="form-control" name="email" required="">
										</div>

										<div class="form-group">
                                            <label>Nomor Hp</label>
											<input type="nama" class="form-control" name="nohp"  required="">
										</div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="nama" class="form-control" name="alamat"  required="">
                                        </div>

                                         <div class="form-group">
                                          <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                              
                                                <option>Laki-Laki</option>
                                                <option>Perempuan</option>

                                          </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                            <input type="nama" class="form-control" name="pendidikan" required="">
                                        </div>

										<div class="form-group">
                                            <label>Password</label>
											<input type="password" class="form-control" name="password"  required="">
										</div>
										
										<div class="form-group">
                                            <label>Konfirmasi Password</label>
											<input type="password" class="form-control" name="repassword"  required="">
										</div>

										<!-- <div class="form-group">
                                        	<label>Pilih Lembaga</label>
                                            <select name="id_lembaga" class="form-control" >
                                                @foreach ($Datalembaga as $lembaga)
                                                    <option value="{{$lembaga->id}}" > {{$lembaga->nama_lembaga}} </option>
                                                @endforeach
                                            </select>
                                    	</div> -->
										
										<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width: 150px">Register</button>
										</div>
									</form>
                                     @include('sweet::alert')
                                    <hr>
                                   <!--  <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


