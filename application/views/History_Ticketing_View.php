<?php foreach($ticket_result as $rows){
$CLIENT = $rows->client_name;	
}
?>
<hr style="border-color:#009688">
<div class="row">
<div  class="col-md-12">
<div class="box box-info color-palette-box">
        <div class="box-header with-border"style="background-color:#75399c;color: white;">
         <h3 class="box-title"> 
		  <i class="fas fa-ticket-alt"></i> 
		   Ticketing  History:
		  </h3>
		
        </div>
		<div class="box-body">
		<div class="row">
			    <div class="col-sm-12">	
<h4><center> Client Name: <code><b><?php if(!empty($ticket_result)){  echo $CLIENT;  } else { echo "N/A";} ?></b></code></center></h4>
<div class="box box-info">
              <div class="box-body">
			  <center><div style="width:50%">
			  </div></center>
			 
         <div class="table-responsive span3">
		<table class="table  table-bordered table-hover">
		<thead style="background-color:#75399c;color:white;font-size: 15px;" >
		<td><center>No.</center></td>
		<td><center><i class="fas fa-exclamation-triangle"></i> Problem</center></td>
		<td><center><i class='glyphicon glyphicon-calendar'></i> Date</center></td>
		<td><center><i class="fas fa-eye"></i> Action</center></td>
		</thead>
		<tbody id="auto-load">
		 <?php $i=1;?>
		 <?php foreach($ticket_result as $rows){ ?>
		<?php $source= $rows->entery_date;
		$date = new DateTime($source);
		$status=$rows->ticket_status;
		?>
		<?php 
		if($status=="Processing"){
		echo"<tr class='info'>";
		}
		elseif ($status=="Complaint Resolved"){
		echo "<tr class='success'>";
		} 
		elseif($status=="Cancel"){
		echo"<tr class='danger'>";
		}
		else{
			echo"<tr style='background-color:#f8f9fa'>";
		}
		?>
		<td width=10%><center><?php echo $i;?></center></td>
		<td width=35%><center><?php echo $rows->problem;?></center></td>
		<td width=15%><center><?php echo $date->format('d/m/Y');?></center></td>
		<td width=30%><center><?php echo $status;?></center></td>
		</tr>
		<?php $i++;?>
		 <?php }?>
		</tbody>
		</table>
		</div>

                </div><!-- /.box-body -->
      </div><!-- /.box -->

        <!-- /.box-body -->
      </div> 
	   </div>
	  </div>
      </div>
	  </div>
	  </div>
<hr style="border-color:#75399c">	  