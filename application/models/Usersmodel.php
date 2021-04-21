<?php
class Usersmodel extends CI_Model {
	public function Doublication_Check($email,$phon_no){
	$DC_query ="SELECT * FROM users WHERE user_email=? OR user_phone=?";
	$res =  $this->db->query($DC_query,array($email,$phon_no));
	return $res->num_rows();
	}
	
	public function Get_Users(){
		$query = "SELECT * FROM users";
		  $res = $this->db->query($query);
		  return $res->result();
	}
	public function Get_User_By_Uid($uid){
		$query = "SELECT * FROM users WHERE user_id=?";
		  $res = $this->db->query($query,array($uid));
		  return $res->result_array();
	}
	public function Insert_User($user_name,$user_email,$password,$user_phone,$user_power){
		$data =array(
		 'user_name'=> $user_name,
		 'user_email'=> $user_email,
		 'password'=> $password,
		 'user_phone'=> $user_phone,
         'user_power'=> $user_power
		);
		$this->db->insert('users',$data);
		
		
	}
	
		
		public function Update_User($user_id,$user_name,$user_email,$password,$user_phone,$user_power){
			$data =array(
         'user_id'=> $user_id,          
		 'user_name'=> $user_name,
		 'user_email'=> $user_email,
		 'password'=> $password,
		 'user_phone'=> $user_phone,
		 'user_power' => $user_power
                 );

                 $this->load->database();
                 $this->db->where('user_id', $user_id);
                 $this->db->update('users', $data);

		}
	
		function Delete_User_By_Id($id){
            $this->db->where('user_id', $id);
            $this->db->delete('users');
            }
		function Delete_Order_Detail_By_Id($id){
			$this->db->where('tracking_id', $id);
            $this->db->delete('orders_tracking');
			
		}

}

