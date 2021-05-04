<?php

class Suppression extends FileManager {

	function total($arr){
	 
	 
	  foreach($arr as $key => $value){

				$content = count($value);
		}
		
	  return $content; 
	 }

  function SuppTickets($xmlsupptickets){
		 		
		$content = '';
		
		$Timestamp = FileManager::GetTimestamp($xmlsupptickets);
		
		$obj = simplexml_load_file($xmlsupptickets);
		//print '<pre>';
		//print_r($obj);
		$t = $this->total($obj);
		
		if ( 0 < $t ){
		
				foreach($obj as $key => $value){
				
				$total = count($value);
				
				//$content .=  '<label><span style="color:#008000">Total: '.$total.'</span> </label>';
							  
				   $content .='<table class=greentable>
				   				<thead><tr>
								<th>CASE</th>
								<th>PRIORITY</th>
								<th style=width:100px;>CUSTOMER</th>
								<th style=width:150px;>SUMMARY</th>
								<th>STATUS</th>
								<th>GROUP</th>
								<th>ASSIGNED</th>
								<th style=width:150px;>DEVICE</th>
								<th>LAST MODIFIED (GMT)</th>
								
								</tr></thead><tbody>';
				
   
							foreach($value as $k ){
								
								 $content .=  '<tr>';
								 foreach($k as $one => $two ){
									
									if ($two[0] ==  'Assigned') {
										  $content .=  '<td style="background-color:#FFD180;"><span style="color:#43464B;">'.$two[0].'</span></td>';
									}elseif ($two[0] ==  'In Progress') {
										  $content .=  '<td style="background-color:#FFD180;"><span style="color:#43464B;">'.$two[0].'</span></td>';
																
									} else{
										  $content .=  '<td> '.$two[0].'</td>';
									}
								}
								 $content .=  '</tr>';
								
							}
							
				}
				 $content .=  '</table> <table align=right>
				 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 </table>';
		}
		else {
		
		
		  $content .=  'No Suppresion Ticket as of the moment';
		}	
		return $content;
	}
    
	

	
	

	
}


?>