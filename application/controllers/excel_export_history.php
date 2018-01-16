<?php
class Excel_export_history extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('rest');
		
	}
	
	public function index(){
		
		if(isset($_GET['key'])){
			$key_file = core_decode($_GET['key']);
			$this->load->library('excel');
			try { 
				$Array_name_field = array('phone');
				$this->excel->setActiveSheetIndex(0);
				try { 
					$data_field = json_decode($this->redis->get($key_file));
				
					$dataexport = array();
					$dataexport[] = $Array_name_field;
					$x = 0;
					$filed = array();
					foreach($data_field as $value){
						foreach($Array_name_field as $fields)
						{
						   $filed[$x][] = '+'.$value[0]->$fields;
						}
						$dataexport[] = $filed[$x];
						$x++;
					}
					$this->excel->getActiveSheet()->fromArray($dataexport,NULL, 'A1');
					$filename= rand().date("Y-m-d H-i-s",time()).'.xlsx';
					header('Content-Type:  application/vnd.ms-excel'); 
					header('Content-Disposition: attachment;filename="'.$filename.'"'); 
					$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
					ob_end_clean();
					$objWriter->save('php://output');
				}catch (Exception $e) {
					echo "No query data exists please turn back and try again";
				}
			}catch (Exception $e) {
				echo "No data exist Please come out and try again";
			}
		}
		
	}
	
}
?>