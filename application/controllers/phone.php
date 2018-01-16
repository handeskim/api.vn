<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Phone extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		
	}
	public function index(){
		
		
		// $keyword = "0946664869";
		$sql = "SELECT * FROM phone_find LIMIT 10";
		$result =  $this->GlobalMD->query_global($sql);
		$fb = array();
		foreach($result as $value){
			$keyword = $value['phone'];
			$fb[] = $this->facebook_search($keyword);
		}
		var_dump($fb);
		
	
	}

	function facebook_search($query, $type = 'all'){
		$url = 'http://www.facebook.com/search/'.$type.'/?q='.$query;
		$user_agent = $this->loaduserAgent();

		$c = curl_init();
		curl_setopt_array($c, array(
			CURLOPT_URL             => $url,
			CURLOPT_USERAGENT       => $user_agent,
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_FOLLOWLOCATION  => TRUE,
			CURLOPT_SSL_VERIFYPEER  => FALSE
		));
		$data = curl_exec($c);
		preg_match('/\&#123;&quot;id&quot;:(?P<fbUserId>\d+)\,/', $data, $matches);
		if(isset($matches["fbUserId"]) && $matches["fbUserId"] != ""){
			$fbUserId = $matches["fbUserId"];
			$params = array($query,$fbUserId);
		}else{
			$fbUserId = "";
			$params = array($query,$fbUserId);
		}
		return $params;
	}
	private function loaduserAgent(){
		 $sql = "SELECT `user_agents` FROM `user_agents` ORDER BY RAND() LIMIT 1";
		 $result =  $this->GlobalMD->query_global($sql);
		 return $result[0]["user_agents"];
	}
}
?>