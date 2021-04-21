<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<script>
$(document).ready(function(){
$('#MyTable').DataTable({
 "lengthMenu": [[ -1, 10, 25, 50], [ "All", 10, 25, 50]]
});
});
</script>
<section class="content">

  <meta http-equiv="refresh" content="900">
      <div class="row">
        <div class="col-md-6">
        

      

       
        
         

          <!-- social buttons -->
          <div class="box box-primary">
            <div class="box-header" style="background-color:#f9f2ea">
              <h3 class="box-title">Dashboard
              </h3>
            </div>
            <div class="box-body">
			<table class="table table-striped table-bordered" id="MyTable">
                <thead>
				<tr style="background-color:#f9f2ea">
                  <th style="width:5%">#</th>
                  <th style="width:80%">Attribute </th>
                  <th>Count</th>
                  
                </tr>
				</thead>
				<tbody>
				<tr class="info">
                  <td>1.</td>
                  <th>Total Users</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/RPROReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($users)){ echo $users; } else { echo "N/A";} ?></font></a></b></center></td>
                </tr>
                <tr style="background-color:#F9F2EA">
                  <td>2.</td>
                  <th>Total Clients</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/RPROReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($clients)){ echo $clients; } else { echo "N/A";} ?></font></a></b></center></td>
                </tr>
                  <tr style="background-color:#fcc6e2">
                  <td>3.</td>
                  <th >Total Complains</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/CalvingReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($tickets)){ echo $tickets; } else { echo "N/A";} ?></font></b></center></td>
                </tr>
				<tr style="background-color:#F9F2EA">
				<td>4.</td>
                  <th>Total Initiallized Complains</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/CullingReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($Initial)){ echo $Initial; } else { echo "N/A";} ?></font></b></center></td>
                </tr >
				  <tr class='info'>
                  <td>5.</td>
                  <th>Total Processing Complains</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/CullingReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($Processing)){ echo $Processing; } else { echo "N/A";} ?></font></b></center></td>
                </tr>
				<tr class='success'>
                  <td>6.</td>
                  <th>Total Resolved Complains</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/CullingReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($Resolved)){ echo $Resolved; } else { echo "N/A";} ?></font></b></center></td>
                </tr>
				<tr class='danger'>
                  <td>7.</td>
                  <th>Total Canceled Complains</th>
                  <td><center><b><a href="<?php echo base_url(); ?>index.php/CullingReport"><font style="color:#0c7756;background-color:#f9f2f4; font-size:15px"><?php if(!empty($Cancel)){ echo $Cancel; } else { echo "N/A";} ?></font></b></center></td>
                </tr>
				 
              </tbody></table>	
              
			  
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		
		
		
		
		   <div class="col-md-6">
        

      

       
        
         

      
			

            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		
		
		

       
      </div>
      <!-- /. row -->
    </section>
    
	
<?php
$this->load->view('inc/Footer');
?>