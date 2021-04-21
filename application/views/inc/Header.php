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
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/dist/css/FontAwesome.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/dist/css/skins/skin-blue.min.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/Assets/inbox-big.png">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<script src="<?php echo base_url(); ?>Assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>Assets/dist/js/fontawesome.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/datatables.css">
<link href="<?php echo base_url(); ?>Assets/plugins/select2/select2.min.css" rel="stylesheet" />

<?php 
?> 
<style>
body {
    padding-right: 0 !important;
    overflow-y: scroll!important;
}
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. oncontextmenu="return false" -->
<body class="hold-transition skin-blue layout-top-nav"  onbeforeunload="return myFunction()"> <!--oncontextmenu="return false" --> 
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container" style="width:88%">
        <div class="navbar-header"> 
          <a href="<?php echo base_url(); ?>index.php/Home" class="navbar-brand"><b>Tech <small>Dashboard</small></b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="glyphicon glyphicon-th-large"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
       
		<ul class="nav navbar-nav">
		 <!------------------------------------------------>
		<li><a href="<?php echo base_url(); ?>index.php/Clients"><i class=' glyphicon glyphicon-user' ></i> Clients<span class="sr-only">(current)</span></a></li>
		 <!------------------------------------------------>
		<li><a href="<?php echo base_url(); ?>index.php/Ticketing"><i class="fas fa-ticket-alt"></i>  Tickting</a></li>
		<!------------------------------------------------>
		<li><a href="<?php echo base_url(); ?>index.php/Payment"><i class="fas fa-money-bill-alt"></i> Payments</a></li>
		<?php if ($_SESSION['POWER']=="ADMIN"){?>
		<li><a href="<?php echo base_url(); ?>index.php/Users"><i class="fas fa-user-circle"></i>  Users</a>
		<?php } ?>
		</li>
		<li><a href="<?php echo base_url(); ?>index.php/History"><i class="fas fa-history"></i> History</a></li>
		
		<!------------------------------------------------>
		</ul>
		</div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav"> 
		  
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <i class="glyphicon glyphicon-off"></i>
                                             <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> Mr. <?php echo $_SESSION['user_name']; ?></span>
              </a>
              <ul class="dropdown-menu" style="background-color:#0A6D72">
                <!-- The user image in the menu -->
                <li class="user-header" style="background-color:#3c8dbc">
                  <img src="<?php echo base_url(); ?>Assets/dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                  <p>
                   
					<small><span class="hidden-lg"> Mr. <?php echo $_SESSION['user_name']; ?></span></small>
                    <small><b>Project: </b> Tech</small>
					<small><b>Power: </b><?php echo $_SESSION['POWER'];?></small>
                  </p>
                </li>
                <!-- Menu Body -->
               
                <!-- Menu Footer-->
                <li class="user-footer" style="background-color:#f9f2ea">
                  <div class="pull-left">
                 
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>index.php/Login/Logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container" >