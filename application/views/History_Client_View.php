<?php foreach($client_result as $rows){
$client_name = $rows->client_name;	
}
?>


<div class="box box-info color-palette-box">
        <div class="box-header with-border"style="background-color:#018128;color: white;">
          <h3 class="box-title"> 
		  <i class=' glyphicon glyphicon-user' ></i>
		    Client History:
		  </h3>
        </div>
		<div class="box-body">
		<div class="row">
			    <div class="col-sm-12">	
<h4><center>Client Name:<code><b><?php if(!empty($client_result)){  echo $client_name;  } else { echo "N/A";} ?></b></code></center></h4>

<div class="box box-info">
              <div class="box-body">
			  <center><div style="width:50%">
			  </div></center>
			 
         <div class="table-responsive span3">
		<table class="table  table-bordered table-hover">
		<thead style="background-color:#018128;color:white;font-size: 15px;">
		<td><center><i class=' glyphicon glyphicon-user' ></i> ClientClient Name</center></td>
		<td><center><i class="fas fa-box-open"></i> Package</center></td>
		<td><center><i class='glyphicon glyphicon-phone'></i> Client Phone</center></td>
		<td><center><i class='glyphicon glyphicon-home'></i> Address</center></td>
		</thead>
		<tbody id="auto-load">
		<?php if(!empty($client_result)){
		foreach($client_result as $rows){
		echo"<tr>";	
		echo"<td width=25%><center>".$rows->client_name."</center></td>";
		echo"<td class='info' width=20%><center>".$rows->package_name."</center></td>";
		echo"<td width=35%><center>".$rows->client_phone."</center></td>";
		echo"<td width=20%><center>".$rows->client_address."</center></td>";
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