<?php foreach($payment_result as $rows){
$Client_Name = $rows->client_name;	
}
?>
	  
	         <div class="row">
	         <div class="col-md-12">
      
<div class="box box-info color-palette-box">
        <div class="box-header with-border"style="background-color:#ff8c01;color: white;">
          <h3 class="box-title">
		  <i class=' glyphicon glyphicon-credit-card' ></i>
		   Payment History:
		  </h3>
		
        </div>
		<div class="box-body">
		<div class="row">
			    <div class="col-sm-12">	
<h4><center>Client Name: <code><b><?php if(!empty($payment_result)){  echo $Client_Name;  } else { echo "N/A";} ?></b></code></center></h4>
<div class="box box-info">
              <div class="box-body">
			  <center><div style="width:50%">
			  </div></center>
			 
         <div class="table-responsive span3">
		<table class="table  table-bordered table-hover">
		<thead style="background-color:#ff8c01;color:white;font-size: 15px;">
        <td><center><i class="fas fa-box-open"></i> Package</center></td>
		<td><center><i class="fas fa-money-bill-alt"></i> Payment Amount</center></td>
		<td><center><i class='glyphicon glyphicon-calendar'></i> Payment Date</center></td>
		<td><center><i class="fas fa-user"></i> Entry User</center></td>
		</thead>
		<tbody id="auto-load">
		<?php if(!empty($payment_result)){
		foreach($payment_result as $rows){
	    $source= $rows->entery_date;
		$date = new DateTime($source);
		echo"<tr>";	
		echo"<td width=15%><center>".$rows->package_name."</center></td>";
		echo"<td class='info' width=25%><center>Rs/".$rows->payment_amount."</center></td>";
		echo"<td width=25%><center>";
		echo $date->format('d/m/Y');
		echo"</center></td>";
		echo"<td width=25%><center>".$rows->user_name."</center></td>";
		echo"</tr>";			
		}} ?>
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
	  </div><!----Col-md-12 end---->
	 </div><!------row end-----> 