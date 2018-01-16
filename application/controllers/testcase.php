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
		$this->token_input =  "yJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJjb25zdW1lcktleSI6IjNlM2I2MGNiNDNmN2I1MjFhZTYzMTk1NjY0MDY0OWU2IiwidXNlcklEIjoiOCIsInBhcmFtcyI6IntcInNlY3JldF9rZXlcIjpcIk5hOHNxdlRObmRpdWRSNERlZHRCRVBLVTRIZXVkQnpEZmVDN1g2aDFaZlE1XCIsXCJwYXJhbXNfcmVzdWx0c1wiOlt7XCJpZFwiOlwiOFwiLFwibmFtZVwiOlwiaGFuZGVza1wiLFwiY2xpZW50c19jb2RlXCI6XCJISzAwOFwiLFwidXNlcm5hbWVcIjpcImhhbmRlc2tcIixcInBhc3N3b3Jkc1wiOlwiMmY2ZDIyOGIyN2NiODRlOWZiNGFjNGUwYmEzOTNjOGJcIixcImV4cGlyZWRcIjpcIjIwMTgtMDUtMTJcIixcInNjb3JlXCI6XCI1NDE1XCIsXCJyb2xlXCI6XCIzXCIsXCJzdGF0dXNcIjpcIjFcIixcImxldmVsXCI6XCIxXCIsXCJyZXNlbGxlclwiOlwiN1wifV19IiwiaXNzdWVkQXQiOiIyMDE4LTAxLTE3VDA2OjMzOjQyKzA3MDAiLCJ0dGwiOjcyMDB9.V7tq1UXJIBU1pFmtyTAMh-k9Rbl9NHe3sR2BPEIZgaw" ;
		
	}
	public function index(){
		
		
		$response = $this->rest->get('/index');
		echo "<pre>";
		print_r($response);
		echo "</pre>";
		
	
	}
	public function History(){
		$param_History = array(
			'token' => $this->token_input,
		);
		$response = $this->rest->post('/History',$param_History);
		// $this->key = clients_secret();
		// $DeCryptReponse = decrypt_key($response->data,$this->key);
		// var_dump(json_decode($DeCryptReponse,true));
		var_dump($response);
	}
	public function Convert(){
		$param_Info = array(
			'token' => $this->token_input,
			'data' => json_encode($this->UID()),
		);
		$response = $this->rest->post('/Convert',$param_Info);
		// $this->key = clients_secret();
		// $DeCryptReponse = decrypt_key($response->data,$this->key);
		// var_dump(json_decode($DeCryptReponse,true));
		echo "<pre>";
		var_dump($response);
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
	public function Cached(){
		$param_TokenCheck = array(
			'token' => $this->token_input,
		);
		$response = $this->rest->post('/Cached',$param_TokenCheck);
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
				'email' => 'handeskism@gmail.com',
				'password' => '1234567890',
			),
		);
		$response = $this->rest->post('/Register',$param_Info);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
		// var_dump($response);
	}

	public function Transfer(){
		$param_Transfer = array(
			'token' => $this->token_input,
			'data' => array(
				'transfer_to' => 'VNP0820',
				'transfer_point' => '30000',
			),
		);
		$response = $this->rest->post('/Transfer',$param_Transfer);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
		// var_dump($response);
	}

	public function Pendding(){
		$param_Transfer = array(
			'token' => $this->token_input,
			'data' => array(
				'account' => 'HK010',
			),
		);
		$response = $this->rest->post('/Pending',$param_Transfer);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
		// var_dump($response);
	}

	public function Active(){
		$param_Transfer = array(
			'token' => $this->token_input,
			'data' => array(
				'account' => 'HK010',
			),
		);
		$response = $this->rest->post('/Active',$param_Transfer);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
		// var_dump($response);
	}

	public function Destroy(){
		$param_Transfer = array(
			'token' => $this->token_input,
			'data' => array(
				'account' => 'VNP08R22',
			),
		);
		$response = $this->rest->post('/Destroy',$param_Transfer);
		$this->key = clients_secret();
		$DeCryptReponse = decrypt_key($response->data,$this->key);
		var_dump(json_decode($DeCryptReponse,true));
		// var_dump($response);
	}

	private function UID(){
		$array = array(
			'100003199137965',
			'100005416950881',
			'100007298405900',
			'100006700771745',
			'100004824642488',
			'100004861119914',
			'100011290934640',
			'100006640598632',
			'100008352873700',
			'100013266345213',
		);

		return $array;
	}
}
?>