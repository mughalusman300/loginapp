<?php

class Paymentmodel extends CI_Model {
	public function Doublication_Check($cid){
	$DC_query ="SELECT * FROM payment WHERE MONTH(entery_date) = MONTH(CURRENT_DATE()) AND  YEAR(entery_date) = YEAR(CURRENT_DATE()) AND client_id=?";
	$res =  $this->db->query($DC_query,array($cid));
	return $res->num_rows();
	}
	
	public function Get_Package_By_Client_Id($client_id){
		$query ="SELECT * FROM `client` INNER JOIN `package` on `package`.`package_id`=`client`.`package_id` WHERE client_id=?";
	$res =  $this->db->query($query,array($client_id));
	return $res->result();
	}
	public function Insert_Payment($client,$date,$amount,$package_id,$remark,$user_id){
	$data = array(
	'bill_no'	=> $_SESSION['bill_no'],
	'client_id' 	=> $client, 
	'payment_date'	=> $date,
	'payment_amount'=> $amount,
	'package_id'	=> $package_id,
	'payment_remark'=> $remark,
	'user_id'		=> $user_id,
	'entery_date'	=> date('Y-m-d')
	);
	$this->db->insert('payment', $data);  
	return $this->db->insert_id();      
	}
	
	public function Update_Payment_By_Id($id,$client,$date,$amount,$package,$remark){
	$data = array(
	'payment_id'    => $id,
	'client_id' 	=> $client,
	'payment_date'	=> $date,
	'payment_amount'=> $amount,
	'package_id'	=> $package,
	'payment_remark'=> $remark,
	
	);
	$this->db->where('payment_id', $id);
	$this->db->update('payment', $data); 
	return $this->db->affected_rows();      
	}
	
	public function Delete_Payment_By_Id($id){ 
	$this->db->where('payment_id', $id);
	$this->db->delete('payment');
	}
	
	
	public function Get_Payment_Entry_Token(){
	$GPET_query ="SELECT * FROM `payment` INNER JOIN `package` on `package`.`package_id`= `payment`.`payment_id` WHERE `entery_token`=? ORDER BY `client_id` DESC";
	$res =  $this->db->query($GPET_query,array($_SESSION['entry_token']));
	return $res->result();
	}
	
	public function Get_Payment(){
	$GP_query ="SELECT * 
	           FROM(((`payment`
		     LEFT JOIN `client` on `client`.`client_id`=`payment`.`client_id`)
			 LEFT JOIN `users` on `users`.`user_id`=`payment`.`user_id`)
		     LEFT JOIN `package` on `package`.`package_id`=`payment`.`package_id`) ORDER BY payment_id";
	$res =  $this->db->query($GP_query);
	return $res->result();
	}
	public function Get_Payment_By_Id($payment_id){
	$GP_query ="SELECT * 
	           FROM(((`payment`
		     LEFT JOIN `client` on `client`.`client_id`=`payment`.`client_id`)
			 LEFT JOIN `users` on `users`.`user_id`=`payment`.`user_id`)
		     LEFT JOIN `package` on `package`.`package_id`=`payment`.`package_id`) WHERE payment_id=?";
	$res =  $this->db->query($GP_query,array($payment_id));
	return $res->result_array();
	}
	public function Get_Packages(){
	$GP_query ="SELECT * FROM `package`";
	$res =  $this->db->query($GP_query);
	return $res->result();
	}
}
