<?php

class Clientmodel extends CI_Model {
    	
	public function Doublication_Check($cnic,$phone){
	$DC_query ="SELECT * FROM `client` WHERE  `client_cnic`=? OR `client_phone`=?";
	$res =  $this->db->query($DC_query,array($cnic,$phone));
	return $res->num_rows();
	}
	
	public function Insert_Client($name,$phone,$cnic,$package,$mail,$address){
	$data = array(
	'client_name' 	=> $name,
	'client_phone'	=> $phone,
	'client_cnic' 	=> $cnic,
	'package_id'	=> $package,
	'client_mail'	=> $mail,
	'client_address'=> $address,
	'user_id'		=> $_SESSION['user_id'],
	'entery_token'	=> $_SESSION['entry_token']
	);
	$this->db->insert('client', $data);  
	return $this->db->insert_id();      
	}
	
	public function Update_Client_By_Id($id,$name,$phone,$cnic,$package,$mail,$address){
	$data = array(
	'client_id' 	=> 	$id,
	'client_name' 	=> $name,
	'client_phone'	=> $phone,
	'client_cnic' 	=> $cnic,
	'package_id'	=> $package,
	'client_mail'	=> $mail,
	'client_address'=> $address,
	);
	$this->db->where('client_id', $id);
	$this->db->update('client', $data); 
	return $this->db->affected_rows();      
	}
	
	public function Delete_Client_By_Id($id){ 
	$this->db->where('client_id', $id);
	$this->db->delete('client');
	}
	
	
	public function Get_Clients_Entry_Token(){
	$GCET_query ="SELECT * FROM `client` INNER JOIN `package` on `package`.`package_id`= `client`.`client_id` WHERE `entery_token`=? ORDER BY `client_id` DESC";
	$res =  $this->db->query($GCET_query,array($_SESSION['entry_token']));
	return $res->result();
	}
	 
	public function Get_Clients(){
	$GC_query ="SELECT * FROM `client` INNER JOIN `package` on `package`.`package_id`= `client`.`package_id` ORDER BY `client_id` DESC";
	$res =  $this->db->query($GC_query);
	return $res->result();
	}
		public function Get_Client_By_Id($id){
	$GC_query ="SELECT * FROM `client` INNER JOIN `package` on `package`.`package_id`= `client`.`package_id` WHERE `client_id`=?";
	$res =  $this->db->query($GC_query,array($id));
	return $res->result_array();
	}
	
}
