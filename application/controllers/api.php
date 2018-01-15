<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {
	
	function __construct(){
		parent::__construct();
		$this->key = keys();
		
	}
	
	public function Pending_post(){
		
	}
	public function Destroy_post(){
		
	}
	
	
	public function Convert_post(){
		
	}
	public function History_post(){
		
	}

	public function Transfer_post(){
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					if(isset($_POST['data'])){
						$data = $_POST['data'];
						$arrParams = array(
							'token' => $result,
							'transfer_to' => $data['transfer_to'],
							'transfer_point' => $data['transfer_point'],
						);
						$resultsTransfers = Appscore::Transfers($arrParams);
						$RawParams = array(
							'result' => $resultsTransfers,
						);
						$SubParam = json_encode($RawParams);
						$Production_Param = encrypt_key($SubParam,$this->key);
						$response = array(
							'msg' => 'Successful',
							'data' => $Production_Param,
						);
					}
					
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		
		$this->response($response);
	}

	public function Register_post(){
		$response = array('');
		$param = '';
		$passwordReg = "1234567890@@";
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					if(isset($_POST['data'])){
						$userResller = $result->{"userID"};
						$InfoToken = json_decode($result->{"params"},true);
						$this->key = $InfoToken['secret_key'];
						if(isset($_POST['data']['email'])){
							$emailReg = $_POST['data']['email'];
							if(isset($_POST['data']['password'])){
								$passwordReg = $_POST['data']['password'];
							}else{
								$passwordReg = "1234567890@@";
							}
							$validateEmail = Appscore::validate_email($emailReg);
							if($validateEmail==true){
								$paramReg = array(
									'email' => $emailReg,
									'passwords' => md5($passwordReg),
									'reseller' => $userResller,
									
								);
								$param = Appscore::RegisterClient($paramReg);
								$RawParams = array(
									'result' => $param,
									
								);
								$SubParam = json_encode($RawParams);
								$Production_Param = encrypt_key($SubParam,$this->key);
								$response = array(
									'msg' => 'Successful',
									'data' => $Production_Param,
								);
								
							}else{
								$response = array(
									'msg' => 'invalid email',
									'data' => $param,
								);
							}
						}else{
							$response = array(
								'msg' => 'Email field is empty',
								'data' => $param,
							);
						}
					}else{
						$response = array(
							'msg' => 'data not exist',
							'data' => $param,
						);
					}
					
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		
		$this->response($response);
	}
	
	public function ResellerInfo_post(){
		$response = array('');
		$param = '';
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					$userResller = $result->{"userID"};
					$InfoToken = json_decode($result->{"params"},true);
					$this->key = $InfoToken['secret_key'];
					$Reseller_Info = Appscore::Reseller_Info($userResller);
					$RawParams = array(
						'data' => $Reseller_Info,
					);
					$SubParam = json_encode($RawParams);
					$Production_Param = encrypt_key($SubParam,$this->key);
					$response = array(
						'msg' => 'Successful',
						'data' => $Production_Param,
					);
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		$this->response($response);
	}
	/*__________________________________*/
	
	public function ClientInfo_post(){
		$response = array('');
		$param = '';
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					if(isset($_POST['data'])){
						$userResller = $result->{"userID"};
						$InfoToken = json_decode($result->{"params"},true);
						$this->key = $InfoToken['secret_key'];
						$ClientID = $_POST['data'];
						$Clients_Info = Appscore::Clients_Info($ClientID,$userResller);
						
						$RawParams = array(
							
							'userResller' => $userResller,
							'Clients_Info' => $Clients_Info,
						);
						$SubParam = json_encode($RawParams);
						$Production_Param = encrypt_key($SubParam,$this->key);
						$response = array(
							'msg' => 'Successful',
							'data' => $Production_Param,
						);
					}else{
						$response = array(
							'msg' => 'data not exist',
							'data' => $param,
						);
					}
					
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		$this->response($response);
	}
	
	
	
	public function index_get(){
		$response = API_Index_structure();
		$this->response($response);
	}
	/*__________________________________*/
	
	public function Info_post(){
		$response = array('');
		$param = '';
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					$userID = $result->{"userID"};
					$InfoToken = json_decode($result->{"params"},true);
					$this->key = $InfoToken['secret_key'];
					$InfoClients = Appscore::Info($userID);
					$RawParams = array(
						'userID' => $userID,
						'InfoToken' => $InfoToken,
						'InfoClients' => $InfoClients,
					);
					$SubParam = json_encode($RawParams);
					$Production_Param = encrypt_key($SubParam,$this->key);
					$response = array(
						'msg' => 'Successful',
						'data' => $Production_Param,
					);
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		$this->response($response);
	}
	public function TokenCheck_post(){
		$response = array('');
		$param = '';
		if(isset($_POST['token'])){
			$token = $_POST['token'];
			$validate = Appscore::validate($token);
			if($validate==true){
				$result = Appscore::decode($token);
				if(isset($result)){
					$response = array(
						'msg' => 'Successful Token',
						'data' => $result,
					);
				}else{
					$response = array(
						'msg' => 'An unknown token',
						'data' => $param,
					);
				}
			}else{
				$response = array(
					'msg' => 'Expired Token',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Token not exist',
				'data' => $param,
			);
		}
		$this->response($response);
	}
	public function Token_post(){
		$response = array('');
		$param = '';
		if(!empty($_POST['data'])){
			$data = $_POST['data'];
			if(isset($_POST['secret_key'])){
				$secret_key = $this->encrypt->decode($_POST['secret_key'],$this->key);
				$params = array(
					'secret_key' => $secret_key,
					'account' => $data["account"],
					'password' => $data["password"],
				);
				$result = Appscore::Login($params);
				$response = array(
					'results' => $result,
				);
			}else{
				$response = array(
					'msg' => 'Error no secret key exists',
					'data' => $param,
				);
			}
		}else{
			$response = array(
				'msg' => 'Error no data exists',
				'data' => $param,
			);
		}
		
		$this->response($response);
	}
	
	
	
///---End Class Service---///

}

////------Start Class Core Apps-------////
class Appscore extends  MY_Controller{
	//VNPHONE_API//CONSUMER_SECRET//core_encrypt//
	const CONSUMER_KEY = '3e3b60cb43f7b521ae631956640649e6'; 
    const CONSUMER_SECRET = 'GYdW8sg7Y6pOul5iyYPCKOK93qQdgKyOmP7okTWCHpQ0d3SlLLG+DERYic2rMWjofVYjHC7Kn+sM5lgRyo89Tw=='; 
    const CONSUMER_TTL = 7200; 
	function __construct(){
		parent::__construct();
	}
	public function validate_email($email){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		if (preg_match($regex, $email)) {
			return true;
		} else { 
			return false;
		}  
	}
	public function Transfers($param){
		if(isset($param)){
			if(isset($param['transfer_to'])){
				if(isset($param['transfer_point'])){
					return $response = array(
						'data' => $param,
					);
					// $email = $params['email'];
					// $sql = "SELECT * FROM users WHERE clients_code = '$transfer_from' ";
					// $results_from = Appscore::QueryCoreAll($sql);
					// if(isset($results_from)){

					// }else{
					// 	return $response = array(
					// 		'msg' => 'Missing field transfer_from',
					// 		'data' => false,
					// 	);
					// }
				}else{
					return $response = array(
						'msg' => 'Missing field transfer_point',
						'data' => false,
					);
				}
			}else{
				return $response = array(
					'msg' => 'Missing field transfer_from',
					'data' => false,
				);
			}		
		}else{
			return $response = array(
				'msg' => 'Missing field',
				'data' => false,
			);
		}
	}
	public function RegisterClient($params){
		$email = $params['email'];
		$sql = "SELECT * FROM users WHERE username = '$email' ";
		$results = Appscore::QueryCoreAll($sql);
		if(!empty($results)==true){
			return $response = array(
				'msg' => 'Account already exists',
				'data' => $email,
			);
		}else{
			$paramInstall = array(
				'name' => $params['email'],
				'username' => $params['email'],
				'passwords' => $params['passwords'],
				'level' => 1,
				'score' => 50,
				'role' => 2,
				'status' => 1,
				'reseller' => $params['reseller'],
			);
			
				$this->db = $this->load->database('default', TRUE);
				$this->db->trans_start();
				$this->db->insert('users',$paramInstall);
				$insert_id = $this->db->insert_id();
				$this->db->trans_complete();
				if(isset($insert_id)){
					$dataUpdate = array(
						'clients_code' => 'VNP0'.$params['reseller'].$insert_id,
					);
					$this->db->where('id', $insert_id);
					$update = $this->db->update('users', $dataUpdate); 
					return $response = array(
						'msg' => 'Registration success',
						'data' => true,
					);
				}else{
					return $response = array(
						'msg' => 'Registration failed',
						'data' => false,
					);
				}
			
		}
	}
	public function Reseller_Info($userResller){
		$sql = "SELECT u.*,r.* ,r.id as id_reseller FROM users u
		INNER JOIN reseller r ON u.id = r.id_user_reseller
		WHERE u.id = '$userResller'
		AND role = 3";
		$results = Appscore::QueryCoreAll($sql);
		if(!empty($results)){
			if(isset($results[0]['id_reseller'])){
				$id_reseller = $results[0]['id_reseller'];
				$sqlClientAll = "SELECT * FROM users WHERE reseller = '$id_reseller' and role = 2";
				$ResultsClientAll = Appscore::QueryCoreAll($sqlClientAll);
				if(!empty($ResultsClientAll)){
					return $response = array(
						'reseller_data' => $results,
						'reseller_clients_data' => $ResultsClientAll,
					);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function Clients_Info($ClientID,$userResller){
		
		$sql = "SELECT u.*,r.* FROM users u
		INNER JOIN reseller r ON u.reseller = r.id
		WHERE u.clients_code = '$ClientID'
		AND role = 2";
		$results = Appscore::QueryCoreAll($sql);
		if(!empty($results)){
			if(isset($results[0]['id_user_reseller'])){
				$IdReseller = $results[0]['id_user_reseller'];
				if($IdReseller==$userResller){
					return $results;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function Info($userID){
		$results = '';
		$sql = "SELECT `id`,`name`,`clients_code`,`username`,`expired`,`role`,`score`,`level`,`reseller` FROM users where `id` = '$userID' ";
		$results = Appscore::QueryCoreAll($sql);
		if(isset($results)){
			return $results;
		}else{
			return false;
		}
	}
	public function QueryCoreAll($sql){
		try {
			$this->db = $this->load->database('default', TRUE);
			$this->db->trans_start();
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$this->db->trans_complete();
			return $result;
		} catch (Exception $e) {
            return false;
        }
	}
	public function AppsEncrypt($string,$key){
		return encrypt_key($string,$key);
	}
	public function Login($param){
		$secret_key =  $param['secret_key'];
		$account =  $param['account'];
		$password =  md5($param['password']);
		$sql = "SELECT * FROM users where `username` = '$account' and `passwords` = '$password'";
		$results = Appscore::QueryCoreAll($sql);
		if(isset($results)){
			if(isset($results[0]['status'])){
				$active = $results[0]['status'];
				if($active==1){
					if(isset( $results[0]['id'])){
						$userID = $results[0]['id'];
						$params = array(
							'secret_key' => $secret_key,
							'params_results' => $results,
						);
						$token = Appscore::Initialize_Tokens($userID,json_encode($params));
						return $response = array(
							'msg' => 'Successful command',
							'data' => $token,
						);
					}else{
						return $response = array(
							'msg' => 'Account inactive',
							'data' => '',
						);
					}
				}else{
					return $response = array(
						'msg' => 'account suspended',
						'data' => '',
					);
				}
			}else{
				return $response = array(
					'msg' => 'Account inactive',
					'data' => '',
				);
			}
		}else{
			return $response = array(
				'msg' => 'account does not exist',
				'data' => '',
			);
		}
	}
	
	public function Initialize_Tokens($userID,$Params){
       $token = $this->jwt->encode(array(
            'consumerKey' => self::CONSUMER_KEY,
            'userID' => $userID,
            'params' => $Params,
            'issuedAt' => date(DATE_ISO8601, strtotime("now")),
            'ttl' => self::CONSUMER_TTL
        ), self::CONSUMER_SECRET);
        return $token;
    }
	public function decode($token)
    {
        try {
            $decodeToken = $this->jwt->decode($token, self::CONSUMER_SECRET);
            return $decodeToken;
        } catch (Exception $e) {
            return false;
        }
    }
	public function validate($token)
    {
        try {
            $decodeToken = $this->jwt->decode($token, self::CONSUMER_SECRET);
            
            $ttl_time = strtotime($decodeToken->issuedAt);
            $now_time = strtotime(date(DATE_ISO8601, strtotime("now")));
            if(($now_time - $ttl_time) > $decodeToken->ttl) {
                throw new Exception('Expired');
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
	
///---End Class Apps---///
}

	

?>