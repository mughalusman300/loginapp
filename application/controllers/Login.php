<?php


class Login extends CI_Controller {

	
	public function index()
	{
	$this->load->view('LoginView');	
	}
	
	public function process_login(){
	$email=$this->input->post('email');
	$password=$this->input->post('password');
	if($email!="" && $password!=""){
	$this->load->model('Loginmodel');
	$user_data=$this->Loginmodel->Get_User_Detail_By_Username($email);
	if(!empty($user_data)){
	foreach($user_data as $row){	
	$userid=$row->user_id;
	$username=$row->user_name;
	$useremail=$row->user_email;
	$userpower=$row->user_power;
	$userpassword=$row->password;
	if($userpassword==$password){
	$this->load->library('session');
    $_SESSION['user_id']	= $userid;
	$_SESSION['entry_token']=rand(100000,9999999);
    $_SESSION['user_name']	= $username;
	$_SESSION['user_mail']	= $useremail;
	$_SESSION['user_power']	= $userpower;
	redirect('Home');
	} else {
	$data['error']="YN";	
	$this->load->view('LoginView',$data);	
	}
	}
	} else {
	$data['error']="Y";	
	$this->load->view('LoginView',$data);		
	}
	} else {
	$data['error']="Z";	
	$this->load->view('LoginView',$data);			
	}	
	}
	

	public function Logout(){
	$this->load->library('session');
    session_destroy();
    $data['error']="N";	
	$this->load->view('LoginView',$data);
	   
   }
	


}
