 <?php


class Clients extends CI_Controller {

	

	public function index()
	{
	$this->load->model('Packagemodel');
	$this->load->model('Clientmodel');		
	$data['client_data']=$this->Clientmodel->Get_Clients();	
	$data['package_data']=$this->Packagemodel->Get_Packages();
	$this->load->view('EnteryPanelFiles/EnteryClientView',$data);
    	
	}
	
	public function add_client(){
	$name=$this->input->post('cname');
	$phone=$this->input->post('cphone');
	$cnic=$this->input->post('ccnic');
	$mail=$this->input->post('cmail');
	$address=$this->input->post('caddress');
	$package=$this->input->post('cpackage');
	//-End------Get Values-------------	
	//----------Main Condition---------
	if($name!="" && $phone!=""  && $cnic!=""  && $mail!=""  && $address!=""  && $package!=0){
	$this->load->model('Clientmodel');	
	$check=$this->Clientmodel->Doublication_Check($cnic,$phone);
	//----------Sub Condition---------
	if($check==0){
    $id=$this->Clientmodel->Insert_Client($name,$phone,$cnic,$package,$mail,$address);
	$this->draw_client_main_table('ET');
	} else {
	echo"<tr style='background-color:red;color:white'>";	
	echo"<td>Duplicate</td>";
	echo"<td>Entery</td>";
	echo"<td>Found.</td>";
	echo"<td>This </td>";
	echo"<td>Phone number</td>";
	echo"<td>Or CNIC</td>";
	echo"<td>Already</td>";
	echo"<td>Exist</td>";
	echo"</tr>";	
	}
	//-End------Sub Condition---------
	} else {
	echo"<tr style='background-color:red;color:white'>";	
	echo"<td>Some</td>";
	echo"<td>Thing</td>";
	echo"<td>Went.</td>";
	echo"<td>Wrong </td>";
	echo"<td>Please</td>";
	echo"<td>Try</td>";
	echo"<td>Again</td>";
	echo"<td>.</td>";
	echo"</tr>";		
	}
	//-End------Main Condition---------
	}
	public function Edit_Client(){
	$cid =$this->uri->segment(3);
	$this->load->model('Clientmodel');		
    $data_ticket=$this->Clientmodel->Get_Client_By_Id($cid);
    $data_array= array();
	$data_array['client_id']        =$data_ticket[0]['client_id'];
	$data_array['client_name']      =$data_ticket[0]['client_name'];
	$data_array['client_phone']          =$data_ticket[0]['client_phone'];
	$data_array['client_cnic']    =$data_ticket[0]['client_cnic'];
	$data_array['package_id']      =$data_ticket[0]['package_id'];
	$data_array['package_name']      =$data_ticket[0]['package_name'];
	$data_array['client_mail']    =$data_ticket[0]['client_mail'];
	$data_array['client_address']    =$data_ticket[0]['client_address'];
	echo json_encode($data_array);
	}
		public function Update_Client(){
    $id      = $this->input->post('client_id');
    $name      = $this->input->post('client_name');
    $phone        = $this->input->post('client_phone');	
    $cnic  = $this->input->post('client_cnic');	
    $package  = $this->input->post('client_package');	
    $mail  = $this->input->post('client_mail');	
    $address  = $this->input->post('client_address');	
	$this->load->model('Clientmodel');		
    $ticket_data=$this->Clientmodel->Update_Client_By_Id($id,$name,$phone,$cnic,$package,$mail,$address);
	$this->draw_client_main_table();
	}
	
	public function Delete_Client_Row($cid){
	
	$this->load->model('Clientmodel');		
    $this->Clientmodel->Delete_Client_By_Id($cid);
    $this->draw_client_main_table();
	}		
		
	public function edit_call_center($id){
	//$this->load->model('CallCentermodel');	
	//$data['call_center_data']=$this->CallCentermodel->Get_Call_Center_Data_By_ID($id);	
	//$this->load->view('EnteryPanelFiles/EnteryEditCallCenterView',$data);	
	}
	
	public function draw_client_main_table(){
	$this->load->model('Clientmodel');	
	$client_data=$this->Clientmodel->Get_Clients();
	//-----------------------
	if(!empty($client_data)){
	foreach($client_data as $rows){
        echo"<tr>";	
		echo"<td><center>".$rows->client_id."</center></td>";
		echo"<td><center>".$rows->client_name."</center></td>";
		echo"<td><center>".$rows->client_phone."</center></td>";
		echo"<td><center>".$rows->client_mail."</center></td>";
		echo"<td><center>".$rows->client_cnic."</center></td>";
		echo"<td><center>".$rows->package_name."</center></td>";
		echo"<td><center>".$rows->client_address."</center></td>";
		echo"<td><center><a onclick=Delete_Client(".$rows->client_id.") class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a  data-toggle='modal' data-target='#Edit_Modal' onclick='Fill_Client(".$rows->client_id.")' class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>
		</center></td>";
		echo"</tr>";			
	}	
	}
	//-----------------------
	}

	
}
