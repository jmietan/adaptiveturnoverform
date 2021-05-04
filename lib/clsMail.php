<?php
//require_once('clsArchive.php');
require_once('config.php');

class SendMail extends Archive {

  function SendTurnover ($strTurnoverBody, $rg_From, $rg_to){
  
   $strNotice ='';
   $body ='';
   $body = str_replace('[*errmessage*]','',$strTurnoverBody); 
   
	
   	$myfile = fopen(EMAILTO, "r") or die("Unable to open file!");
	$to =fgets($myfile);
	fclose($myfile);
  
   #$to = "jmie83@gmail.com, jaymie.tan@centurylink.com ";


   $subject = 'GOC Adaptive Support - Turnover '.$rg_From.' to '. $rg_to;
   
   // Always set content-type when sending HTML email
   $headers .= "From: Adaptivesupport@centurylink.com \r\n";
   $headers .= "Reply-To: Adaptivesupport@centurylink.com \r\n";
   $headers .= "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
  
  
   if(mail($to,$subject,$body, $headers))
    {
         $strNotice .= "<font color=\"#008000\">Your Turnover has been sent to <br/>" .  $to.'</font>"';
		 $strNotice .= Archive::LetsArchive($body, $rg_From, $rg_to) ;
		 
    } 
    else 
    {
         $strNotice .= "<font color=\"red\">Error in sending the Turnover form</font>";
    }
  	return $strNotice;
  }
}
?>