<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#MyTable').saimtech();
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
      <i class="fas fa-history"></i> History Panel</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class= "row">
	  <div class="col-md-5">
      <div class="box box-info color-palette-box">
       <div class="box-header with-border bg-primary"style="color: white;">
          <h3 class="box-title"> 
		  <i class='glyphicon glyphicon-user' ></i>
		   Clients: 
		  </h3>
		
        </div>
		<div class="box-body">

  <div class="row">
    <div class="col-sm-12">
	<center><h4>HISTORY Of Ticketing And Payment</h4></center>
      <div class="box box-info">
              <div class="box-body">
			  <center><div style="width:50%">
			  </div></center>
			 
         <div class="table-responsive span3">
		<table class="table  table-bordered table-hover" id="MyTable">
		<thead class="bg-primary" style="font-size: 15px;">
		<td><center>#</center></td>
		<td><center><i class=' glyphicon glyphicon-user' ></i> Client Name</center></td>
		<td><center><i class="fas fa-eye"></i> Action</center></td>
		</thead>
		<tbody>
		<?php if(!empty($client_data)){
		$i=1;
		foreach($client_data as $rows){
		echo"<tr>";	
		echo"<td width=10%><center><code>".$i."</code></center></td>";
		echo"<td width=50%><center>".$rows->client_name."<br><i class='glyphicon glyphicon-phone'></i> ".$rows->client_phone."</center></td>";
		echo"<td style='padding:15px;' width=40%><center><a  onclick='Client_Ticketing(".$rows->client_id.")' class='btn btn-primary btn-flat btn-xs'><i class='glyphicon glyphicon-credit-card'></i> History</a>
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

      
    </div><!-- /.col -->
  </div>


                  </div>
        <!-- /.box-body --> 
      </div><!----Col-md-4 end---->	

	  <div id="auto-load" class="col-md-7">
	  </div>
	  
	  </div>		  
	  </div><!---Row----->
	  </section>
    <!-- /.content -->


<script>

//----------- Click on SAVE button TO Open Ticketing View------------------
function Client_Ticketing(id) {
var mydata="";	
$.ajax({
url: "<?php echo base_url(); ?>index.php/History/Show_Ticketing_By_Customer_Id/"+id,
type: "POST",
data: mydata,        
success: function(data) {
$("#auto-load").html(data);
}
});
}



</script>
<?php
$this->load->view('inc/Footer');
?>