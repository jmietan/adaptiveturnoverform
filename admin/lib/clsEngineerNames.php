<?php
include_once('config.php');


class Engineer extends FileManager{

	var $txt_direc = PATH_TXT;
	

	function EngineerName_List($reg){
		
		$regTxt = $reg.'_Names.txt';
				
		$output = FileManager::voidReadFile($this->txt_direc,"\\".$regTxt);
		
		
		return $output;
		
	}
	
	function EngineerName_Save($strnames,$reg) {
		
		$regTxt = $reg.'_Names.txt';
		
		$filename = $this->txt_direc."\\".$regTxt;
		
		$output = FileManager::voidReadFile($strnames,'',$filename);
		
		return $output;
	
	}



}



?>