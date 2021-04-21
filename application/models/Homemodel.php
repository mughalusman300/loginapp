<?php
class Homemodel extends CI_Model {
	
	public function Count_Clients(){
       $query = $this->db->get('client');
           return $query->num_rows();

   }
   	public function Count_Users(){
       $query = $this->db->get('users');
           return $query->num_rows();

   }
  public function Count_Tickets(){
       $query = $this->db->get('ticket');
           return $query->num_rows();

   }
  public function Complain_Processing_Complain(){
	  $this->db->where('tracking_status=','Processing');
       $query = $this->db->get('tracking_ticket');
	            
           return $query->num_rows();

     }

     public function in_Processing_Complain(){
		$DC_query ="SELECT max(`entry_date`) FROM `ticket` INNER JOIN tracking_ticket on `tracking_ticket`.`ticket_id`=`ticket`.`ticket_id`  WHERE  `tracking_status`=`Processing`";
	$res =  $this->db->query($DC_query);
	return $res->num_rows();
	}
	public function Total_Processing_Complains(){
    $DC_query ="SELECT * FROM `ticket`  WHERE  `ticket_status`='Processing'";
	$res =  $this->db->query($DC_query);
	return $res->num_rows();
	}
	public function Total_Initiall_Complains(){
    $DC_query ="SELECT * FROM `ticket`  WHERE  `ticket_status`='Initialized'";
	$res =  $this->db->query($DC_query);
	return $res->num_rows();
	}
	public function Total_Resolved_Complains(){
    $DC_query ="SELECT * FROM `ticket`  WHERE  `ticket_status`='Complaint Resolved'";
	$res =  $this->db->query($DC_query);
	return $res->num_rows();
	}
	public function Total_Cancelled_Complains(){
    $DC_query ="SELECT * FROM `ticket`  WHERE  `ticket_status`='Cancel'";
	$res =  $this->db->query($DC_query);
	return $res->num_rows();
	}

}