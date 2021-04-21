<?php


class Home extends CI_Controller {

	
	public function index()
	{
		$data['herd']="";
		$this->load->model("Homemodel");
		$data['clients']=$this->Homemodel->Count_Clients();
		$data['users']=$this->Homemodel->Count_Users();
		$data['tickets']=$this->Homemodel->Count_Tickets();
		$data['Initial']=$this->Homemodel->Total_Initiall_Complains();
		$data['Processing']=$this->Homemodel->Total_Processing_Complains();
		$data['Resolved']=$this->Homemodel->Total_Resolved_Complains();
		$data['Cancel']=$this->Homemodel->Total_Cancelled_Complains();
		$this->load->view('HomeView',$data);
		
	}


}
