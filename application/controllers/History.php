<?php


class History extends CI_Controller {

	

	public function index()
	{
	$this->load->model('Packagemodel');
	$this->load->model('Clientmodel');		
	$data['client_data']=$this->Clientmodel->Get_Clients();	
	$data['package_data']=$this->Packagemodel->Get_Packages();
	$this->load->view('History_View',$data);
    	
	}
	
	public function Show_Ticketing_By_Customer_Id($cid){
	$this->load->model('Historymodel');	
    $client_result=$this->Historymodel->Check_Client_Exist_In_Client($cid);	
	$ticket_result=$this->Historymodel->Check_Client_Exist_In_Ticket($cid);
	$payment_result=$this->Historymodel->Check_Client_Exist_In_Payment($cid);
	if($client_result =="done"){
    $data['client_result']=$this->Historymodel->Get_Client_By_Id($cid);	
	$this->load->view('History_Client_View',$data);
	}
	if($ticket_result =="done"){
    $data['ticket_result']=$this->Historymodel->Get_Clients_Ticketing_By_Client_id($cid);	
	$this->load->view('History_Ticketing_View',$data);
	}
	if($payment_result =="done"){
    $data['payment_result']=$this->Historymodel->Get_Payment_By_Client_id($cid);	
	$this->load->view('History_Payment_View',$data);
	}		
	}

	
	public function Show_Payment_By_Customer_Id($cid){
	$this->load->model('Historymodel');		
	$result=$this->Historymodel->Check_Client_Exist_In_Payment($cid);
	if($result=="done"){
	$data['result']=$this->Historymodel->Get_Payment_By_Client_id($cid);
	$this->load->view('History_Payment_View',$data);
	}else{
		      $this->session->set_flashdata('error','<div class="alert text-center">Record Not Found!</div>');
			  $this->load->view('Error_View');
			 }
		
	}
}
