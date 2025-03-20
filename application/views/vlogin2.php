<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Control de Acceso</title>

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
	  <!-- icheck bootstrap -->
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
	</head>

	<body class="hold-transition login-page">      

		<div class="login-box">
		  <!-- /.login-logo -->
		  <div class="card card-navy">
		    <div class="card-header text-center" >
			<a href="#" class="h2"><b>INICIAR SECCI&Oacute;N</b></a>
		      
		    </div>
		    <div class="card-body">
		      <p class="login-box-msg"><b>SISTEMA AUTOMATIZADO CCS M&aacute;rtires del Cauto</b></p>

		      <form action="<?php echo base_url();?>clogin/Ingresar" method="post">
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" name="xUsuario" placeholder="Usuario" required>
		          <div class="input-group-append">
		            <div class="input-group-text bg-navy">
		              <span class="fas fa-user"></span>
		            </div>
		          </div>
		        </div>
		        <div class="input-group mb-3">
		          <input type="password" class="form-control" name="xPassword" placeholder="Clave de acceso" required>
		          <div class="input-group-append">
		            <div class="input-group-text bg-navy">
		              <span class="fas fa-key"></span>
		            </div>
		          </div>
		        </div>

		        <div class="row">
		          <div class="col-7">
		            
		          </div>
		  
		          <!-- /.col -->
		          <div class="col-5" align="center">
		            <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-sign-in-alt text-white"></i> Acceder</button> 
		          </div>
		          <!-- /.col -->
		        </div>

		        <br>
		        <b><span class="text-danger"><?php echo $mensaje; ?></span></b>

		      </form>       
		    </div>
		    <!-- /.card-body -->
		  </div>
		  <!-- /.card -->
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
	</body>
</html>

 