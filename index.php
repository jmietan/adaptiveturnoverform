<?php  
include_once('config.php');
##powershell script, generates xml
# the xml is generated in this path  root folder /xml
#echo $output // True 
error_reporting(0);
set_time_limit(0);
date_default_timezone_set('GMT'); 


$objTempCon = new TemplateController();
$objCases = new Cases();
$objCRQ = new CRQ();
$objSendMail = new SendMail();
$objSupp = new Suppression();
$objFM = new FileManager();



$content = '';



if (!empty($_POST)){
	
	if($_POST['btn_SaveMgmt'] == 'Save'){
		
		$nMgmtContent = nl2br($_POST['txtMgmtHigh']);
		$objFM->voidMakeFile($nMgmtContent,'',$txt_mgmtawareness);
		print "<script>alert('Saved!');
		window.location = 'index.php#txtMgmtHigh';
		</script>";
		//header('Location:index.php');
   		die();
	
	}elseif ($_POST['btn_SaveHHO'] == 'Save'){
		$nHHO = nl2br($_POST['txtHHO']);
		$objFM->voidMakeFile($nHHO,'',$txt_HHO);
		print "<script>alert('Saved!');
		window.location = 'index.php#txtHHO';
		</script>";
		//header('Location:index.php');
   		die();
	
	}elseif ($_POST['btn_SaveMaint'] == 'Save'){
		$nMaint = nl2br($_POST['txtMaintenances']);
		$objFM->voidMakeFile($nMaint,'',$txt_maintenance);
		print "<script>alert('Saved!');
		window.location = 'index.php#txtMaintenances';
		</script>";
		//header('Location:index.php');
   		die();
	}elseif ($_POST['sbt'] == 'SAVE & SEND'){
			
		
		$TurnoverBody = '';
		
		$rg_From = $_POST['sl_RegionFrom'];
		$rg_To = $_POST['sl_RegionTo'];
		$arrEmailContent['sl_RegionFrom'] = $rg_From;
		$arrEmailContent['sl_RegionTo'] =  $rg_To;
		$arrEmailContent['sl_ICRegionTo'] = $_POST['sl_ICRegionTo'];
		$arrEmailContent['sl_ICRegionFrom'] = $_POST['sl_ICRegionFrom'];
		$arrEmailContent['sl_CRQAdminTo'] = $_POST['sl_CRQAdminTo'];
		$arrEmailContent['sl_CRQAdminFrom'] = $_POST['sl_CRQAdminFrom'];
		
		if(!empty($_POST['sl_ICRegionTo']) AND !empty($_POST['sl_ICRegionFrom'])){
		   
		   	$arrEmailContent['hd_high_incidents'] =$_POST['hd_high_incidents'];
			
			
			$arrEmailContent['txtHHO'] = nl2br($_POST['txtHHO']);
			$arrEmailContent['hd_cf'] =  $_POST['hd_cf'];
			$arrEmailContent['hd_swq'] =  $_POST['hd_swq'];
				
			$arrEmailContent['crq_drafts'] = $_POST['hd_crqdrafts'];
			$arrEmailContent['crq_start24'] = $_POST['hd_crqstart24'];
			$arrEmailContent['crq_pending'] = $_POST['hd_crqpending'];
			
			
			$arrEmailContent['txtMaintenances'] = nl2br($_POST['txtMaintenances']);
			$arrEmailContent['hd_maintenances'] =  $_POST['hd_maintenances'];
			
			
			$nMgmtContent = nl2br($_POST['txtMgmtHigh']);
			$objFM->voidMakeFile($nMgmtContent,'',$txt_mgmtawareness);
			$arrEmailContent['txtMgmtHigh'] = $nMgmtContent;
			
			$nHHO = nl2br($_POST['txtHHO']);
			$objFM->voidMakeFile($nHHO,'',$txt_HHO);
			$arrEmailContent['txtHHO'] = $nHHO;
			
			$nMaint = nl2br($_POST['txtMaintenances']);
			$objFM->voidMakeFile($nMaint,'',$txt_maintenance);
			$arrEmailContent['txtMaint'] = $nMaint;
			
			
			
			$TurnoverBody .=$objTempCon->header_email();
			$TurnoverBody .=$objTempCon->body_email($arrEmailContent);
			$TurnoverBody .=$objTempCon->footer();
		
		
		    $errMessage = $objSendMail->SendTurnover($TurnoverBody, $rg_From, $rg_To);
		   
		    #$errMessage = 'testing';
		   $Output = str_replace('[*errmessage*]',$errMessage,$TurnoverBody);
			
		}else{
			
			$arrBodyContent['US_Engineers'] = $objTempCon->US_Engineers();
			$arrBodyContent['SG_Engineers'] = $objTempCon->SG_Engineers();
			$arrBodyContent['UK_Engineers'] = $objTempCon->UK_Engineers();
			$arrBodyContent['high_incidents'] = $objCases->high_incidents($xmlhigh_incidents);
			$arrBodyContent['hd_high_incidents'] = str_replace('"', ' ',$objCases->high_incidents($xmlhigh_incidents));
			$arrBodyContent['swq'] = $objCases->swq($xmlswq);
			$arrBodyContent['hd_swq'] = str_replace('"', ' ',$objCases->swq($xmlswq));
			
			$arrBodyContent['crq_drafts'] = $objCRQ->crq_drafts($xmlCRQdrafts);
			$arrBodyContent['hd_crq_drafts'] =  str_replace('"', ' ',$objCRQ->crq_drafts($xmlCRQdrafts));
			
			$arrBodyContent['crq_start24'] = $objCRQ->crq_start24($xmlCRQStart24);
			$arrBodyContent['hd_crqstart24'] =  str_replace('"', ' ',$objCRQ->crq_start24($xmlCRQStart24));
			
			$arrBodyContent['crq_pending'] = $objCRQ->crq_pending($xmlCRQpending);
			$arrBodyContent['hd_crqpending'] =  str_replace('"', ' ',$objCRQ->crq_pending($xmlCRQpending));
			
			$arrBodyContent['maintenances'] =  $objSupp->SuppTickets($xmlsupptickets);
			$arrBodyContent['hd_maintenances'] =  str_replace('"', ' ',$objSupp->SuppTickets($xmlsupptickets));
			
			$arrBodyContent['txtMgmtHigh'] = strip_tags($objFM->voidReadFile('',$txt_mgmtawareness));
			$arrBodyContent['txtHHO'] = strip_tags($objFM->voidReadFile('',$txt_HHO));
			$arrBodyContent['txtMaint'] = strip_tags($objFM->voidReadFile('',$txt_maintenance));
				
			$TurnoverBody .=$objTempCon->header_email();
			$TurnoverBody .=$objTempCon->body_index($arrBodyContent);
			$TurnoverBody .=$objTempCon->footer();
			 
			 $errMessage = '<font color="FF0000" size="3px">Please fill in the Admin Section!</font>';
			 
			 $Output = str_replace('[*errmessage*]',$errMessage,$TurnoverBody);
		}
	
	   print $Output;
	}
   
}
else{


	$arrBodyContent['US_Engineers'] = $objTempCon->US_Engineers();
	$arrBodyContent['SG_Engineers'] = $objTempCon->SG_Engineers();
	$arrBodyContent['UK_Engineers'] = $objTempCon->UK_Engineers();
	
	$arrBodyContent['high_incidents'] = $objCases->high_incidents($xmlhigh_incidents);
	$arrBodyContent['hd_high_incidents'] = str_replace('"', ' ',$objCases->high_incidents($xmlhigh_incidents));
	
	$arrBodyContent['cf'] = $objCases->customerflag($xmlcf);
	$arrBodyContent['hd_cf'] = str_replace('"', ' ',$objCases->customerflag($xmlcf));
	
	
	$arrBodyContent['swq'] = $objCases->swq($xmlswq);
	$arrBodyContent['hd_swq'] = str_replace('"', ' ',$objCases->swq($xmlswq));
	
	
	$arrBodyContent['crq_drafts'] = $objCRQ->crq_drafts($xmlCRQdrafts);
	$arrBodyContent['hd_crq_drafts'] =  str_replace('"', ' ',$objCRQ->crq_drafts($xmlCRQdrafts));
	
	$arrBodyContent['crq_start24'] = $objCRQ->crq_start24($xmlCRQStart24);
	$arrBodyContent['hd_crqstart24'] =  str_replace('"', ' ',$objCRQ->crq_start24($xmlCRQStart24));
	
	$arrBodyContent['crq_pending'] = $objCRQ->crq_pending($xmlCRQpending);
	$arrBodyContent['hd_crqpending'] =  str_replace('"', ' ',$objCRQ->crq_pending($xmlCRQpending));
	
	
	$arrBodyContent['maintenances'] =  $objSupp->SuppTickets($xmlsupptickets);
	$arrBodyContent['hd_maintenances'] =  str_replace('"', ' ',$objSupp->SuppTickets($xmlsupptickets));
	
	$arrBodyContent['txtMgmtHigh'] = strip_tags($objFM->voidReadFile('',$txt_mgmtawareness));
	$arrBodyContent['txtHHO'] = strip_tags($objFM->voidReadFile('',$txt_HHO));
	$arrBodyContent['txtMaint'] = strip_tags($objFM->voidReadFile('',$txt_maintenance));    
	     
	$content .=$objTempCon->header_index($arrHeader);
	$content .=$objTempCon->body_index($arrBodyContent);
	$content .=$objTempCon->footer();
		
	print $content;
}
?>

