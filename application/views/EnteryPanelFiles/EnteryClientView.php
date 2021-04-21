<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<script type="text/javascript">
$(document).ready(function(){
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
      <i class='glyphicon glyphicon-user'></i> Client Panel</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-info color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> 
		  <button class="btn btn-primary  btn-sm" style="background-color:#0072c5"  data-toggle="modal" data-target="#myModal"><i class='glyphicon glyphicon-user' ></i> Add Client</button>
		   
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
		<thead class="bg-primary"style="font-size: 15px;">
		<td><center>No.</center></td>
		<td><center><i class=' glyphicon glyphicon-user' ></i> Client Name</center></td>
		<td><center><i class='glyphicon glyphicon-phone'></i> Phone</center></td>
		<td><center><i class='glyphicon glyphicon-comment'></i> Email</center></td>
		<td><center><i class="fas fa-id-card"></i> CNIC</center></td>
		<td><center><i class="fas fa-box-open"></i> Package</center></td>
		<td><center><i class="far fa-address-book"></i> Address</center></td>
		<td><center><i class="fas fa-eye"></i> Action</center></td>
		</thead>
		<tbody id="auto-load">
		
		<?php if(!empty($client_data)){
		$i=1;	
		foreach($client_data as $rows){	
		echo"<tr>";	
		echo"<td><center><code>".$i."</code></center></td>";
		echo"<td style='background-color:#f8f9fa'><center>".$rows->client_name."</center></td>";
		echo"<td><center>".$rows->client_phone."</center></td>";
		echo"<td><center>".$rows->client_mail."</center></td>";
		echo"<td><center>".$rows->client_cnic."</center></td>";
		echo"<td class='info'><center>".$rows->package_name."</center></td>";
		echo"<td><center>".$rows->client_address."</center></td>";
		echo"<td><center><a onclick=Delete_Client(".$rows->client_id.") class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a  data-toggle='modal' data-target='#Edit_Modal' onclick='Fill_Client(".$rows->client_id.")' class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>
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

<!--ADD Client Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0072c5;color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-user'></i> Add New Client</h4>
      </div>
      <div class="modal-body" style="background-color:#f9f2ea">
        <div style=" width:98%;background-color:#f9f2ea;border: 2px solid #1b4877;padding:10px">
		<div class="form-group">
                <label>Client Name :</label>
                <input type="text" class="form-control" tabindex="1"  placeholder="Enter Client Name" id="client_name" required="required">
				</div>
		<div class="form-group">
                <label>Client CNIC :</label>
                <input type="text" class="form-control" tabindex="2"  placeholder="Enter Client CNIC" id="client_cnic" required="required">
				</div>			
		<div class="form-group">
                <label>Client Phone :</label>
                <input type="text" class="form-control" tabindex="3"  placeholder="Enter Client Phone" id="client_phone" required="required">
				</div>	
		<div class="form-group">
                <label>Client Email :</label>
                <input type="text" class="form-control" tabindex="4"  placeholder="Enter Client Email" id="client_mail" required="required">
				</div>	
		<div class="form-group">
                <label>Package :</label>
                <select class="form-control"  tabindex="5" id="package">
				<option value=0>Select Package</option>
				<?php if(!empty($package_data)){
				foreach($package_data as $rows){
				echo"<option value=".$rows->package_id.">".$rows->package_name."</option>";
				}} ?>
				</select>
				</div>			
		<div class="form-group">
                <label>Client Address :</label>
                <textarea class="form-control"  name="client_address" tabindex="6" id="client_address" placeholder="Enter Client Address"></textarea>
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
	  <input type="hidden" id="client_id">
	     <th width="30%">Client Name</th>
	      <td>
	         <input type="text"   id="name" placeholder="Enter Client Name" class="form-control" required="required"></td>
	   
	      </td>
	   <tr>
	     <th width="30%">Phone No</th>
	      <td>
	          <input type="tel"  id="no" placeholder="Enter Phone No" class="form-control" required="required"></td>
	      </td>
	   </tr>
	   <tr>
	     <th width="30%">Email</th>
	      <td><input type="mail"   id="mail" placeholder="Enter Client Email" class="form-control" required="required"></td>
	   </tr>
	   <tr>
	     <th width="30%">CNIC</th>
	      <td><input type="text"   id="cnic" placeholder="Enter Client CNIC" class="form-control" required="required"></td>
	   </tr>
	   <tr>
	   	     <th width="30%">Select Package</th>
	      <td>
	         <select  id="package_id"   class="form-control" required="required">
	            
	         </select>
	      </td>
	   </tr>
	   <tr>
	    <th>Address</th>
	     <td>
	         <input type="text"   id="address" placeholder="Enter Address" class="form-control" required="required">
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
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
//--------------------------------------------------
$(document).ready(function(){
	$('#MyTable').saimtech();
});	

//----------- Click on SAVE button------------------
$("#Save-Button").click(function() {
var check="Pass";
var cname="";
var cphone="";
var ccnic="";
var cmail=$("#client_mail").val();
var cpackage="";
var caddress="";
//------------Client Name------------
if($("#client_name").val()!=""){
cname=$("#client_name").val();
$("#client_name").css("border-color", "#ccc");
}
else
{
$("#client_name").css("border-color", "red");
$("#client_name").focus();
check="Fail";
}
//-----------------------------------
//-------------Client Phone-------------

if($("#client_phone").val()!=""){

cphone=$("#client_phone").val();
$("#client_phone").css("border-color", "#ccc");
}
else
{
$("#client_phone").css("border-color", "red");
$("#client_phone").focus();
check="Fail";
}
//-----------------------------------
//-------------Client CNIC-------------
if($("#client_cnic").val()!=""){
ccnic=$("#client_cnic").val();
$("#client_cnic").css("border-color", "#ccc");
}
else
{
$("#client_cnic").css("border-color", "red");
$("#client_cnic").focus();
check="Fail";
}
//------------------------------------
//-------------Client Mail-------------
if(isValidEmailAddress(cmail)){

cmail=$("#client_mail").val();
$("#client_mail").css("border-color", "#ccc");
}
else
{
$("#client_mail").css("border-color", "red");
$("#client_mail").focus();
check="Fail";
}
//------------------------------------
//-------------Client Package-------------
if($("#package").val()!=0){
cpackage=$("#package").val();
$("#package").css("border-color", "#ccc");
}
else
{
$("#package").css("border-color", "red");
$("#package").focus();
check="Fail";
}
//------------------------------------
//-------------Client Address-------------
if($("#client_address").val()!=""){
caddress=$("#client_address").val();
$("#client_address").css("border-color", "#ccc");
}
else
{
$("#client_address").css("border-color", "red");
$("#client_address").focus();
check="Fail";
}
//------------------------------------
if(check!="Fail"){
var mydata={
cname		:cname,
cphone		:cphone,
ccnic		:ccnic,
cmail		:cmail,
cpackage	:cpackage,
caddress	:caddress	
};
$.ajax({
url: "<?php echo base_url(); ?>index.php/Clients/add_client",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
$("#client_address").val("");
$("#client_mail").val("");
$("#package").val(0);
$("#client_name").val("");
$("#client_phone").val("");
$("#client_cnic").val("");
}
});
//----------- Click on Reset button------------------
$("#reset-Button").click(function() {
$("#client_address").val("");
$("#client_mail").val("");
$("#package").val(0);
$("#client_name").val("");
$("#client_phone").val("");
$("#client_cnic").val("");
});

//-------Fill Payment Function----------
function Fill_Client(id){
$.ajax({
url: "<?php echo base_url(); ?>index.php/Clients/Edit_Client/"+id,
type: "POST",       
success: function(data) {
var data2 = $.parseJSON(data);	
$("#client_id").val(data2.client_id);
$("#name").val(data2.client_name);
$("#cnic").val(data2.client_cnic);
$("#mail").val(data2.client_mail);
$("#no").val(data2.client_phone);
$("#package_id").html("<option value="+data2.package_id+">"+data2.package_name+"</option><?php foreach($package_data as $rows){ ?><option value='<?php echo($rows->package_id);?>'><?php echo($rows->package_name);?></option><?php } ?>");
$("#address").val(data2.client_address);
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
var new_client_id="";
var new_name="";
var new_cnic="";
var new_mail="";
var new_no="";
var new_package_id="";				
var new_address="";				
//------------------------
if($("#name").val()!=""){
new_name=$("#name").val();
$("#name").css("border-color", "#ccc");
} else {
$("#name").css("border-color", "red");
$("#name").focus();
check="Fail";
}
if($("#cnic").val()!=""){
new_cnic=$(cnic).val();
$("#cnic").css("border-color", "#ccc");
} else {
$("#cnic").css("border-color", "red");
$("#cnic").focus();
check="Fail";
}
if($("#mail").val()!=""){
new_mail=$("#mail").val();
$("#mail").css("border-color", "#ccc");
} else {
$("#mail").css("border-color", "red");
$("#mail").focus();
check="Fail";
}
if($("#no").val()!=""){
new_no=$("#no").val();
$("#no").css("border-color", "#ccc");
} else {
$("#no").css("border-color", "red");
$("#no").focus();
check="Fail";
}
if($("#package_id").val()!=""){
var new_package_id=$("#package_id").val();
$("#package_id").css("border-color", "#ccc");
} else {
$("#package_id").css("border-color", "red");
$("#package_id").focus();
check="Fail";
}	
if($("#address").val()!=""){
var new_address=$("#address").val();
$("#address").css("border-color", "#ccc");
} else {
$("#address").css("border-color", "red");
$("#address").focus();
check="Fail";
}
new_client_id=$("#client_id").val();
check="pass";
//-----------------------------------
if(check!="Fail"){
var mydata={
	client_id        :new_client_id,
	client_name      :new_name,
	client_cnic      :new_cnic,
	client_mail      :new_mail,
	client_phone     :new_no,
	client_package   :new_package_id,
	client_address   :new_address
	};	
$.ajax({
url: "<?php echo base_url();?>index.php/Clients/Update_Client",
type: "POST",
data: mydata, 
success: function(data) {
$("#auto-load").html(data);
$("#client_id").val("");
$("#name").val("");
$("#cnic").val("");
$("#mail").val("");
$("#no").val("");
$("#package_id").val("");
$("#address").val("");


}
});
}	
});
//----------- Click on Delete Payment------------------
function Delete_Client(cid){
	delete_confirm =confirm("Are you sure you want to delete this order? "+cid);
	if(delete_confirm == true){
	var mydata="";
$.ajax({
url: "<?php echo base_url(); ?>index.php/Clients/Delete_Client_Row/"+cid,
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