<?php
//require_once('TemplateController.php');
require_once('config.php');

class  Archive extends TemplateController{

	var $arch_direc = PATH_ARCHIVE;

  function LetsArchive ($strTurnover, $From, $To){

			
		
		$today = date("Ymd");  
		
	   $filename = $this->arch_direc.'/TO_'.$today.'-'.$From.'-'.$To.'.html';



	   $Output  = file_put_contents ($filename, $strTurnover);	
	   
	   if (!$Output){
	   
	    $strMessage =  "</br/><font color=\"red\">Unable to Archive the turnover</font>";
		
	   
	   }else {
	   
	     $strMessage =  "<br/><br/><font color=\"#008000\">Turnover has been archived!</font>";
	   }
	  
	   
	   return $strMessage;
	}
	
	
	function viewarchive(){
	
		if ($handle = opendir($this->arch_direc)) {
			
			while (false !== ($entry = readdir($handle))) {
			if ( $entry !== '.' && $entry !== '..'){
			
				$yr = substr($entry, 3, 4);
				$month = substr($entry, 7, 2);
				$day = substr($entry, 9, 2);
		
				 
				$arrList[$yr][$month][$day][] =  '<a href="archive/'.$entry.'">'.$entry.'</a>';
				 
		
				}
			}
		
			closedir($handle);
		}



		return $arrList;
	
	}
    
	
}


?>