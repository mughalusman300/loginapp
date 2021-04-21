<?php
error_reporting(0);
$this->load->view('inc/Header');
?>
<script>
$(document).ready(function(){
$('#MyTable').DataTable( {
"lengthMenu": [[ -1, 10, 25, 50], [ "All", 10, 25, 50]],
fixedHeader: true,
"searching": true,
"paging"   : false,
"ordering" : false,
"bInfo"	   : false,
dom: 'Blfrtip',
buttons: [
{
extend: 'pdfHtml5',
orientation: 'Portrait',
pageSize: 'A3',
footer: 'true',
title:"Station Wise Sale Report",
text:"<i class='glyphicon glyphicon-save-file'></i> PDF",
titleAttr: 'PDF',
message:"Saim Tech \n System Developer M.Saim \n Date:<?php echo ''.date('Y-m-d'); ?> \n Reports->Station Wise Sale Report \n "
},
{
extend: 'excelHtml5',
text:"<i class='glyphicon glyphicon-save-file'></i> Excel",
titleAttr: 'Excel',
heetName:'Station Wise Sale Report',
exportOptions: {
modifier: {
page: 'current'
}
}
},
{
extend: 'copyHtml5',
footer: 'true',
text:"<i class='glyphicon glyphicon-copy'></i> Copy",
titleAttr: 'Copy'
},
{
extend: 'print',
text:"<i class='glyphicon glyphicon-print'></i> Print",
titleAttr: 'Print',
footer: 'true',
title:"Station Wise Sale Report",
message:"Saim Tech <br> System Developer M.Saim <br> Date:<?php echo ''.date('Y-m-d'); ?> <br> Reports->Station Wise Sale Report <br><br>"
}
] 
			
});

//--------------------------------------------------------
});
</script>

<section class="content-header">
      <h1>
      Reports 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reports</a></li>
        <li class="active">Station Wise Sale Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-info color-palette-box">
        <div class="box-header with-border" style="background-color:#f9f2ea">
          <h3 class="box-title"><i class="fa fa-tag"></i>Station Wise Sale Report</h3>
		    <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
              </div>
		          </div>
        <div class="box-body">
		
			<center>
		<div style="width:40%">
		<div class="box box-primary" style="background-color:#f9f2ea">
            	<div class="box-header with-border">
              <h3 class="box-title">Give Date Range</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/StationWiseSaleReport/submit_form">
              <div class="box-body" style="background-color:#f9f2ea" >
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" <?php if($start_date!=""){echo ("value='".$start_date."'");} else { echo ("value='".date('Y-m-d')."'");}   ?>  name="start_date" required="required">
                  </div>
                </div>
	
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Select City</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="city" name="city">
					 <?php if($city!=""){?><option><?php echo $city; ?></option><?php } ?>
					<option value="Lahore">Lahore</option>
					<option value="Multan">Multan</option>
					<option value="Islamabad">Islamabad</option>
					</select>
                  </div>
                </div>
				</div>
              <!-- /.box-body -->
              <div class="box-footer" style="background-color:#f9f2ea">
                <button type="submit" class="btn btn-info pull-right">Go</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		</center>
		
		<?php if(!empty($sale_data)){ ?>
		<div class="box-header with-border col-md-12"  >
		<div class="table-responsive"> 	
		
		 <table class="table table-bordered table-hover table-striped dataTable" id="MyTable" style="font-size:13px ">
		 <thead>
		<tr style='background-color:#f9f2ea'>
		<th><center>Date</center></th>
		<th><center>Station</center></th>
		<th><center>City</center></th> 
		<th><center>Booth Sale</center></th>
		<th><center>TVM Sale</center></th>
		<th><center>TVM Cash Withheld</center></th>
		<th><center>Same Day Cash</center></th>
		<th><center>Previous Day Cash</center></th>
		<th><center>Net Cash Reported</center></th>
		<th><center>Terminal Sale</center></th>
		<th><center>Card Sale</center></th>
		<th><center>Recovery</center></th>
		<th><center>Diff</center></th>
		<th><center>Action</center></th>
		</tr>
		</thead>
		<tbody id="auto-load">
		<?php if(!empty($sale_data)){
		foreach($sale_data as $rows){
		$diff=(($rows->card_sale)+($rows->terminal_sale))-(($rows->net_cash_reported)+($rows->recovery));	
		echo "<tr style='color:#000000;'>";
		echo "<td><center>".$rows->date."</center></td>";
		echo "<td><center>".$rows->station."</center></td>";
		echo "<td><center>".$rows->city."</center></td>";
		echo "<td><center>".$rows->booth_sale."</center></td>";
		echo "<td><center>".$rows->tvm_sale."</center></td>";
		echo "<td><center>".$rows->tvm_cash_withheld."</center></td>";
		echo "<td><center>".$rows->same_day_cash."</center></td>";
		echo "<td><center>".$rows->prev_day_cash."</center></td>";
		echo "<td><center>".$rows->net_cash_reported."</center></td>";
		echo "<td><center>".$rows->terminal_sale."</center></td>";
		echo "<td><center>".$rows->card_sale."</center></td>";
		echo "<td><center>".$rows->recovery."-(".$rows->comment.")</center></td>";
		echo "<td><center >".$diff."</center></td>";
		echo "<td><center><button onclick='fill_model(".$rows->station_wise_report_id.",".$rows->recovery.")'  class='btn btn-info btn-xs'  data-toggle='modal' data-target='#myModal'>Update</button></center></td>";
		echo "</tr>";
		} } ?>
		</tbody>
		</table>
			</div>		
            <!-- /.box-body -->
          </div>
        <!-- /.box-body -->
		
		
		
		
		
		
        <!-- /.box-body -->
<?php } ?>
	  	  
	  </div>
	  </section>
		
    <!-- /.content -->

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#f9f2ea">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title id="myModalLabel">Add Recovery</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
                <label>Recovery:</label>
                <input type="number" class="form-control" tabindex="1" name="recovery" placeholder="Enter Recovery Value" id="recovery" required="required">
				<input type="hidden"  name="report_id"  id="report_id" required="required">
				</div>	
				
				
				<div class="form-group">
                <label>Comment:</label>
                <textarea class="form-control" tabindex="2" name="comment" id="comment" required="required"></textarea>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="update-recovery">Update changes</button>
      </div>
    </div>
  </div>
</div>
	
	<script>
	function fill_model(id,recovery){
	$("#report_id").val("");	
	$("#report_id").val(id);
	$("#recovery").val("");	
	$("#recovery").val(recovery);
	}
	$("#update-recovery").click(function() {
	var check="Pass";
	var report_id=$("#report_id").val();
	var recovery="";
	var comments=$("#comment").val();
	//------------Lot_id------------
	if($("#recovery").val()!=""){
	recovery=$("#recovery").val();
	$("#recovery").css("border-color", "#ccc");
	}
	else
	{
	$("#recovery").css("border-color", "red");
	$("#recovery").focus();
	check="Fail";	
	}
	//-----------------------------------
	if(check!="Fail"){
	var mydata={
	recovery: recovery,
	report_id: report_id,
	comments:comments	
	};
	$.ajax({
	url: "<?php echo base_url(); ?>index.php/StationWiseSaleReport/update_recovery",
	type: "POST",
	data: mydata,        
	success: function(data) {
	$("#auto-load").html(data);
	}
	});
	$('#myModal').modal('hide');
	$("#report_id").val("");
	$("#recovery").val("");
	$("#comment").val("");
	}	
	});	
	</script>
	
<?php
$this->load->view('inc/Footer');
?>

