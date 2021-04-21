<?php
error_reporting(0);
$this->load->view('inc/Header');
?>

<section class="content-header">
      <h1>
       User Module 
      </h1>
</section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add New User</button></h3>
        </div>
        <div class="box-body">

		<div class="row">
   		 <div class="col-sm-12">
      		<div class="box box-primary">
        	<div class="box-header with-border">
          <h3 class="box-title">Order Panel</h3>
          <div class="box-tools pull-right">
            
            </div>
		<table class="table table-bordered table-hover" id="MyTable">
		 <thead class="bg-primary" style="font-size: 15px;">
		  <th>#</th>
		  <th><i class="fas fa-user-circle"></i> User Name</th>
		  <th><i class='glyphicon glyphicon-comment'></i> User Email</th>
		  <th><i class="fas fa-unlock-alt"></i> Password</th>
		  <th><i class='glyphicon glyphicon-phone'></i> User Phone</th>
		  <th><i class="fas fa-plug"></i> User Power</th>	
		  <th><i class="fas fa-eye"></i> Action</th>	
		  </thead>
		  <tbody>
	<tbody id="auto-load">
		<?php if(!empty($Users)){
		$i=1;	
		foreach($Users as $rows){
		echo"<tr>";	
		echo"<td><center><code>".$i."</code></center></td>";
		echo"<td class='info'><center>".$rows->user_name."</center></td>";
		echo"<td><center>".$rows->user_email."</center></td>";
		echo"<td><center>".$rows->password."</center></td>";
		echo"<td><center>".$rows->user_phone."</center></td>";
		echo"<td class='info'><center>".$rows->user_power."</center></td>";
		echo("<td><center><a onclick='Delete_Users(".$rows->user_id.")' class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#EditModal' onclick=Fill_User(".$rows->user_id.")  class='btn btn-primary btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a></center>");
		echo("</td>");
		echo"</tr>";
        $i++;		
		}
		} ?>
		</tbody>
		  </table>
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



<!--Add Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body" style="background-color:#ecf0f5">
    <table class="table table-bordered">
	<th width="20%">User Name</th>
	<td><input type="text" id="user_name" placeholder="Enter User Name" class="form-control" required="required"></td>
     <tr>
	    <th width="20%">User Email</th>
	    <td><input type="email" id="user_email" placeholder="Enter User Email" class="form-control" required="required"></td>	
	 </tr>
	 <tr>
	    <th width="20%">User Password</th>
	    <td><input type="text" id="password" placeholder="Enter User Password" class="form-control" required="required"></td>
	 </tr>
	 <tr>
	    <th width="20%">User Phone</th>
	    <td><input type="text" id="user_phone" placeholder="Enter User Phone" class="form-control" required="required"></td>
	 </tr>
	</table>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="Save-Button"class=" btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body" style="background-color:#ecf0f5">
    <table class="table table-bordered">
	<input type="hidden" id="u_id">
	<th width="20%">User Name</th>
	<td><input type="text" id="u_name" placeholder="Enter User Name" class="form-control" required="required"></td>
     <tr>
	    <th width="20%">User Email</th>
	    <td><input type="email" id="u_email" placeholder="Enter User Email" class="form-control" required="required"></td>	
	 </tr>
	 <tr>
	    <th width="20%">User Password</th>
	    <td><input type="text" id="u_password" placeholder="Enter User Password" class="form-control" required="required"></td>
	 </tr>
	 <tr>
	    <th width="20%">User Phone</th>
	    <td><input type="text" id="u_phone" placeholder="Enter User Phone" class="form-control" required="required"></td>
	 </tr>
	 <tr>
	    <th width="20%">User Power</th>
	    <td><input type="text" id="u_power"  class="form-control" required="required"></td>
	 </tr>	 
	</table>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save_ticket"class=" btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
//----------- Click on SAVE button Add Ticket------------------
$(document).ready(function(){
	$('#MyTable').saimtech();
});	
$("#Save-Button").click(function() {
var check="Pass";
var new_uname="";
var new_umail="";
var new_upassword="";
var new_uphone="";
//------------Client Id------------
if($("#user_name").val()!=""){
new_uname=$("#user_name").val();
$("#user_name").css("border-color", "#ccc");
}
else
{
$("#user_name").css("border-color", "red");
$("#user_name").focus();
check="Fail";
}
//-----------------------------------
//-------------Problem Type-------------
if($("#user_email").val()!=""){
new_umail=$("#user_email").val();
$("#user_email").css("border-color", "#ccc");
}
else
{
$("#user_email").css("border-color", "red");
$("#user_email").focus();
check="Fail";
}
//-----------------------------------
//-------------Ticket Remark-------------
if($("#password").val()!=""){
new_upassword=$("#password").val();
$("#password").css("border-color", "#ccc");
}
else
{
$("#password").css("border-color", "red");
$("#password").focus();
check="Fail";
}
//------------------------------------


//-------------Client Address-------------
if($("#user_phone").val()!=""){
new_uphone=$("#user_phone").val();
$("#user_phone").css("border-color", "#ccc");
}
else
{
$("#user_phone").css("border-color", "red");
$("#user_phone").focus();
check="Fail";
}
//------------------------------------
if(check!="Fail"){
var mydata={
	user_name	        :new_uname,
	user_email	        :new_umail,
	password	        :new_upassword,
	user_phone	        :new_uphone	
};
$.ajax({
url: "<?php echo base_url(); ?>index.php/Users/Add_User",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
$("#user_name").val("");
$("#user_email").val("");
$("#password").val("");
$("#user_phone").val("");
}
});
//----------- Click on Delete Ticket------------------
function Delete_Users(uid){
	delete_confirm =confirm("Are you sure you want to delete this User? "+uid);
	if(delete_confirm == true){
	var mydata="";
$.ajax({
url: "<?php echo base_url(); ?>index.php/Users/Delete_User/"+uid,
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
function Fill_User(id){
$.ajax({
url: "<?php echo base_url(); ?>index.php/Users/Edit_User/"+id,
type: "POST",       
success: function(data) {
var data2 = $.parseJSON(data);	
$("#u_id").val(data2.user_id);
$("#u_name").val(data2.user_name);
$("#u_email").val(data2.user_email);
$("#u_password").val(data2.password);
$("#u_phone").val(data2.user_phone);
$("#u_power").val(data2.user_power);

$("#save_change").focus();		
}
});	
}
//------------------------------------	
</script>
<script>
//------Update Ticket Function----------
$("#save_ticket").click(function(){
var check="Pass";
var new_uid="";
var new_uname="";
var new_umail="";
var new_upassword="";
var new_uphone="";		
var new_upower="";		
//------------------------
if($("#u_id").val()!=""){
var new_uid=$("#u_id").val();
$("#u_id").css("border-color", "#ccc");
} else {
$("#u_id").css("border-color", "red");
$("#u_id").focus();
check="Fail";
}
if($("#u_name").val()!=""){
new_uname=$("#u_name").val();
$("#u_name").css("border-color", "#ccc");
} else {
$("#u_name").css("border-color", "red");
$("#u_name").focus();
check="Fail";
}
if($("#u_email").val()!=""){
new_umail=$("#u_email").val();
$("#u_email").css("border-color", "#ccc");
} else {
$("#u_email").css("border-color", "red");
$("#u_email").focus();
check="Fail";
}
if($("#u_password").val()!=""){
new_upassword=$("#u_password").val();
$("#u_password").css("border-color", "#ccc");
} else {
$("#u_password").css("border-color", "red");
$("#u_password").focus();
check="Fail";
}
if($("#u_phone").val()!=""){
new_uphone=$("#u_phone").val();
$("#u_phone").css("border-color", "#ccc");
} else {
$("#u_phone").css("border-color", "red");
$("#u_phone").focus();
check="Fail";
}
if($("#u_power").val()!=""){
new_upower=$("#u_power").val();
$("#u_power").css("border-color", "#ccc");
} else {
$("#u_power").css("border-color", "red");
$("#u_power").focus();
check="Fail";
}

//-----------------------------------
if(check!="Fail"){
var mydata={
	user_id             :new_uid,
	user_name	        :new_uname,
	user_email	        :new_umail,
	password	        :new_upassword,
	user_phone	        :new_uphone,
    user_power          :new_upower	
	};	
$.ajax({
url: "<?php echo base_url();?>index.php/Users/Update_User_Info",
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
$("#u_id").val("");
$("#u_name").val("");
$("#u_email").val("");
$("#u_password").val("");
$("#u_phone").val("");
$("#u_power").val("");

}
});
}	
});

</script>
<?php
$this->load->view('inc/Footer');
?>