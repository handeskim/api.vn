<?php

class Global_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->driver('cache');
	}

	public function query_global($sql){
     $query = $this->db->query($sql);
          return $query->result_array();
	}
	public function query_global2($sql){
     $query = $this->db->query($sql);
	 return $query;
	}
	
	public function convert_uid($params){
		$ArrayOut = array();
		foreach($params as $uid){
			$DbRedis = $this->redis->get($uid);
			if(!empty($DbRedis)){
				// $Pay = $this->PayScoreClients();
				// if($Pay==true){
					$ArrayOut[] = json_decode($DbRedis);
				// }else{
					// break;
				// }
			}else{
				$sql = "SELECT `uid`,`phone` FROM `vnphone` WHERE uid = '$uid' LIMIT 1";
				$query = $this->db->query($sql);
				$result = $query->result_array();
				if(!empty($result)){
					$this->redis->set($uid,json_encode($result));
					// $Pay = $this->PayScoreClients();
					// if($Pay==true){
						$ArrayOut[] = $result;
					// }else{
						// break;
					// }
					
				}
			}
		}
		return $ArrayOut;
	}
	
	public function ClientScoreTotal(){
		$user_data = $this->session->userdata('data_users');
		$uid = $user_data['id'];
		$level = $user_data['level'];
		if($level==1){
			//PayScore Actione
			$sql = "SELECT `score` FROM `users` WHERE id = '$uid' and `score` > 0 LIMIT 1";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if(!empty($result)){
					$score_old = (int)$result[0]['score'];
					return $score_old;
			}else{
				return 0;
			}
		}else{
			return 1000000;
		}
	}
	public function PayScoreClients(){
		$user_data = $this->session->userdata('data_users');
		$uid = $user_data['id'];
		$level = $user_data['level'];
		if($level==1){
			//PayScore Actione
			$sql = "SELECT `score` FROM `users` WHERE id = '$uid' and `score` >= 2 LIMIT 1";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if(!empty($result)){
					$score_old = (int)$result[0]['score'];
					$score_new = $score_old - 1;
					$PayCheck = $this->UpdateScroreClients($score_new);
					if($PayCheck ==true){
						return true;
					}else{
						return false;
					}
			}else{
				return false;
			}
		}else{
			return true;
		}
		
	}
	
	public function UpdateScroreClients($score){
		$user_data = $this->session->userdata('data_users');
		$userid = $user_data['id'];
		$this->db->trans_start();
			$dataUpdate = array('score' => $score,);
			$this->db->where('id', $userid);
			$status = $this->db->update('users', $dataUpdate); 
		$this->db->trans_complete();
		return $status;
		
	}
/////////////////// End Noi dung ////////////

}
?>