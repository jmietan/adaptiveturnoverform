<?php
//require_once('clsFile.php');
require_once('config.php');

class  TemplateController extends FileManager{

	var $tpl_direc = PATH_TEMPLATE;
	var $txt_direc = PATH_TXT;
	
	function header_index($arrValues){
	    	
		$tpl = FileManager::voidReadFile($this->tpl_direc ,'/header.html');
		
		$output = FileManager::ReplaceVals($tpl,$arrValues);
		
		return $output;
		
	}
	

	
	function footer(){
	
        $tpl = FileManager::voidReadFile($this->tpl_direc ,'/footer.html');
		return $tpl;
		
	}

	function body_index($arrValues){
		
		$tpl = FileManager::voidReadFile($this->tpl_direc,'/body_index.html');
		
		$output = FileManager::ReplaceVals($tpl,$arrValues);
		
		
		return $output;
		
	}
	

	
	function US_Engineers(){
		 $content = '';
	
	
		$arrList = explode("\n", file_get_contents($this->txt_direc.'\US_names.txt'));


		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					
					$content .= '<option value=\''.trim($vals).'\'>'.trim($vals).'</option>';
				}
			
		}
		return $content;
	
	}
	
	function SG_Engineers(){
		 $content = '';
	

		$arrList = explode("\n", file_get_contents($this->txt_direc.'\SG_names.txt'));


		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					
					$content .= '<option value=\''.trim($vals).'\'>'.trim($vals).'</option>';
				}
			
		}
	
		return $content;
	
	}
	
	function UK_Engineers(){
		 $content = '';
	
		$arrList = explode("\n", file_get_contents($this->txt_direc.'\UK_names.txt'));


		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					
					$content .= '<option value=\''.trim($vals).'\'>'.trim($vals).'</option>';
				}
			
		}

		return $content;
	
	}	


    function header_email(){
		
		$tpl = FileManager::voidReadFile($this->tpl_direc ,'/header_email.html');
		
		return $tpl;
		
	}	

    function body_email($arrValues){
		
		$tpl = FileManager::voidReadFile($this->tpl_direc,'/body_email.html');
		
		$output = FileManager::ReplaceVals($tpl,$arrValues);
		
		return $output;
		
	}

}



?>
