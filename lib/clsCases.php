<?php

class Cases extends FileManager{

	function total($arr){
	 
	 
	  foreach($arr as $key => $value){

				$content = count($value);
		}
		
	  return $content; 
	 }


	function high_incidents ($xmlhigh){
	    $content = '';
		$x =0;
		$Timestamp = '';
			
		$Timestamp = FileManager::GetTimestamp($xmlhigh);

		$obj = simplexml_load_file($xmlhigh);	
		
		$t = $this->total($obj);
		
		  
		if ( 0 < $t){
							
				foreach($obj as $key => $value){

				$total = count($value);

				$content .=  '<label><span style="color:#008000">Total : '.$total.'</span> </label><br/>';
				$content .= '<label><span style="color:#008000">Displaying All Cases</span></label>';
				$content .='<table class=greentable>
				  				<thead><tr>
								<th>CASE</th>
								<th>CUSTOMER</th>
								<th>PRIORITY</th>
								<th>STATUS</th>
								<th>ASSIGNEE</th>
								<th>DEVICE</th>
								<th style=width:180px;>SUMMARY</th>
								<th>SLOExp Min</th>
								<th>Last Modified</th>

								</tr></thead><tbody>';
	  
					foreach($value as $k ){
					
						 $content .='<tr>';
						 foreach($k as $one => $two ){
							 $content .= '<td>'.$two[0].'</td>';
						}
						 $content .= '</tr>';
						
					}
				
					
				}
				 $content .= '</tbody></table>
				 	<table align=right>
					 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 	</table>';
		}
		else {
			
		  $content .= 'No P1-P2 cases as of the moment';
		}	
	
	 return $content;
	}
	
	function swq($xmlswq){
	     $content = '';
		 $x =0;
		 $Timestamp = '';
					
		
		$Timestamp = FileManager::GetTimestamp($xmlswq);
		
		$obj = simplexml_load_file($xmlswq);
		
		$t = $this->total($obj);
		
 		
		if (0 < $t){
				
								
				foreach($obj as $key => $value){
				
				$total = count($value);
				
					
					 $content .=  '<label><span style="color:#008000">Total :'.$total.'</span> </label><br/>';
					  $content .= '<label><span style="color:#008000">Displaying First 10 Cases</span></label>';
					  
	
					   $content .= '<table class=greentable>';
					   
					   $content .='<thead>
									<tr>
									<th>CASE</th>
									<th>CUSTOMER</th>
									<th>PRIORITY</th>
									<th>STATUS</th>
									<th style=width:180px;>SUMMARY</th>
									<th style=width:80px;>CUSTOMER UPDATE</th>
									<th>SLOExp Min</th>
									<th>Last Modified</th>
									</tr>
									</thead>
									<tbody>';
					  
	 
						
							foreach($value as $k ){	
								if($x == 10) break;	
								
								 $content .=  '<tr>';
									foreach($k as $one => $two ){
										 $content .=  '<td>'.$two[0].'</td>';
	
									}
								 $content .= '</tr>';
								$x++;  
							}
						
						
					}
					 $content .=  '</tbody></table>
					  <table align=right>
					 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 	</table>';
					 
					# <label><span style="color:#C0C0C0;float:right;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i></span></label>';
					 
					 

				
		}
		else {
		
		  $content .=  ' NO ACTIVE CASES as of the moment';
		}	
	
	return $content;
	}
	
   function customerflag($xmlcf){
   
   		 $content = '';
		 $Timestamp = '';
					
		
		$Timestamp = FileManager::GetTimestamp($xmlcf);
		
		$obj = simplexml_load_file($xmlcf);
		
		$t = $this->total($obj);
		
 		
		if (0 < $t){
				
								
				foreach($obj as $key => $value){
				
				$total = count($value);
				
					
					 $content .=  '<label><span style="color:#008000">Total :'.$total.'</span> </label><br/>';
					  $content .= '<label><span style="color:#008000">Displaying  All Cases</span></label>';
					  
	
					   $content .= '<table class=greentable>';
					   
					   $content .='<thead>
									<tr>
									<th>CASE</th>
									<th>CUSTOMER</th>
									<th>PRIORITY</th>
									<th>STATUS</th>
									<th>DEVICE</th>
									<th style=width:180px;>SUMMARY</th>
									<th>LAST MODIFIED (hrs:mins)</th>
									</tr>
									</thead>
									<tbody>';
					  
	 
						
							foreach($value as $k ){	
								
								
								 $content .=  '<tr>';
									foreach($k as $one => $two ){
										 $content .=  '<td>'.$two[0].'</td>';
	
									}
								 $content .= '</tr>';
								
							}
						
						
					}
					 $content .=  '</tbody></table>
					  <table align=right>
					 <tr><td  style="color:#C0C0C0;font-size:11px;"><i>xml last update: '.$Timestamp.' GMT </i><td></tr>
				 	</table>';
					 
				
		}
		else {
		
		  $content .=  ' NO Customer Update as of the moment';
		}	
	
	return $content;
   
   }
	
}


?>