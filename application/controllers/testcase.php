<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testcase extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('client');
		$this->load->library('rest');
		$this->key = keys();
		$this->secret_key = clients_secret();
		$this->clients_app = clients_app();
		$config =  array('server' => 'http://api.vn/api',);
		$this->rest->initialize($config);
		$this->token_input = "eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJjb25zdW1lcktleSI6IjNlM2I2MGNiNDNmN2I1MjFhZTYzMTk1NjY0MDY0OWU2IiwidXNlcklEIjoiOCIsInBhcmFtcyI6IntcInNlY3JldF9rZXlcIjpcIk5hOHNxdlRObmRpdWRSNERlZHRCRVBLVTRIZXVkQnpEZmVDN1g2aDFaZlE1XCIsXCJwYXJhbXNfcmVzdWx0c1wiOlt7XCJpZFwiOlwiOFwiLFwibmFtZVwiOlwiaGFuZGVza1wiLFwiY2xpZW50c19jb2RlXCI6XCJISzAwOFwiLFwidXNlcm5hbWVcIjpcImhhbmRlc2tcIixcInBhc3N3b3Jkc1wiOlwiMmY2ZDIyOGIyN2NiODRlOWZiNGFjNGUwYmEzOTNjOGJcIixcImV4cGlyZWRcIjpcIjIwMTgtMDUtMTJcIixcInNjb3JlXCI6XCIwXCIsXCJyb2xlXCI6XCIzXCIsXCJzdGF0dXNcIjpcIjFcIixcImxldmVsXCI6XCIyXCIsXCJyZXNlbGxlclwiOlwiMFwifV19IiwiaXNzdWVkQXQiOiIyMDE4LTAxLTE2VDAyOjI3OjI1KzA3MDAiLCJ0dGwiOjcyMDB9.e-RwpJbX8fCt2o9LbygYKmzXxEC2CpG4tUgiulK9zgw";
		
	}
	public function index(){
		
		
		$response = $this->rest->get('/index');
		echo "<pre>";
		print_r($response);
		echo "</pre>";
		
	
	}
	
	public function Token(){
		$param_Encrypt = array(
			'data' => array(
				'account' => 'handesk',
				'password' => '123123fF',
				'role' => true,
			),
			'secret_key' => $this->encrypt->encode($this->secret_key,$this->key),
			'app_id' => $this->encrypt->encode($this->clients_app,$this->key),
		);
		$response = $this->rest->post('/Token',$param_Encrypt);
		var_dump($response);
	}
	public function TokenCheck(){
		$param_TokenCheck = array(
			'token' => $this->token_input,
		);
		$response = $this->rest->post('/TokenCheck',$param_TokenCheck);
		var_dump($response);
	}
	
	public function Info(){
		$param_Info = array(
			'token' => $this->token_input,
		);
		$response = $this->rest->post('/Info',$param_Info);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
	}	
	public function ClientInfo(){
		$param_Info = array(
			'token' => $this->token_input,
			'data' => 'HK009',
		);
		$response = $this->rest->post('/ClientInfo',$param_Info);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
	}
	
	public function ResellerInfo(){
		$param_Info = array(
			'token' => $this->token_input,
		);
		$response = $this->rest->post('/ResellerInfo',$param_Info);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
	}
	
	public function Register(){
		$param_Info = array(
			'token' => $this->token_input,
			'data' => array(
				'email' => 'handeskim@gmail.com',
				'password' => '1234567890',
			),
		);
		$response = $this->rest->post('/Register',$param_Info);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
	}

	public function Transfer(){
		$param_Transfer = array(
			'token' => $this->token_input,
			'data' => array(
				'transfer_to' => 'VNP0820',
				'transfer_Point' => '30000',
			),
		);
		$response = $this->rest->post('/Transfer',$param_Transfer);
		// $this->key = clients_secret();
		// $DeCryptReponse = decrypt_key($response->data,$this->key);
		// var_dump(json_decode($DeCryptReponse,true));
		var_dump($response);
	}

}
?>