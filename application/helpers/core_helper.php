<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('microsecond')){
	function microsecond() {
		 $ts = gettimeofday(true);
		 $ts = sprintf("%.5f", $ts);
		 $s = strftime("%Y-%m-%dT%H:%M:%S", $ts);
		return $s; 
	}
}
if(! function_exists('CONSUMER_KEY')){
	function CONSUMER_KEY() {
		 return '3e3b60cb43f7b521ae631956640649e6'; ;
	}
}
if(! function_exists('CONSUMER_SECRET')){
	function CONSUMER_SECRET() {
		 return 'GYdW8sg7Y6pOul5iyYPCKOK93qQdgKyOmP7okTWCHpQ0d3SlLLG+DERYic2rMWjofVYjHC7Kn+sM5lgRyo89Tw=='; 
	}
}
if(! function_exists('CONSUMER_TTL')){
	function CONSUMER_TTL() {
		 return  7200; 
	}
}
if(! function_exists('keys')){
	function keys() {
		 $ci = &get_instance();
		 return $ci->config->item('encryption_key');
	}
}

/////////////////////////////////////
if(! function_exists('encrypt_key')){
	function encrypt_key($string,$key){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->encode($string,$key);
	}
}
/////////////////////////////////////
if(! function_exists('decrypt_key')){
	function decrypt_key($string,$key){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->decode($string,$key);
	}
}
/////////////////////////////////////
if(! function_exists('help_response')){
	function help_response($param) {
		echo json_encode($param);
		header('Content-Type: application/json');
	}
}




if(! function_exists('core_token_csrf')){
	function core_token_csrf(){
		$ci = &get_instance();
			return $ci->security->get_csrf_hash();
	}
}
/////////////////////////////////////
if(! function_exists('core_csrf_name')){
	function core_csrf_name(){
		$ci = &get_instance();
			return $ci->security->get_csrf_token_name();
	}
}
/////////////////////////////////////
if(! function_exists('core_encode')){
	function core_encode($str){
		$encode_str = urlencode(base64_encode(core_encrypt($str)));
			return $encode_str;
	}
}
/////////////////////////////////////
if(! function_exists('core_decode')){
	function core_decode($str){
		$decode_str = core_decrypt(base64_decode(urldecode($str)));
			return $decode_str;
	}
}
/////////////////////////////////////
if(! function_exists('url_base64_encode')){
	function url_base64_encode($str){
		return urlencode(base64_encode($str));
	}
}
/////////////////////////////////////
if(! function_exists('url_base64_decode')){
	function url_base64_decode($str){
		return base64_decode(urldecode($str));
	}
}
/////////////////////////////////////
if(! function_exists('core_encrypt')){
	function core_encrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->encode($string);
	}
}
/////////////////////////////////////
if(! function_exists('core_decrypt')){
	function core_decrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->decode($string);
	}
}
/////////////////////////////////////
if(! function_exists('core_path_logs')){
	function core_path_logs($directory){
		$dir = FCPATH .'/logs/'.$directory.'/'.date('Y'). '/' . date('m'). '/' . date('d');
		$create_path_month = FCPATH .'/logs/'.$directory.'/'.date('Y'). '/' . date('m');
		$create_path_years = FCPATH .'/logs/'.$directory.'/'.date('Y');
		if(!is_dir($dir)){
			umask(0);
			mkdir($dir, 0777, true);
				return $dir;
		}else{
			umask(0);
				return $dir;
		}
	}
}
/////////////////////////////////////
if ( ! function_exists('core_logs')){
	function core_logs($msg = null) {
		$ci = & get_instance();
		$logs_handesk = array(
			'header' => $ci->session->all_userdata(),
			'content' => $msg,
		);
		file_put_contents(core_path_logs($ci->router->fetch_class()).'/'.$ci->router->fetch_method().'-'.date("d-m-Y",time()).".txt", date("d/m/Y H:i:s",time()).": ".print_r($logs_handesk, TRUE)."\n", FILE_APPEND | LOCK_EX);
	}
}

if ( ! function_exists('fpath_ssl')){
	function fpath_ssl() {
			$dir = FCPATH .'certificate/crt_ssl';
			if(!is_dir($dir)){
			umask(0);
			mkdir($dir, 0777, true);
				return $dir;
			}else{
				umask(0);
					return $dir;
			}
	}
}
//////////////////////////////////////
