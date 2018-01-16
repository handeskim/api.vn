<?php
class Text_export extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		
	}
	
	public function index(){
		if(isset($_GET['key'])){
			$key_file = core_decode($_GET['key']);
			$name_file = rand().date("Y-m-d H-i-s",time());
			$txtfile = $_SERVER["DOCUMENT_ROOT"].'/download/'.$name_file.'.txt';
			$handle = fopen($txtfile, 'w') or die('Cannot open file:  '.$txtfile); // check the file is readable
			$textContent = '';
			$dump_raw = json_decode($this->redis->get($key_file));
			foreach($dump_raw as $value){
				$textContent .=  '+'.$value[0]->phone ."\r\n";
			}

			fwrite($handle, $textContent); // write content
			fclose($handle); // close the text file\
			$downLink = base_url().'download/'.$name_file.'.txt'; 
			return $this->dowload($downLink);
		}
	}
	private function dowload($file){
		
		header("Cache-Control: public");     
		header("Content-Description: File Transfer");     
		header("Content-Disposition: attachment; filename=".$file."");     
		header("Content-Transfer-Encoding: binary");     
		header("Content-Type: binary/octet-stream");     
		readfile($file);
	}
	
}
?>