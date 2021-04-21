<?php


class Ticketing extends CI_Controller {

	

	public function index()
	{
	$this->load->model('Clientmodel');		
	$data['client_data']=$this->Clientmodel->Get_Clients();	
	$this->load->model('Ticketingmodel');	
	$data['ticket_data']=$this->Ticketingmodel->Get_Ticket();	
	$this->load->view('EnteryPanelFiles/EnteryTicketingView',$data);
    	
	}
	
	public function Add_Ticket(){
    $c_id=$this->input->post('c_id');
	$problem=$this->input->post('problem');
	$ticket_remark=$this->input->post('ticket_remark');
	$uid=$_SESSION['UID'];
	$status=$this->input->post('status');
	$this->load->model('Ticketingmodel');
	$check=$this->Ticketingmodel->Doublication_Check($c_id,$problem);
	if($check==0){
	$id=$this->Ticketingmodel->Insert_Ticket($c_id,$problem,$ticket_remark,$uid,$status);
	$this->Ticketingmodel->Insert_Tracking_Ticket($id,$problem,$status,$ticket_remark);
	$this->Draw_Ticket_Table();
	}
	else{
	echo"<tr style='background-color:red;color:white'>";	
	echo"<td>Duplicate</td>";
	echo"<td>Entry</td>";
	echo"<td>Found.</td>";
	echo"<td>You Can</td>";
	echo"<td>Add</td>";
	echo"<td>Same Ticket</td>";
	echo"<td>After 3 Days </td>";	
	echo"</tr>";
	}
	}
	public function Edit_Ticket(){
	$tid =$this->uri->segment(3);
	$this->load->model('Ticketingmodel');
	$data['ticket']=$this->Ticketingmodel->Get_Ticket_By_Id($tid);
    $data_ticket=$this->Ticketingmodel->Get_Ticket_By_Id($tid);
    $data_array= array();
	$data_array['ticket_id']        =$data_ticket[0]['ticket_id'];
	$data_array['client_id']        =$data_ticket[0]['client_id'];
	$data_array['client_name']      =$data_ticket[0]['client_name'];
	$data_array['problem']          =$data_ticket[0]['problem'];
	$data_array['ticket_remark']    =$data_ticket[0]['ticket_remark'];
	$data_array['entery_date']      =$data_ticket[0]['entery_date'];
	$data_array['ticket_status']    =$data_ticket[0]['ticket_status'];
	echo json_encode($data_array);
	}
	public function Update_Ticket(){
	$tid            = $this->input->post('ticket_id');
    $client_id      = $this->input->post('client_id');
    $problem        = $this->input->post('problem');	
    $ticket_remark  = $this->input->post('ticket_remark');	
    $ticket_status  = $this->input->post('status');	
	$this->load->model('Ticketingmodel');		
    $ticket_data=$this->Ticketingmodel->Update_Ticket_By_Id($tid,$client_id,$problem,$ticket_remark,$ticket_status);
	$this->Draw_Ticket_Table();
	}
	
	public function Delete_Ticket($tid){
	
	$this->load->model('Ticketingmodel');		
    $this->Ticketingmodel->Delete_Ticket_By_Id($tid);
	$this->Draw_Ticket_Table();
	}	
	public function Draw_Ticket_Table(){
	$this->load->model('Ticketingmodel');	
	$data_ticket=$this->Ticketingmodel->Get_Ticket();
	//-----------------------
	$i=1;
		foreach($data_ticket as $rows){
		$source= $rows->entery_date;
		$date = new DateTime($source);
		$status=$rows->ticket_status;
		if($status=="Processing"){
		echo"<tr class='info'>";
		}
		elseif ($status=="Complaint Resolved"){
		echo "<tr class='success'>";
		} 
		elseif($status=="Cancel"){
		echo"<tr class='danger'>";
		}
		else{
			echo"<tr style='background-color:#f8f9fa'>";
		}	
		echo"<td width=3%><center><code>".$i."</code></center></td>";
		echo"<td width=10%><center>".$rows->client_name."</center></td>";
		echo"<td width=20%><center>".$rows->problem."</center></td>";
		echo"<td width=10%><center>".$rows->ticket_remark."</center></td>";
		echo"<td width=15%><center>";
	    echo $date->format('d/m/Y');
		echo "</center></td>";
		echo"<td width=20%><center>".$status."</center></td>";
		echo("<td width=17%><center><a onclick='Delete_Ticket(".$rows->ticket_id.")' class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#Edit_Modal' onclick=Fill_Ticket(".$rows->ticket_id.")  class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a>
		<a href='".base_url()."index.php/Ticketing/Ticketing_Details_View/".$rows->ticket_id."'  class='btn btn-primary btn-flat btn-xs'><i class='glyphicon glyphicon-credit-card'></i> History</a></center>");
		echo("</td>");
		echo"</tr>";
        $i++;			
		}
	}		
	//---------------------------------------------------
	//-----------Tracking Detail Module Start------------
    public function Ticketing_Details_View(){
	$ticket_id=$this->uri->segment(3);
	$this->load->model('Ticketingmodel');
	$data['ticket_details']=$this->Ticketingmodel->Get_All_Ticket_Tracking_By_Ticket_id($ticket_id);
	$data['client_details']=$this->Ticketingmodel->Get_Ticket_By_Id1($ticket_id);
	$this->load->view('EnteryPanelFiles/EnteryTicketingDetailView',$data);
	}	
	public function Add_Ticket_Tracking(){
    $t_id=$this->input->post('t_id');
	$problem=$this->input->post('problem');	
	$status=$this->input->post('status');
	$ticket_remark=$this->input->post('ticket_remark');
	$this->load->model('Ticketingmodel');
	$this->Ticketingmodel->Insert_Tracking_Ticket($t_id,$problem,$status,$ticket_remark);
	$this->Ticketingmodel->Update_Ticket_Status($t_id,$status);
	$this->Draw_Ticket_Tracking_Table($t_id);
	}
		public function Edit_Tracking_Ticket($tracking_id){
	$this->load->model('Ticketingmodel');		
    $data_ticket=$this->Ticketingmodel->Get_Tracking_Ticket_By_Id($tracking_id);
    $data_array= array();
	$data_array['tracking_id']        =$data_ticket[0]['tracking_id'];
	$data_array['ticket_id']        =$data_ticket[0]['ticket_id'];
	$data_array['problem']          =$data_ticket[0]['problem'];
	$data_array['tracking_status']    =$data_ticket[0]['tracking_status'];
	$data_array['remark']    =$data_ticket[0]['remark'];
	echo json_encode($data_array);
	}
	public function Update_Tracking_Ticket(){
	$tracking_id            = $this->input->post('tracking_id');	
	$t_id            = $this->input->post('ticket_id');
    $problem        = $this->input->post('problem');		
    $ticket_status  = $this->input->post('status');	
    $ticket_remark  = $this->input->post('ticket_remark');	
	$this->load->model('Ticketingmodel');		
    $ticket_data=$this->Ticketingmodel->Update_Tracking_Ticket_By_Id($tracking_id,$t_id,$problem,$ticket_status,$ticket_remark);
	$this->Draw_Ticket_Tracking_Table($t_id);
	}
	public function Delete_Tracking_Ticket($traking_id){
	$t_id=$this->uri->segment(4);	
	$this->load->model('Ticketingmodel');		
    $this->Ticketingmodel->Delete_Tracking_Ticket_By_Id($traking_id);
	$this->Draw_Ticket_Tracking_Table($t_id);
	}	
	
	public function Draw_Ticket_Tracking_Table($t_id){	
	$this->load->model('Ticketingmodel');	
	$ticket_tracking_detail=$this->Ticketingmodel->Get_All_Ticket_Tracking_By_Ticket_id($t_id);
	//-----------------------
	$i=1;
		foreach($ticket_tracking_detail as $rows){
        $source= $rows->entry_date;
		$date = new DateTime($source);
		$status=$rows->tracking_status;
		if($status=="Processing"){
		echo"<tr class='info'>";
		}
		elseif ($status=="Complaint Resolved"){
		echo "<tr class='success'>";
		} 
		elseif($status=="Cancel"){
		echo"<tr class='danger'>";
		}
		else{
			echo"<tr style='background-color:#f8f9fa'>";
		}		
		echo"<td><center><code>".$i."</code></center></td>";
		echo"<td><center>".$rows->problem."</center></td>";
		echo"<td><center>".$status."</center></td>";
		echo"<td><center>".$rows->remark."</center></td>";
		echo"<td width=15%><center>";
	    echo $date->format('d/m/Y');
		echo "</center></td>";
		echo("<td><center><a onclick=Delete_Ticket(".$rows->tracking_id.",'".$rows->ticket_id."') class='btn btn-danger btn-flat btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete</a>
		<a data-toggle='modal' data-target='#Edit_Modal' onclick=Fill_Ticket(".$rows->tracking_id.")  class='btn btn-info btn-flat btn-xs'><i class='glyphicon glyphicon-edit'></i> Edit</a></center>");
		echo("</td>");
		echo"</tr>";
        $i++;				
		}
	}		
	//---------------------------------------------------	
	
}
