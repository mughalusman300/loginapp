<?php

 
class Payment extends CI_Controller {

	

	public function index()
	{
	$this->load->model('Clientmodel');		
	$data['client_data']=$this->Clientmodel->Get_Clients();	
	$this->load->model('Paymentmodel');
	$data['package_data']=$this->Paymentmodel->Get_Packages();
	$data['payment_data']=$this->Paymentmodel->Get_Payment();
	$this->load->view('EnteryPanelFiles/EnteryPaymentView',$data);
    	
	}
	public function Package_By_Client_Id(){
		
	$client_id=$this->input->post('client_id');
	$this->load->model('Paymentmodel');
	$package=$this->Paymentmodel->Get_Package_By_Client_Id($client_id);
	//echo"<pre>";print_r($package);echo"</pre>";

	echo "<select class='form-control' id='pk' required='required'>";
	foreach($package as $rows){
	echo "<option value='".$rows->package_id."'>".$rows->package_name."</option>";
	echo "</select>";

	}
	}
	
	public function add_payment(){
	$this->load->library('session');
	$start=rand();
	$end =rand();				
	$_SESSION['bill_no'] = rand($start,$end);	
	$client_id=$this->input->post('client_id');
	$package_id=$this->input->post('package_id');
	$payment_amount=$this->input->post('payment_amount');
	$payment_date=$this->input->post('payment_date');
	$payment_remark=$this->input->post('payment_remark');
	$user_id=$_SESSION['UID'];
	if($_SESSION['UID']!=""){
	if($client_id!="" && $package_id!="" && $payment_amount!="" && $payment_date!="" && $payment_remark!="" && $user_id!="")
	 {	
	    $this->load->model('Paymentmodel');	
	    $check=$this->Paymentmodel->Doublication_Check($client_id);
	    if($check==0){
         $this->Paymentmodel->Insert_Payment($client_id,$payment_date,$payment_amount,$package_id,$payment_remark,$user_id);
	     $this->draw_client_main_table();
	                 }
	                  else{
	                        echo"<tr style='background-color:red;color:white'>";	
	                        echo"<td><center>Duplicate</center></td>";
	                        echo"<td><center>Entery</center></td>";
                            echo"<td><center>Found.</center></td>";
	                        echo"<td><center>Payment</center></td>";
	                        echo"<td><center>Already</center></td>";
	                        echo"<td><center>Payed</center></td>";
	                        echo"<td><center>For</center></td>";
	                        echo"<td><center>This</center></td>";
	                        echo"<td><center>Month</center></td>";	
	                        echo"</tr>";
	                      }
	 }
	 else{
		 echo"<tr style='background-color:red;color:white'>";	
	     echo"<td><center>Somthing</center></td>";
	     echo"<td><center>Went</center></td>";
         echo"<td><center>Wrong.</center></td>";
	     echo"<td><center>Please</center></td>";
	     echo"<td><center>Try</center></td>";
	     echo"<td><center>Again</center></td>";
	     echo"<td><center>Later.</center></td>";
	     echo"<td><center>Thank</center></td>";
	     echo"<td><center>You</center></td>";	
	     echo"</tr>";
	     }
	}	 
		 else{
		echo"<tr style='background-color:red;color:white'><td><center>Please Login First</center></td></tr>";
	}
	}
	public function Edit_Payment(){
	$pid =$this->uri->segment(3);
	$this->load->model('Paymentmodel');		
    $data_ticket=$this->Paymentmodel->Get_Payment_By_Id($pid);
    $data_array= array();
	$data_array['payment_id']        =$data_ticket[0]['payment_id'];
	$data_array['client_id']        =$data_ticket[0]['client_id'];
	$data_array['client_name']      =$data_ticket[0]['client_name'];
	$data_array['package_id']    =$data_ticket[0]['package_id'];
	$data_array['package_name']    =$data_ticket[0]['package_name'];
	$data_array['payment_date']          =$data_ticket[0]['payment_date'];
	$data_array['payment_amount']          =$data_ticket[0]['payment_amount'];
	$data_array['payment_remark']      =$data_ticket[0]['payment_remark'];
	echo json_encode($data_array);
	}
	public function Update_Payment(){
    $pid      = $this->input->post('payment_id');
    $client      = $this->input->post('client_id');
    $date        = $this->input->post('payment_date');	
    $amount  = $this->input->post('payment_amount');	
    $package  = $this->input->post('package_id');	
    $remark  = $this->input->post('remark');	
	$this->load->model('Paymentmodel');		
    $ticket_data=$this->Paymentmodel->Update_Payment_By_Id($pid,$client,$date,$amount,$package,$remark);
	$this->draw_client_main_table();
	}

	
	
	public function Delete_Payment($pid){
	
	$this->load->model('Paymentmodel');		
    $this->Paymentmodel->Delete_Payment_By_Id($pid);
	$this->draw_client_main_table();
	}		
		
	public function edit_call_center($id){
	//$this->load->model('CallCentermodel');	
	//$data['call_center_data']=$this->CallCentermodel->Get_Call_Center_Data_By_ID($id);	
	//$this->load->view('EnteryPanelFiles/EnteryEditCallCenterView',$data);	
	}
	
	public function draw_client_main_table(){
	$this->load->model('Paymentmodel');	
	$payment_data=$this->Paymentmodel->Get_Payment();
	//-----------------------
	$i=1;
	foreach($payment_data as $rows){
		echo"<tr>";	
		echo"<td><center>".$i.".</center></td>";
		echo"<td><center><code>".$rows->bill_no."</code></center></td>";
		echo"<td><center>".$rows->client_name."</center></td>";
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
		}
	//-----------------------
	}

	
}
