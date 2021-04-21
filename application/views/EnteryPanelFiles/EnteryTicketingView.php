<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<?php  foreach($ticket as $rows){
$STATUS = $rows->ticket_status;	
$CLIENT = $rows->client_name;
}
?>
	
<section class="content-header">
      <h1>
      <i class='glyphicon glyphicon-credit-card'></i> Ticketing Panel</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-info color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> 
		  <button class="btn btn-primary  btn-sm" style="background-color:#0072c5"  data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-credit-card' ></i> Add Ticket</button>
		   
		  </h3>
		
        </div>
		<div class="box-body">

		<div class="row">
   		 



    <div class="col-sm-12">
      <div class="box box-info">
              <div class="box-body">
			  <center><div style="width:50%">
			  </div></center>
			 
         <div class="table-responsive span3">
		<table class="table  table-bordered table-hover" id="MyTable">
		<thead class="bg-primary" style="font-size: 15px;">
		<td><center>No.</center></td>
		<td><center><i class=' glyphicon glyphicon-user' ></i> Client Name</center></td>
		<td><center><i class="fas fa-exclamation-triangle"></i> Problem Type</center></td>
		<td><center><i class="fas fa-ticket-alt"></i> Remaks</center></td>
		<td><center><i class="fas fa-calendar-alt"></i> Entry Date</center></td>
		<td><center><i class="far fa-clipboard"></i> Ticket Status</center></td>
		<td><center><i class="fas fa-eye"></i> Action</center></td>
		</thead>
		<tbody id="auto-load">
		<?php if(!empty($ticket_data)){
		$i=1;	
		foreach($ticket_data as $rows){
		$source= $rows->entery_date;
		$date = new DateTime($source);
		$status=$rows->ticket_status;
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
		echo"<td width=3%><center><code>".$i."</code></center></td>";
		echo"<td width=15% class='text-uppercase'><center>".$rows->client_name."</center></td>";
		echo"<td width=20%><center>".$rows->problem."</center></td>";
		echo"<td width=10%><center>".$rows->ticket_remark."</center></td>";
		echo"<td width=15%><center>";
	    echo $date->format('d/m/Y');
		echo "</center></td>";
		echo"<td width=15%><center>".$status."</center></td>";
		echo("<td width=17%><center><a onclick='Delete_Ticket(".$rows->ticket_id.")' class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#Edit_Modal' onclick=Fill_Ticket(".$rows->ticket_id.")  class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>
		<a href='".base_url()."index.php/Ticketing/Ticketing_Details_View/".$rows->ticket_id."'  class='btn btn-primary btn-flat btn-xs'><i class='glyphicon glyphicon-credit-card'></i> History</a></center>");
		echo("</td>");
		echo"</tr>";
        $i++;		
		}
		} ?>
		</tbody>
		</table>
		</div>

                </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div>


                  </div>
        <!-- /.box-body -->
      </div>    </section>
    <!-- /.content -->

<!-- ADD TICKET Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0072c5;color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-user'></i> Add New Ticket</h4>
      </div>
      <div class="modal-body" style="background-color:#f9f2ea">
        <div style=" width:98%;background-color:#f9f2ea;border: 2px solid #1b4877;padding:10px">
		<div class="form-group">
                <label>Client Name :</label>
                <select  id="client_id" style="width:100%" class="form-control select" required="required">
	              <?php 
	              echo('<option value="">--Select Client--</option>');
	              foreach($client_data as $rows){
	                  echo("<option  value='".$rows->client_id."'>");
				      echo($rows->client_name."</option>");
	                 } ?>   
	             </select>
				</div>
		<div class="form-group">
                <label>Problem Type :</label>
                <select  id="problem_type" name="problem" style="width:100%" class="form-control" required="required">
	              <?php 
	              echo('<option value="">--Select Problem--</option>');
	                  echo("<option value='SlowingBrowser-Network Issue'>SlowingBrowser-Network Issue</option>");
					  echo("<option value='Frequent-Disconnection'>Frequent Disconnection</option>");
					  echo("<option value='Network-Failed'>Network Failed</option>");
					  echo("<option value='Authentication-Error'>Authentication Error</option>"); 
	                  ?>   
	             </select>
				</div>			
		<div class="form-group">
             <label>Ticket Remarks :</label>
                <input  type="text" id="ticket_remark" class="form-control" tabindex="3"  required="required">
				
		</div>	
		<div class="form-group">
             <label>Ticket Status :</label>
                <select  id="ticket_status" name="status" style="width:100%" class="form-control" required="required">
	              <?php 
	              echo('<option value="">--Select Status--</option>');
	                  echo("<option value='Initialized'>Initialized</option>");
					  echo("<option value='Processing'>Processing</option>");
					  echo("<option value='Complaint Resolved'>Complaint Resolved</option>"); 
					  echo("<option value='Cancel'>Cancel</option>"); 
	                  ?>   
	             </select>
		</div>				
		
		</div>		
      </div>
      <div class="modal-footer" style="background-color:black;color:white">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="Save-Button" style="background-color:#0072c5">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!---------------->
<!----Edit Ticket Modal------------>
<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Ticket</h4>
      </div>
    <div class="modal-body" style="background-color:#ecf0f5">
    <table class="table table-bordered">
	  <input type="hidden" id="tick_id">
	     <th width="30%">Client Name</th>
	      <td>
	         <select style="width:100%"  id="clie_id"   class="form-control"placeholder="Enter Status" required="required">
	         </select>
	      </td>
	   <tr>
	     <th width="30%">Problem Type</th>
	      <td>
	          <select  id="prob_type"   class="form-control "placeholder="Enter Problem" required="required">
	          </select>
	      </td>
	   </tr>
	   <tr>
	     <th width="30%">Ticket Remarks</th>
	      <td><input type="text"   id="tick_remark" placeholder="Enter Name" class="form-control" required="required"></td>
	   </tr>
	   <tr>
	    <th>Order Status</th>
	     <td>
	         <select  id="tick_status" class="form-control text-uppercase"placeholder="Enter Status" required="required">
			 </select>
	     </td>
	   </tr>
	</table>
      </div>
      <div class="modal-footer bg-primary" style="color:white">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save_change" class="btn btn-primary save_ticket">Save changes</button>
      </div>
    </div>
	
  </div>
</div>

<!---------------------------------->
<script>
$(document).ready(function(){
	$('#MyTable').saimtech();
});	
//----------- Click on SAVE button Add Ticket------------------
$("#Save-Button").click(function() {
var check="Pass";
var new_cid="";
var p_type="";
var t_remark="";
var t_status="";
//------------Client Id------------
if($("#client_id").val()!=""){
new_cid=$("#client_id").val();
$("#client_id").css("border-color", "#ccc");
}
else
{
$("#client_id").css("border-color", "red");
$("#client_id").focus();
check="Fail";
}
//-----------------------------------
//-------------Problem Type-------------
if($("#problem_type").val()!=""){
p_type=$("#problem_type").val();
$("#problem_type").css("border-color", "#ccc");
}
else
{
$("#problem_type").css("border-color", "red");
$("#problem_type").focus();
check="Fail";
}
//-----------------------------------
//-------------Ticket Remark-------------
if($("#ticket_remark").val()!=""){
t_remark=$("#ticket_remark").val();
$("#ticket_remark").css("border-color", "#ccc");
}
else
{
t_remark="N/A";
check="Pass";
}
//------------------------------------


//-------------Client Address-------------
if($("#ticket_status").val()!=""){
t_status=$("#ticket_status").val();
$("#ticket_status").css("border-color", "#ccc");
}
else
{
$("#ticket_status").css("border-color", "red");
$("#ticket_status").focus();
check="Fail";
}
//------------------------------------
if(check!="Fail"){
var mydata={
	c_id	        :new_cid,
	problem	        :p_type,
	ticket_remark	:t_remark,
	status	        :t_status	
};
$.ajax({
url: "<?php echo base_url(); ?>index.php/Ticketing/Add_Ticket",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
$("#client_id").val("");
$("#problem_type").val("");
$("#ticket_remark").val("");
$("#ticket_status").val("");
}
});
//----------- Click on Delete Ticket------------------
function Delete_Ticket(tid){
	delete_confirm =confirm("Are you sure you want to delete this order? "+tid);
	if(delete_confirm == true){
	var mydata="";
$.ajax({
url: "<?php echo base_url(); ?>index.php/Ticketing/Delete_Ticket/"+tid,
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
	}
	else{
		false;
	}
}
//------------------------------------
//-------Fill Ticket Function----------
function Fill_Ticket(id){
$.ajax({
url: "<?php echo base_url(); ?>index.php/Ticketing/Edit_Ticket/"+id,
type: "POST",       
success: function(data) {
var data2 = $.parseJSON(data);	
$("#tick_id").val(data2.ticket_id);
$("#clie_id").html("<option value="+data2.client_id+">-----"+data2.client_name+"-----</option><?php foreach($client_data as $rows){ ?><option value='<?php echo($rows->client_id);?>'><?php echo($rows->client_name);?></option><?php } ?>");
$("#prob_type").html("<option value="+data2.problem+">"+data2.problem+"</option><option>SlowingBrowser-Network Issue</option><option>Frequent-Disconnection</option><option>Network-Failed</option><option>Authentication-Error</option>");
$("#tick_remark").val(data2.ticket_remark);
$("#tick_status").html("<option value="+data2.ticket_status+">"+data2.ticket_status+"</option><option>Processing</option><option>Initialized</option><option>Complaint Resolved</option><option>Cancel</option>");
$("#save_change").focus();		
}
});	
}
//------------------------------------	
</script>
<script>
//------Update Ticket Function----------
$(".save_ticket").click(function(){
var check="Pass";
var new_ticket_id="";
var new_client="";
var new_problem="";
var new_remarks="";		
var new_status="";		
//------------------------
if($("#clie_id").val()!=""){
var new_client=$("#clie_id").val();
$("#clie_id").css("border-color", "#ccc");
} else {
$("#clie_id").css("border-color", "red");
$("#clie_id").focus();
check="Fail";
}
if($("#prob_type").val()!=""){
new_problem=$("#prob_type").val();
$("#prob_type").css("border-color", "#ccc");
} else {
$("#prob_type").css("border-color", "red");
$("#prob_type").focus();
check="Fail";
}
if($("#tick_remark").val()!=""){
new_remarks=$("#tick_remark").val();
$("#tick_remark").css("border-color", "#ccc");
} else {
$("#tick_remark").css("border-color", "red");
$("#tick_remark").focus();
check="Fail";
}
if($("#tick_status").val()!=""){
new_status=$("#tick_status").val();
$("#tick_status").css("border-color", "#ccc");
} else {
$("#tick_status").css("border-color", "red");
$("#tick_status").focus();
check="Fail";
}
new_ticket_id=$("#tick_id").val();
check="pass";
//-----------------------------------
if(check!="Fail"){
var mydata={
	ticket_id       :new_ticket_id,
	client_id       :new_client,
	problem         :new_problem,
	ticket_remark   :new_remarks,
	status          :new_status
	};	
$.ajax({
url: "<?php echo base_url();?>index.php/Ticketing/Update_Ticket",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
$("#tick_id").val("");
$("#clie_id").val("");
$("#prob_type").val("");
$("#tick_remark").val("");
$("#tick_status").val("");

}
});
}	
});

</script>
<script>
$(document).ready(function() {
	//if(sessionStorage.koibname!=""){
		//alert(sessionStorage.koibname);
	//}
  }); 
</script>
<?php
$this->load->view('inc/Footer');
?>