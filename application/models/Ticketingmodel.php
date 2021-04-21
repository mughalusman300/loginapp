<?php

class Ticketingmodel extends CI_Model {
	public function Doublication_Check($cid,$problem){
	$DC_query ="SELECT * FROM ticket WHERE `entery_date` >= DATE_SUB(CURRENT_DATE(), INTERVAL 3 DAY) AND client_id=? AND problem=?";
	$res =  $this->db->query($DC_query,array($cid,$problem));
	return $res->num_rows();
	}
	
	public function Get_Ticket(){
		$query= "SELECT * FROM `ticket` INNER JOIN `client` on `client`.`client_id`= `ticket`.`client_id`";
		$res = $this->db->query($query);
		 return $res->result();
	}
	public function Get_Ticket_By_Id($tid){
	$query = "SELECT * FROM `ticket` INNER JOIN `client` on `client`.`client_id`=`ticket`.`client_id` WHERE `ticket_id`=?";
	$res = $this->db->query($query,array($tid));
	return $res->result_array();
	}
	public function Insert_Ticket($client, $problem, $ticket_remark,$user_id,$ticket_status){
	  $data=array(
	  'client_id' => $client,
	  'problem' => $problem,
	  'ticket_remark' => $ticket_remark,
	  'user_id' => $user_id,
	  'ticket_status' => $ticket_status
	  );	
	    $this->db->insert('ticket',$data);
		return $this->db->insert_id();
	}
	public function Delete_Ticket_By_Id($tid){ 
	$this->db->where('ticket_id', $tid);
	$this->db->delete('ticket');
	}
	public function Update_Ticket_By_Id($ticket_id,$client_id, $problem, $ticket_remark,$ticket_status){
	$data=array(
	  'ticket_id' => $ticket_id,
	  'client_id' => $client_id,
	  'problem' => $problem,
	  'ticket_remark' => $ticket_remark,
	  'ticket_status' => $ticket_status
	  );
	  $this->load->database();
	  $this->db->where('ticket_id',$ticket_id);
      $this->db->update('ticket',$data);	  
	}
	public function Update_Ticket_Status($ticket_id,$ticket_status){
	$data=array(
	  'ticket_id' => $ticket_id,
	  'ticket_status' => $ticket_status
	  );
	  $this->load->database();
	  $this->db->where('ticket_id',$ticket_id);
      $this->db->update('ticket',$data);	  
	}
	//---------------Tracking_Ticket Table-----------------
    public function Get_All_Ticket_Tracking_By_Ticket_id($tid){
	$query = "SELECT * FROM `tracking_ticket`  WHERE `ticket_id`=?";
	$res = $this->db->query($query,array($tid));
	return $res->result();
		
	}
	public function Get_Ticket_By_Id1($tid){
	$query = "SELECT * FROM `ticket` INNER JOIN `client` on `client`.`client_id`=`ticket`.`client_id` WHERE `ticket_id`=?";
	$res = $this->db->query($query,array($tid));
	return $res->result();
	}
	public function Get_Tracking_Ticket_By_Id($tracking_id){
	$query = "SELECT * FROM `tracking_ticket` INNER JOIN `ticket` on `ticket`.`ticket_id`=`tracking_ticket`.`ticket_id` WHERE `tracking_id`=?";
	$res = $this->db->query($query,array($tracking_id));
	return $res->result_array();
	}
	public function Insert_Tracking_Ticket($ticket_id, $problem,$tracking_status, $remark){
	  $data=array(
	  'ticket_id'  => $ticket_id,
	  'problem' => $problem,
	  'tracking_status' => $tracking_status,
	  'remark' => $remark,
	  'entry_date' => date('Y-m-d')

	  );	
	    $this->db->insert('tracking_ticket',$data);
	}
	public function Update_Tracking_Ticket_By_Id($tracking_id,$ticket_id, $problem,$ticket_status, $ticket_remark){
	$data=array(
	  'tracking_id'  =>$tracking_id,
	  'ticket_id' => $ticket_id,
	  'problem' => $problem,
	  'tracking_status' => $ticket_status,
	  'remark' => $ticket_remark
	  );
	  $this->load->database();
	  $this->db->where('tracking_id',$tracking_id);
      $this->db->update('tracking_ticket',$data);	  
	}
	public function Delete_Tracking_Ticket_By_Id($tid){ 
	$this->db->where('tracking_id', $tid);
	$this->db->delete('tracking_ticket');
	}	
	
}
