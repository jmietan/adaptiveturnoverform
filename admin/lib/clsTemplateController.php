<?php
include_once('config.php');


class  Controller extends FileManager{

	var $tpl_direc = PATH_TEMPLATE;
	

	function header_index(){
				
		
		$tpl = FileManager::voidReadFile($this->tpl_direc,'\admin_header_index.html');
				
		return $tpl;
		
	}
	
	function body_index($arrValues){
		
		$tpl = FileManager::voidReadFile($this->tpl_direc,'\admin_body_index.html');
		
		$output = FileManager::ReplaceVals($tpl,$arrValues);
		
		return $output;
		
	}
	
	function body_edit($arrValues){
		
		$tpl = FileManager::voidReadFile($this->tpl_direc,'\admin_body_edit.html');
		
		$output = FileManager::ReplaceVals($tpl,$arrValues);
		
		return $output;
		
	}


}



?>