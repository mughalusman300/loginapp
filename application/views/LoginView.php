<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tech Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/bootstrap/css/bootstrap.min.css">
 <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/Assets/inbox-big.png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<img src="<?php echo base_url(); ?>Assets/inbox-big.png" width="150px" height="150px"><br>
    <a href="<?php echo base_url(); ?>" style="color:#002345"><b style="color:#002345"> Tech</b> Portal</a>
	 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color:#002345;color:#d2d6de">
    <p class="login-box-msg">Sign in to start your session</p>

   <form action="<?php echo base_url(); ?>index.php/Login/process_login" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <?php if(!empty($error)){if($error=="Y"){?>
	  <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="glyphicon glyphicon-ban-circle"></i> Login Fail!</h4>
      Username and password must not be null.Please try again.This alert is dismissable.
      </div>
	  <?php } else if($error=="YN"){?>
	   <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="glyphicon glyphicon-ban-circle"></i> Login Fail!</h4>
      Worng username or password.Please try again.This alert is dismissable.
      </div>
	  <?php } } ?>	  
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>Assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>Assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
