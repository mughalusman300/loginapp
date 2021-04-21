<?php

class Loginmodel extends CI_Model {
    

	
	public function Get_User_Detail_By_Username($email){
	$GUDBU_query ="SELECT * FROM `users`  WHERE `user_email`=?";
	$res =  $this->db->query($GUDBU_query,array($email));
	$count=$res->num_rows();
	 if($count==1){
	foreach( $res->result() as $rows){
	$_SESSION['UID']=$rows->user_id;
	$_SESSION['NAME']=$rows->user_name;
    $_SESSION['POWER']=$rows->user_power;	
	     }	
	return $res->result();      
	}  	
		
}

}
