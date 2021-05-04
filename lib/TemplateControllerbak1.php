<?php
//require_once('clsFile.php');
require_once('config.php');

class  TemplateController extends FileManager{

	var $tpl_direc = PATH_TEMPLATE;
	
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
	
	   $arrList = array ('Bob Chapman',
						'Brandon Finnessey',
						'Brian Doherty',
						'Bryan Mehlick',
						'Clarissa Pfitscher',
						'Donyale Brooks',
						'Casey McTaggart',
						'Micheal Parker',
						'Rick Patterson',
						'Travis Labrot');

		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					$content .= '<option value=\''.$vals.'\'>'.$vals.'</option>';
				}
			
		}

		return $content;
	
	}
	
	function SG_Engineers(){
		 $content = '';
	
	   $arrList = array ('Ahmad Mutammim Aziz',
						'Cely Pascual',
						'Corman Alvarez',
						'Dinesh Pathmanathan',
						'Joseph Arana',
						'Yi Toe Swan');

		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					$content .= '<option value=\''.$vals.'\'>'.$vals.'</option>';
				}
			
		}

		return $content;
	
	}
	
	function UK_Engineers(){
		 $content = '';
	
	   $arrList = array ('Abdul Khan',
						'Eden Bennette',
						'Ieuan Tucker',
						'Mark Griffiths',
						'Poonam Arora',
						'Sanjeev Jassal',
						'Zohaib Shakeel');

		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					$content .= '<option value=\''.$vals.'\'>'.$vals.'</option>';
				}
			
		}

		return $content;
	
	}	
/*
	function Engineer_Names(){
	 $content = '';
	
	   $arrList = array ('Ahmad Mutammin Aziz',
						'Brian Doherty',
						'Bryan Mehlick',
						'Chen Li Ng',
						'Clarissa Pfitscher',
						'Cletis Reed',
						'Corman Alvarez',
						'Dinesh Pathmanathan',
						'Eden Bennette',
						'Jayson Griffith',
						'Jaymie Tan',
						'Joshua Waggoner',
						'Jun Victor Teng' ,
						'Lyzias L Morato',
						'Mark Griffiths',
						'Michael Parker',
						'Poonam Arora',
						'Robert Chapman',
						'Sanjeev Jassal',
						'Tony Martin',
						'Yi Toe Swan',
						'Zohaib Shakeel');

		foreach($arrList as $key => $vals){
			   
				if ($vals != '' ){
					$content .= '<option value="'.$vals.'">'.$vals.'</option>';
				}
			
		}

		return $content;
	}
	*/

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
