<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {
	
	function __construct(){
		parent::__construct();
		$this->key = keys();
		$this->db = $this->load->database('default', TRUE);
	}
	
	public function Convert_post(){
		
	}
	public function History_post(){
		
	}
	public function Destroy_post(){
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
						$clients_code = $_POST['data'];
						$ClientsTransfer = Appscore::DestroyClients($clients_code,$userResller);
						$RawParams = array(
							'data' => $ClientsTransfer,
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
	public function Active_post(){
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
						$clients_code = $_POST['data'];
						$ClientsTransfer = Appscore::ActiveClients($clients_code,$userResller);
						$RawParams = array(
							'data' => $ClientsTransfer,
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
	public function Pending_post(){
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
						$clients_code = $_POST['data'];
						$ClientsTransfer = Appscore::PendingClients($clients_code,$userResller);
						$RawParams = array(
							'data' => $ClientsTransfer,
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
	public function Transfer_post(){
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
						$TransferData = $_POST['data'];
						$ClientsTransfer = Appscore::TransfersClients($TransferData,$userResller);
						$RawParams = array(
							'data' => $ClientsTransfer,
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
	/*--------------------------*/
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
	public function DestroyClients($clients_code,$userResller){
		if(isset($clients_code)){
			if(isset($clients_code['account'])){
				try {
					$sqlreseller = "SELECT `id` FROM reseller WHERE id_user_reseller = '$userResller'";
					$ResultReseller = Appscore::QueryCoreAll($sqlreseller);
					if(isset($ResultReseller)){
						if(!empty($ResultReseller)){
							$idreseller = $ResultReseller[0]['id'];
								$IDclients = $clients_code['account'];
								$sql = "SELECT * FROM users WHERE clients_code = '$IDclients' AND role = 2 AND reseller = '$idreseller'";
								$ResultAccount = Appscore::QueryCoreAll($sql);
								if(isset($ResultAccount)){
									if(!empty($ResultAccount)){
										try {
											$this->db = $this->load->database('default', TRUE);
											$this->db->trans_start();
											$this->db->where('role', 2);
											$this->db->where('clients_code', $IDclients);
											$this->db->where('reseller', $idreseller);
											$ReturnDestroy = $this->db->delete('users'); 
											$this->db->trans_complete();
											return $response = array(
												'data' => $ReturnDestroy,
											);
										}catch (Exception $e) {
											return $response = array(
												'msg' => 'command false',
												'data' => false,
											);
										}
									}else{
										return $response = array(
											'msg' => 'Account false',
											'data' => false,
										);
									}
								}else{
									return $response = array(
										'msg' => 'Account does not exist',
										'data' => false,
									);
								}
							
						}else{
							return $response = array(
								'msg' => 'You are not an authorized dealer',
								'data' => false,
							);
						}
						
					}else{
						return $response = array(
							'msg' => 'You are not an authorized dealer',
							'data' => false,
						);
					}
					
				}catch (Exception $e) {
					return false;
				}
			}else{
				return $response = array(
					'msg' => 'Account does not exist',
					'data' => false,
				);
			}
		}else{
			return $response = array(
				'msg' => 'Account does not exist',
				'data' => false,
			);
		}
	}
	public function ActiveClients($clients_code,$userResller){
		if(isset($clients_code)){
			if(isset($clients_code['account'])){
				try {
					$sqlreseller = "SELECT `id` FROM reseller WHERE id_user_reseller = '$userResller'";
					$ResultReseller = Appscore::QueryCoreAll($sqlreseller);
					if(isset($ResultReseller)){
						if(!empty($ResultReseller)){
							$idreseller = $ResultReseller[0]['id'];
							$IDclients = $clients_code['account'];
							
								$sql = "SELECT * FROM users WHERE clients_code = '$IDclients' AND role = 2 AND reseller = '$idreseller'";
								$ResultAccount = Appscore::QueryCoreAll($sql);
								if(isset($ResultAccount)){
									if(!empty($ResultAccount)){
										try {
											$data = array('status' => 1,);
											$this->db = $this->load->database('default', TRUE);
											$this->db->trans_start();
											$this->db->where('role', 2);
											$this->db->where('clients_code', $IDclients);
											$this->db->where('reseller', $idreseller);
											$ReturnUpdate = $this->db->update('users', $data); 
											$this->db->trans_complete();
											return $response = array(
												'data' => $ReturnUpdate,
											);
										}catch (Exception $e) {
											return $response = array(
												'msg' => 'command false',
												'data' => false,
											);
										}
									}else{
										return $response = array(
											'msg' => 'Account false',
											'data' => false,
										);
									}
								}else{
									return $response = array(
										'msg' => 'Account does not exist',
										'data' => false,
									);
								}
							
						}else{
							return $response = array(
								'msg' => 'You are not an authorized dealer',
								'data' => false,
							);
						}
						
					}else{
						return $response = array(
							'msg' => 'You are not an authorized dealer',
							'data' => false,
						);
					}
					
				}catch (Exception $e) {
					return false;
				}
			}else{
				return $response = array(
					'msg' => 'Account does not exist',
					'data' => false,
				);
			}
		}else{
			return $response = array(
				'msg' => 'Account does not exist',
				'data' => false,
			);
		}
	}
	public function PendingClients($clients_code,$userResller){
		if(isset($clients_code)){
			if(isset($clients_code['account'])){
				try {
					$sqlreseller = "SELECT `id` FROM reseller WHERE id_user_reseller = '$userResller'";
					$ResultReseller = Appscore::QueryCoreAll($sqlreseller);
					if(isset($ResultReseller)){
						if(!empty($ResultReseller)){
							$idreseller = $ResultReseller[0]['id'];
							$IDclients = $clients_code['account'];
							
								$sql = "SELECT * FROM users WHERE clients_code = '$IDclients' AND role = 2 AND reseller = '$idreseller'";
								$ResultAccount = Appscore::QueryCoreAll($sql);
								if(isset($ResultAccount)){
									if(!empty($ResultAccount)){
										try {
											$data = array('status' => 2,);
											$this->db = $this->load->database('default', TRUE);
											$this->db->trans_start();
											$this->db->where('role', 2);
											$this->db->where('clients_code', $IDclients);
											$this->db->where('reseller', $idreseller);
											$ReturnUpdate = $this->db->update('users', $data); 
											$this->db->trans_complete();
											return $response = array(
												'data' => $ReturnUpdate,
											);
										}catch (Exception $e) {
											return $response = array(
												'msg' => 'command false',
												'data' => false,
											);
										}
									}else{
										return $response = array(
											'msg' => 'Account false',
											'data' => false,
										);
									}
								}else{
									return $response = array(
										'msg' => 'Account does not exist',
										'data' => false,
									);
								}
							
						}else{
							return $response = array(
								'msg' => 'You are not an authorized dealer',
								'data' => false,
							);
						}
						
					}else{
						return $response = array(
							'msg' => 'You are not an authorized dealer',
							'data' => false,
						);
					}
					
				}catch (Exception $e) {
					return false;
				}
			}else{
				return $response = array(
					'msg' => 'Account does not exist',
					'data' => false,
				);
			}
		}else{
			return $response = array(
				'msg' => 'Account does not exist',
				'data' => false,
			);
		}
	}
	public function TransfersClients($TransferData,$userResller){
		if(isset($TransferData)){
			if(isset($TransferData['transfer_to'])){
				if(isset($TransferData['transfer_point'])){
					try {
						$transfer_to = $TransferData['transfer_to'];
						$sqlClientMoney = "SELECT `score` FROM users WHERE clients_code = '$transfer_to' ";
						$MoneyClient = Appscore::QueryCoreAll($sqlClientMoney);
							if(!empty($MoneyClient)){
							try {
								$transfer_point = (int)$TransferData['transfer_point'];
								$sqlMoney = "SELECT `score` FROM reseller WHERE id_user_reseller = '$userResller' AND score >= $transfer_point ";
								$MoneyChecks = Appscore::QueryCoreAll($sqlMoney);
								if(isset($MoneyChecks)){
									if(!empty($MoneyChecks)){
										$MoneyReseller = (int)$MoneyChecks[0]["score"];
										$MoneyOld = (int)$MoneyClient[0]["score"];
										
										$MoneyUpdateClients = (int)$MoneyOld +(int)$transfer_point;
										$MoneyUpdateReseller  = (int)$MoneyReseller - (int)$transfer_point;
										$ClientsUpdate = array(
											'id' => $transfer_to,
											'data' => array('score' => $MoneyUpdateClients,),
										);
										$ResellerUpdate = array(
											'id' => $userResller,
											'data' => array('score' => $MoneyUpdateReseller,),
										);
										$ParamsUpdate = array(
											'client' => $ClientsUpdate,
											'reseller' => $ResellerUpdate,
										);
										$TransferTransaction = Appscore::UpdateBalance($ParamsUpdate);
										return $response = array(
											'data' => $TransferTransaction,
										);
									}else{
										try {
											$BalanceSql = "SELECT `score` FROM reseller WHERE id_user_reseller = '$userResller' ";
											$Balance = Appscore::QueryCoreAll($BalanceSql);
											return $response = array(
												'msg' => 'The remaining balance point',
												'data' => array(
													'Balance' => $Balance,
												),
											);
										}catch (Exception $e) {
											return false;
										}
									}
								}else{
									return $response = array(
										'msg' => 'The remaining balance point',
									);
								}
							}catch (Exception $e) {
								return false;
							}
						}else{
							return $response = array(
								'msg' => 'Missing field transfer_to',
								'data' => false,
							);
						}
					}catch (Exception $e) {
						return false;
					}
				}else{
					return $response = array(
						'msg' => 'Missing field transfer_point',
						'data' => false,
					);
				}
			}else{
				return $response = array(
					'msg' => 'Missing field transfer_to',
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
		try {
			$email = $params['email'];
			$id_reseller = $params['reseller'];
			$sql = "SELECT * FROM users WHERE username = '$email' ";
			$results = Appscore::QueryCoreAll($sql);
			if(!empty($results)==true){
				return $response = array(
					'msg' => 'Account already exists',
					'data' => $email,
				);
			}else{
				
				
				$sqlreseller = "SELECT `id` FROM reseller WHERE id_user_reseller = '$id_reseller'";
				$ResultReseller = Appscore::QueryCoreAll($sqlreseller);
				if(isset($ResultReseller)){
					if(!empty($ResultReseller)){
						$idreseller = $ResultReseller[0]['id'];
						$paramInstall = array(
							'name' => $params['email'],
							'username' => $params['email'],
							'passwords' => $params['passwords'],
							'level' => 1,
							'score' => 50,
							'role' => 2,
							'status' => 1,
							'reseller' => $idreseller,
						);
						try{
							$this->db = $this->load->database('default', TRUE);
							$this->db->trans_start();
							$this->db->insert('users',$paramInstall);
							$insert_id = $this->db->insert_id();
							$this->db->trans_complete();
							if(isset($insert_id)){
								$dataUpdate = array(
									'clients_code' => 'VNP0'.$params['reseller'].'R'.$insert_id,
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
						}catch (Exception $e) {
							return false;
						}
					}else{
						return $response = array(
							'msg' => 'Registration failed',
							'data' => false,
						);
					}
				}else{
					return $response = array(
							'msg' => 'Registration failed',
							'data' => false,
						);
				}
			}
		}catch (Exception $e) {
			return false;
		}
	}
	public function Reseller_Info($userResller){
		try {
			$sql = "SELECT u.*,r.* ,r.id as id_reseller FROM users u
			INNER JOIN reseller r ON u.id = r.id_user_reseller
			WHERE u.id = '$userResller'
			AND role = 3";
			$results = Appscore::QueryCoreAll($sql);
			if(!empty($results)){
				if(isset($results[0]['id_reseller'])){
					try {
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
					}catch (Exception $e) {
						return false;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}catch (Exception $e) {
			return false;
		}
	}
	public function Clients_Info($ClientID,$userResller){
		try {
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
		}catch (Exception $e) {
			return false;
		}
	}
	public function Info($userID){
		try {
			$results = '';
			$sql = "SELECT `id`,`name`,`clients_code`,`username`,`expired`,`role`,`score`,`level`,`reseller` FROM users where `id` = '$userID' ";
			$results = Appscore::QueryCoreAll($sql);
			if(isset($results)){
				return $results;
			}else{
				return false;
			}
		}catch (Exception $e) {
			return false;
		}
	}
	public function UpdateBalance($params){
		try {
			
			$reseller = $params['reseller'];
			$idreseller = $reseller['id'];
			$dataReseller = $reseller['data'];
			$scoreReseller = (int)$reseller['data']['score'];
			
			$client = $params['client'];
			$idclient = $client['id'];
			$dataClient = $client['data'];
			$this->db = $this->load->database('default', TRUE);
			$this->db->trans_start();
			$this->db->where('id_user_reseller', $idreseller);
			$this->db->where('score >=', $scoreReseller);
			$resultreseller = $this->db->update('reseller', $dataReseller); 
			if($resultreseller==true){
				$this->db->where('clients_code', $idclient);
				$resultclient = $this->db->update('users', $dataClient); 
			}
			$this->db->trans_complete();
			if($resultreseller==true){
				return $resultreseller;
			}else{
				return $resultclient;
			}
			
		} catch (Exception $e) {
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
		try {
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
		} catch (Exception $e) {
            return false;
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