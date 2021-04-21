<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

	
	public function index()
	{
	    $this->load->model('Usersmodel');
		$data['Users']=$this->Usersmodel->Get_Users();
		$this->load->view('Users_View',$data);
	}
        public function Add_User()
	{
	       $user_name = $this->input->post('user_name'); 
           $user_email = $this->input->post('user_email'); 
           $password = $this->input->post('password'); 
           $user_phone = $this->input->post('user_phone');
           $user_power="USER";
           $this->load->model('Usersmodel');
		   $check=$this->Usersmodel->Doublication_Check($user_email,$user_phone);
		   if($check==0){
           $this->Usersmodel->Insert_User($user_name,$user_email,$password,$user_phone,$user_power);
	       $this->Draw_User_Table();
		   }
		   else{
			  echo"<tr style='background-color:red;color:white'>";	
	          echo"<td>Duplicate</td>";
	          echo"<td>Entry</td>";
	          echo"<td>Found.</td>";
	          echo"<td>Email</td>";
	          echo"<td>Or</td>";
	          echo"<td>Phone No</td>";
	          echo"<td>Already Exist</td>";	
	          echo"</tr>";
		   }
	}
        function Delete_User() {
            $user_id = $this->uri->segment(3);
            $this->load->model('Usersmodel');
            $this->Usersmodel->Delete_User_By_Id($user_id);
			$this->Draw_User_Table();
            
            
        }
        public function Edit_User() {
            
        $user_id=$this->uri->segment(3);
        $this->load->model('Usersmodel');
        $data_ticket=$this->Usersmodel->Get_User_By_Uid($user_id);
	    $data_array= array();
	    $data_array['user_id']        =$data_ticket[0]['user_id'];
	    $data_array['user_name']        =$data_ticket[0]['user_name'];
	    $data_array['user_email']          =$data_ticket[0]['user_email'];
	    $data_array['password']    =$data_ticket[0]['password'];
	    $data_array['user_phone']    =$data_ticket[0]['user_phone'];
		$data_array['user_power']    =$data_ticket[0]['user_power'];
	    echo json_encode($data_array);
        }
       public function Update_User_Info(){
           
           $user_id = $this->input->post('user_id'); 
           $user_name = $this->input->post('user_name'); 
           $user_email = $this->input->post('user_email'); 
           $password = $this->input->post('password'); 
           $user_phone = $this->input->post('user_phone');
           $user_power1 = $this->input->post('user_power');
		   $user_power=strtoupper($user_power1);
           $this->load->model('Usersmodel');
           $this->Usersmodel->Update_User($user_id,$user_name,$user_email,$password,$user_phone,$user_power);
           $this->Draw_User_Table();
           
       }
	public function Draw_User_Table(){
		$this->load->model('Usersmodel');
		$Users=$this->Usersmodel->Get_Users();
		if(!empty($Users)){
		foreach($Users as $rows){
		echo"<tr>";	
		echo"<td><center><code>".$rows->user_id."</code></center></td>";
		echo"<td class='info'><center>".$rows->user_name."</center></td>";
		echo"<td><center>".$rows->user_email."</center></td>";
		echo"<td><center>".$rows->password."</center></td>";
		echo"<td><center>".$rows->user_phone."</center></td>";
		echo"<td class='info'><center>".$rows->user_power."</center></td>";
		echo("<td><center><a onclick='Delete_Users(".$rows->user_id.")' class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#EditModal' onclick=Fill_User(".$rows->user_id.")  class='btn btn-primary btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a></center>");
		echo("</td>");
		echo"</tr>";			
		}
		}
	}

}
