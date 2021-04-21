<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<script type="text/javascript">
$(document).ready(function(){
$('#client').select2();
	$('input[type="number"]').keydown(function(e){
        if(e.keyCode==13){      
            if($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type')=='submit'){// check for submit button and submit form on enter press
             return true;
            }
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
            return false;
        }
    });

	  $('input[type="date"]').keydown(function(e){
        if(e.keyCode==13){      
            if($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type')=='submit'){// check for submit button and submit form on enter press
             return true;
            }
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
            return false;
        }
    });
	
	  $('input[type="text"]').keydown(function(e){
        if(e.keyCode==13){      
            if($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type')=='submit'){// check for submit button and submit form on enter press
             return true;
            }
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
            return false;
        }
    });

		  $('select').keydown(function(e){
        if(e.keyCode==13){      
            if($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type')=='submit'){// check for submit button and submit form on enter press
             return true;
            }
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
            return false;
        }
    });




});
</script>

<section class="content-header">
      <h1>
      <i class='glyphicon glyphicon-briefcase'></i> Payment Panel</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-info color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> 
		  <button class="btn btn-primary btn-sm" style="background-color:#0072c5"  data-toggle="modal" data-target="#My_Modal"><i class='glyphicon glyphicon-briefcase' ></i>  Add Payment</button>
		   
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
		<td><center>#</center></td>
		<td><center>Bill No</center></td>
		<td><center><i class=' glyphicon glyphicon-user' ></i> Client Name</center></td>
		<td><center><i class="fas fa-box-open"></i> Package</center></td>
		<td><center><i class="fas fa-money-bill-alt"></i> Amount</center></td>
		<td><center><i class="fas fa-calendar-alt"></i> Date</center></td>
		<td><center>Payment Remarks</center></td>
		<td><center><i class="fas fa-user"></i> Enetry User</center></td>
		<td><center><i class="fas fa-eye"></i> Action</center></td>
		</thead>
		<tbody id="auto-load">
		<?php if(!empty($payment_data)){
		$i=1;
		foreach($payment_data as $rows){
		echo"<tr>";	
		echo"<td><center>".$i.".</center></td>";
		echo"<td><center><code>".$rows->bill_no."</code></center></td>";
		echo"<td style='background-color:#f8f9fa'><center>".$rows->client_name."</center></td>";
		echo"<td><center>".$rows->package_name."</center></td>";
		echo"<td class='info'><center>RS/".$rows->payment_amount."</center></td>";
		echo"<td><center>".$rows->payment_date."</center></td>";
		echo"<td><center>".$rows->payment_remark."</center></td>";
		echo"<td><center>".$rows->user_name."</center></td>";
		echo"<td><center><a onclick='Delete_Payment(".$rows->payment_id.")' class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#Edit_Modal' onclick='Fill_Ticket(".$rows->payment_id.")' class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>
		</center></td>";
		echo"</tr>";
        $i++;		
		}} ?>
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

<!-- Modal -->
<div class="modal fade" id="My_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Ticket</h4>
      </div>
    <div class="modal-body" style="background-color:#ecf0f5">
    <table class="table table-bordered">
	     <th width="30%">Client Name</th>
	      <td>
	         <select  id="client_id" style="width:100%"  class="form-control select1" required="required">
	              <?php 
	                  echo('<option value="">--Select Client--</option>');
	                  foreach($client_data as $rows){
	                      echo("<option  value='".$rows->client_id."'>");
				          echo($rows->client_name."</option>");
	                 } ?>   
	             </select>
	      </td>
	   <tr>
	     <th width="30%">Package</th>
	      <td  class="pk">
	      </td>
	   </tr>
	   <tr>
	     <th width="30%">Amount</th>
	      <td><input type="text"   id="payment_amount" placeholder="Enter Amount" class="form-control" required="required"></td>
	   </tr>
	   	<tr>
	     <th width="30%">Date</th>
	      <td><input type="date"   id="payment_date" placeholder="Enter Date" class="form-control" required="required"></td>
	   </tr>
	   <tr>
	     <th width="30%">Payment Remarks</th>
	      <td><input type="text"   id="payment_remark" placeholder="Enter Remarks" class="form-control" required="required"></td>
	   </tr>	   
	</table>
      </div>
      <div class="modal-footer bg-primary" style="color:white">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="Save-Button" class="btn btn-primary save_ticket">Save changes</button>
      </div>
    </div>
	
  </div>
</div>

<!----Edit Payment Modal------------>
<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Payment</h4>
      </div>
    <div class="modal-body" style="background-color:#ecf0f5">
    <table class="table table-bordered">
	  <input type="hidden" id="payment_id">
	     <th width="30%">Client Name</th>
	      <td>
	         <select  id="clie_id"   class="form-control " required="required">
	         </select>
	      </td>
	   <tr>
	     <th width="30%">Package</th>
	      <td>
	          <select  id="package"   class="form-control " required="required">
	          </select>
	      </td>
	   </tr>
	   <tr>
	     <th width="30%">Amount</th>
	      <td><input type="text"   id="amount" placeholder="Enter Amount" class="form-control" required="required"></td>
	   </tr>
	   	   <tr>
	     <th width="30%">Date</th>
	      <td><input type="date"   id="date" placeholder="Enter Date" class="form-control" required="required"></td>
	   </tr>
	   <tr>
	    <th>Payment Remarks</th>
	     <td>
	         <input type="text"   id="remark" placeholder="Enter Remarks" class="form-control" required="required">
	     </td>
	   </tr>
	</table>
      </div>
      <div class="modal-footer bg-primary" style="color:white">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save_payment" class="btn btn-primary save_payment">Save changes</button>
      </div>
    </div>
	
  </div>
</div>


<script>
$(document).ready(function(){
	$('#MyTable').saimtech();
});	
$(document).ready(function(){
	//sessionStorage.koibname="saim";
$("#client_id" ).change(function() {

if($("#client_id" ).val()!=""){
var mydata={client_id: $('#client_id').val()};
$(".pk").html("Loading");
$.ajax({
url: "<?php echo base_url(); ?>index.php/Payment/Package_By_Client_Id",
type: "POST",
data: mydata, 
success: function(data) {
$(".pk").html(data);
}
});
	
}	
});
});
//----------- Click on SAVE button------------------
$("#Save-Button").click(function() {
var check="Pass";
var client_id="";
var package_id="";
var payment_amount="";
var payment_date="";
var payment_remark="";
//------------Client------------
if($("#client_id").val()!=""){
client_id=$("#client_id").val();
$("#client_id").css("border-color", "#ccc");
}
else
{
$("#client_id").css("border-color", "red");
$("#client_id").focus();
check="Fail";
}
//-----------------------------------
//-------------Payment Amount-------------
if($("#pk").val()!=""){
package_id=$("#pk").val();
$("#pk").css("border-color", "#ccc");
}
else
{
$("#pk").css("border-color", "red");
$("#pk").focus();
check="Fail";
}
//-----------------------------------
//-------------Payment Amount-------------
if($("#payment_amount").val()!=""){
payment_amount=$("#payment_amount").val();
$("#payment_amount").css("border-color", "#ccc");
}
else
{
$("#payment_amount").css("border-color", "red");
$("#payment_amount").focus();
check="Fail";
}
//-----------------------------------
//-------------payment_date-------------
if($("#payment_date").val()!=""){
payment_date=$("#payment_date").val();
$("#payment_date").css("border-color", "#ccc");
}
else
{
$("#payment_date").css("border-color", "red");
$("#payment_date").focus();
check="Fail";
}
//------------------------------------
//-------------payment_remark-------------
if($("#payment_remark").val()!=""){
payment_remark=$("#payment_remark").val();
$("#payment_remark").css("border-color", "#ccc");
}
else
{
payment_remark="N/A";
check="Pass";
}

//------------------------------------

if(check!="Fail"){
var mydata={
client_id			:client_id,
package_id          :package_id,
payment_amount		:payment_amount,
payment_date		:payment_date,
payment_remark		:payment_remark
};
$.ajax({
url: "<?php echo base_url(); ?>index.php/Payment/add_payment",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
$("#client_id").val("");
$("#pk").val("");
$("#payment_remark").val("");
$("#payment_date").val("");
$("#payment_amount").val("");
}
});

//-------Fill Payment Function----------
function Fill_Ticket(id){
$.ajax({
url: "<?php echo base_url(); ?>index.php/Payment/Edit_Payment/"+id,
type: "POST",       
success: function(data) {
var data2 = $.parseJSON(data);	
$("#payment_id").val(data2.payment_id);
$("#clie_id").html("<option value="+data2.client_id+">"+data2.client_name+"</option><?php foreach($client_data as $rows){ ?><option value='<?php echo($rows->client_id);?>'><?php echo($rows->client_name);?></option><?php } ?>");
$("#package").html("<option value="+data2.package_id+">"+data2.package_name+"</option><?php foreach($package_data as $rows){ ?><option value='<?php echo($rows->package_id);?>'><?php echo($rows->package_name);?></option><?php } ?>");
$("#amount").val(data2.payment_amount);
$("#date").val(data2.payment_date);
$("#remark").val(data2.payment_remark);
$("#save_change").focus();		
}
});	
}
//------------------------------------	
</script>
<script>
//------Update Ticket Function----------
$(".save_payment").click(function(){
var check="Pass";
var new_client="";
var new_package="";
var new_amount="";
var new_date="";
var new_remark="";				
//------------------------
if($("#clie_id").val()!=""){
var new_client=$("#clie_id").val();
$("#clie_id").css("border-color", "#ccc");
} else {
$("#clie_id").css("border-color", "red");
$("#clie_id").focus();
check="Fail";
}
if($("#package").val()!=""){
new_package=$("#package").val();
$("#package").css("border-color", "#ccc");
} else {
$("#package").css("border-color", "red");
$("#package").focus();
check="Fail";
}
if($("#amount").val()!=""){
new_amount=$("#amount").val();
$("#amount").css("border-color", "#ccc");
} else {
$("#amount").css("border-color", "red");
$("#amount").focus();
check="Fail";
}
if($("#date").val()!=""){
new_date=$("#date").val();
$("#date").css("border-color", "#ccc");
} else {
$("#date").css("border-color", "red");
$("#date").focus();
check="Fail";
}
if($("#remark").val()!=""){
new_remark=$("#remark").val();
$("#remark").css("border-color", "#ccc");
} else {
$("#remark").css("border-color", "red");
$("#remark").focus();
check="Fail";
}	
new_pid=$("#payment_id").val();
check="pass";
//-----------------------------------
if(check!="Fail"){
var mydata={
	payment_id       :new_pid,
	client_id       :new_client,
	package_id       :new_package,
	payment_amount         :new_amount,
	payment_date   :new_date,
	remark          :new_remark
	};	
$.ajax({
url: "<?php echo base_url();?>index.php/payment/Update_Payment",
type: "POST",
data: mydata, 
success: function(data) {
$("#auto-load").html(data);
$("#clie_id").val("");
$("#package").val("");
$("#amount").val("");
$("#date").val("");
$("#remark").val("");

}
});
}	
});
//----------- Click on Delete Payment------------------
function Delete_Payment(pid){
	delete_confirm =confirm("Are you sure you want to delete this order? "+pid);
	if(delete_confirm == true){
	var mydata="";
$.ajax({
url: "<?php echo base_url(); ?>index.php/Payment/Delete_Payment/"+pid,
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

</script>
<?php
$this->load->view('inc/Footer');
?>