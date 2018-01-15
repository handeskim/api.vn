<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('API_Index_structure')){
	function API_Index_structure() {
		$response = array(
			'name_api' => base_url(),
			'Method_API' => 'POST',
			'Paramss_API' => array(
				'token'=> '(string)',
				'data'=> '(Decrypt Params data)',
			),
			'API_structure' => array(
				
				'Request_Token' => array(
						'URL' => base_url().'Token',
						'PEM' => 'ALL',
						'Params' => array(
							'secret_key' => '(string)',
							'app_id' => '(string)',
							'data' => array(
								'username' => 'Email or registered account',
								'password' => 'password',
								'role' => 'true / false (required if Reseller account) (default is false)',
							),
						),
						'Results' => array(
							'data' => 'Token (string)',
						),
						
					),
				'Request_Register' => array(
						'URL' => base_url().'Register',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								'email' => 'Email Subscription Clients',
								'password' => '(string min 8 characters) default null 12345678@@',
								
							),
						),
						'Results' => array(
							'data' => array(
								'response' => 'true/false/',
								'msg' => 'Message notification',
							),
						),
					),
				'Request_Convert' => array(
						'URL' => base_url().'Convert',
						'PEM' => 'Clients',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								'data_convert' => 'json_encode(array UID) Max UID 5000.UID',
							),
						),
						'Results' => array(
							'data' => array(
								'response' => array(
									'data' => 'string json(data)',
									'download' => array(
										'excel' => 'string json(data)',
										'text' => 'string json(data)',
									),
								),
								'msg' => 'Message notification',
							),
						),
					),
				'Request_Transfer' => array(
						'URL' => base_url().'Transfer',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								
								'transfer_to' => 'Client code',
								'transfer_point' => 'Points transferred',
							),
						),
						'Results' => array(
							'data' => array(
								'response' => 'true/false/',
								'msg' => 'Message notification',
							),
						),
					),
				
				'Request_Pending' => array(
						'URL' => base_url().'Pending',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								'account' => 'Client code',
							),
						),
						'Results' => array(
							'data' => array(
								'response' => 'true/false/',
								'msg' => 'Message notification',
							),
						),
					),
				'Request_Active' => array(
						'URL' => base_url().'Active',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								'account' => 'Client code',
							),
						),
						'Results' => array(
							'data' => array(
								'response' => 'true/false/',
								'msg' => 'Message notification',
							),
						),
					),
				'Request_Destroy' => array(
						'URL' => base_url().'Destroy',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
							'data' => array(
								'account' => 'Client code',
							),
						),
						'Results' => array(
							'data' => array(
								'response' => 'true/false/',
								'msg' => 'Message notification',
							),
						),
					),
				'Request_Info' => array(
						'URL' => base_url().'Info',
						'PEM' => 'All',
						'Params' => array(
							'token'=> '(string)',
							
						),
						'Results' => array(
							'data' => array(
								'response' => 'Info Clients',
							),
						),
					),
			
				'Request_ClientsInfo' => array(
						'URL' => base_url().'Info',
						'PEM' => 'All',
						'Params' => array(
							'token'=> '(string)',
							'data'=> '(string) clients code',
							
						),
						'Results' => array(
							'data' => array(
								'response' => 'Info Clients',
							),
						),
					),
				'Request_ResellerInfo' => 
					array(
						'URL' => base_url().'Reseller',
						'PEM' => 'Reseller',
						'Params' => array(
							'token'=> '(string)',
						),
						'Results' => array(
							'data' => array(
								'response' => 'Info Reseller',
							),
						),
					),
				'Request_History' => array(
						'URL' => base_url().'History',
						'PEM' => 'Clients Reseller',
						'Params' => array(
							'token'=> '(string)',
							
						),
						'Results' => array(
							'data' => array(
								'response' => 'Info History',
							),
						),
					),
			),
		);
		return $response;
	}
}

//////////////////////////////////////
