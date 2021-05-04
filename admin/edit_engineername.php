<?php
error_reporting(1);

include_once('config.php');


$objTempCon = new Controller();
$objEng = new Engineer();
$objFM = new FileManager();


$strReg = ($_GET['reg'] == '') ? 'US' : $_GET['reg'];

if ($_POST['btnSubmit'] == 'SAVE'){
	
	//print 'SAVE';
	$strReg = $_POST['txtReg'];
	$strNames = $_POST['txtEngineernames'];
	$filename = PATH_TXT.'\\'.$strReg.'_Names.txt';
	$objFM->voidMakeFile($strNames,'',$filename);
	print "<script>alert('Saved!');
	window.location = 'edit_engineername.php?reg=".$strReg."';
	</script>";


	
}
else{


	$arrBdyContent['Reg'] = $strReg;

	$arrBdyContent['title'] = 'Add/Edit '.$strReg.' Enginner Names';
	$arrBdyContent['Reg'] = $strReg;
	$arrBdyContent['ErrMsg'] = '';
	
	$arrBdyContent['Eng_names'] = $objEng->EngineerName_List($strReg);
	
	
	$content .=$objTempCon->header_index();
	$content .=$objTempCon->body_edit($arrBdyContent);
	print $content;
}


?>