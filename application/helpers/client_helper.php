<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('clients_secret')){
	function clients_secret(){
		$config = parse_ini_file(__DIR__.'/../../config.ini');
		return $config["secret_key"];
	}
}
if(! function_exists('clients_app')){
	function clients_app(){
		$config = parse_ini_file(__DIR__.'/../../config.ini');
		return $config["app_id"];
	}
}
