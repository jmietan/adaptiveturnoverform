<?php

class CRQ extends FileManager {

	function total($arr){
	 
	 
	  foreach($arr as $key => $value){

				$content = count($value);
		}
		
	  return $content; 
	 }

  function crq_drafts ($xmlcrqdrafts){
		 
		//print $xmlcrqdrafts;
		$content = '';
		
		$Timestamp = FileManager::GetTimestamp($xmlcrqdrafts);
		
		$obj = simplexml_load_file($xmlcrqdrafts);
		//print '<<pre>';
		//print_r($obj);
		$t = $this->total($obj);
		
		if ( 0 < $t ){
		
				foreach($obj as $key => $value){
				
				$total = count($value);
				
				$content .=  '<label><span style="color:#008000">Total: '.$total.'</span> </label>';
							  
				   $content .='<table class=greentable>
				   				<thead><tr>
								<th>CRQ#</th>
								<th>TYPE</th>
								<th>START TIME</th>
								<th>END TIME</th>
								<th>PRIORITY</th>
								<th>COORD\'S GRP</th>
								<th>STATUS</th>
								<th>CUSTOMER</th>
								<th>DEVICE</th>
								<th style=width:150px;>SUMMARY</th>
								</tr></thead><tbody>';
				
   
							foreach($value as $k ){
								
								 $content .=  '<tr>';
								 foreach($k as $one => $two ){
									$content .=  '<td>'.$two[0].'</td>';
								}
								 $content .=  '</tr>';
								
							}
							
				}
				 $content .=  '</table> <table align=right>
				 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 </table>';
		}
		else {
		
		
		  $content .=  ' NO Draft-CRQ as of the moment';
		}	
		return $content;
	}
    
	
		function crq_start24($xmlcrq_start24){
			
			$content = '';
			
			$Timestamp = FileManager::GetTimestamp($xmlcrq_start24);
			
			$obj = simplexml_load_file($xmlcrq_start24);
	
			
			$t = $this->total($obj);
		
			if ( 0 < $t ){
				
				foreach($obj as $key => $value){
				
				$total = count($value);
				
				
				$content .=  '<label><span style="color:#008000">Total : '.$total.'</span></label>';
				  
				   $content .='<table class=greentable>
				   				<thead><tr>
								<th>CRQ#</th>
								<th>TYPE</th>
								<th>START TIME</th>
								<th>END TIME</th>
								<th style=width:50px;>URGENCY</th>
								<th style=width:60px;>TASK\'S GROUP</th>
								<th style=width:60px;>COORD\'S GROUP</th>
								<th style=width:100px;>STATUS</th>
								<th style=width:120px;>CUSTOMER</th>
								<th>SUMMARY</th>
								</tr></thead><tbody>';
								
   
						foreach($value as $k ){
					
						 $content .=  '<tr>';
						  foreach($k as $one => $two ){

						  
						  
						       if ($two[0] ==  'Pending' ){
							  	 $content .=  '<td style="background-color:#ff1a1a;"><span style="color:#FFFFFF;">'.$two[0].'</span></td>';
								 
							   } elseif ($two[0] ==  'Planning In Progress') {
							      $content .=  '<td style="background-color:#FFEE58;"><span style="color:#43464B;">'.$two[0].'</span></td>';
							
							   } elseif ($two[0] ==  'Scheduled For Review') {
							      $content .=  '<td style="background-color:#FFD180;"><span style="color:#43464B;">'.$two[0].'</span></td>';
								   #$content .=  '<td style="background-color:#ffc107;"><span style="color:#43464B;">'.$two[0].'</span></td>';
							
							   } elseif ($two[0] ==  'Scheduled For Approval') {
							      $content .=  '<td style="background-color:#80CBC4;"><span style="color:#43464B;">'.$two[0].'</span></td>';
							
							   }elseif ($two[0] ==  'Scheduled') {
							      $content .=  '<td style="background-color:#558B2F;"><span style="color:#FFFFFF;">'.$two[0].'</span></td>';
							
							   } else{
									$content .=  '<td> '.$two[0].'</td>';
								}
							}
						 $content .=  '</tr>';
					
						}
					
					
				}
				 $content .=  '</table> 
				 <table align=right>
				 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 </table>';
				 //<label><span style="color:#C0C0C0;float:right;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i></span></label>';
			}else {
			   $content .=  ' NO CRQ\'s as of the moment';
			}
		return  $content;
	}
	
	
  function crq_pending ($xmlcrqdpending){
		 
		//print $xmlcrqdrafts;
		$content = '';
		
		$Timestamp = FileManager::GetTimestamp($xmlcrqdpending);
		
		$obj = simplexml_load_file($xmlcrqdpending);
		//print '<<pre>';
		//print_r($obj);
		$t = $this->total($obj);
		
		if ( 0 < $t ){
		
				foreach($obj as $key => $value){
				
				$total = count($value);
				
				$content .=  '<label><span style="color:#008000">Total: '.$total.'</span> </label>';
							  
				   $content .='<table class=greentable>
				   				<thead><tr>
								<th>CRQ#</th>
								<th>TYPE</th>
								<th>START TIME</th>
								<th>END TIME</th>
								<th>PRIORITY</th>
								<th>COORD\'S GRP</th>
								<th>STATUS</th>
								<th>CUSTOMER</th>
								<th>DEVICE</th>
								<th style=width:150px;>SUMMARY</th>
								</tr></thead><tbody>';
				
   
							foreach($value as $k ){
								
								 $content .=  '<tr>';
								 foreach($k as $one => $two ){
								 
								 	 if ($two[0] ==  'Pending' ){
										$content .=  '<td style="background-color:#ff1a1a;"><span style="color:#FFFFFF;">'.$two[0].'</span></td>';
									}else{
									
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
		
		
		  $content .=  ' NO Pending-CRQ\'s as of the moment';
		}	
		return $content;
	}
	
}


?>