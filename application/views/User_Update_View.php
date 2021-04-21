<?php
error_reporting(0);
$this->load->view('inc/Header1');
?>

<section class="content-header">
      <h1>
       Order Details 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Order Details Panel</a></li>
        <li><a href="#"></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default color-palette-box">

        <div class="box-body">

		<div class="row">
   		 <div class="col-sm-12">
      		<div class="box box-warning">
        	<div class="box-header with-border">
          <h3 class="box-title">
          <div class="box-tools pull-right">
            
            </div>
	          <div class="container">
		  <?php foreach ($result as $rows): ?>
            <form class="horizontal" method="post" action="<?php echo base_url();?>users/Update_User_Info" >
                <input type="hidden" name="user_id" value="<?php echo $rows->user_id; ?>">
			   <div class="form-group row">
                               <label for="user_name" class="col-md-2">User Name</lable>
                           </div>
                           <div class="form-group row">
			         <input class="col-md-3" id="user_name" type="text" name="user_name" value="<?php echo $rows->user_name ?>"></br>
			   </div>
			   <div class="form-group row">
                               <label for="user_email" class="col-md-2">User Email</label>
                           </div>
                           <div class="form-group row">
				       <input class="col-md-3" id="user_email" type="email" name="user_email" value="<?php echo $rows->user_email ?>"></br>
			   </div>
			   <div class="form-group row">
                               <lable for="password" class="col-md-2"> User Password</label>
                           </div>
                            <div class="form-group row">
			           <input class="col-md-3" id="password" type="text" name="password" value="<?php echo $rows->password ?>"></br>
			   </div>
			   <div class="form-group row">
                               <lable for="user_phone" class="col-md-2"> User Phone</label>
                           </div>
                            <div class="form-group row">
				     <input class="col-md-3" id="user_phone" type="text" name="user_phone" value="<?php echo $rows->user_phone ?>"></br>  
		            </div>
                            <div class="form-group row">
                                 <button type="submit" class="btn btn-info">submit</button>
                            </div>     
            </form>
			<?php endforeach; ?>
			
                  </div>
	                  </div><!-- /.box-body -->
			
      </div><!-- /.box -->
    </div><!-- /.col -->



 
  </div>


                  </div>
        <!-- /.box-body -->
      </div>    </section>
    
  
    <!-- /.content -->
<!-- Modal -->
</div>




<?php
$this->load->view('inc/Footer1');
?>