<?php
class FileManager{

    function voidReadFile($path,$filename)
    {
        $content = "";
        $strTemplatePath =$path.$filename;
        $file = fopen($strTemplatePath, 'r');
        $content = fread($file, filesize($strTemplatePath));
        fclose($file);
        return $content;
    }
    function voidMakeFile($val,$path,$filename)
    {
        $strTemplatePath = $path.$filename;
        if($voidHandler = fopen($strTemplatePath,"w+"))
        {
          fputs($voidHandler,$val);
        }
        fclose($voidHandler);
        return true;
    }
	
	function ReplaceVals($template , $array){
		foreach($array as $key => $val){
            $template = str_replace('[*'.$key.'*]',$val,$template);
        }

		return $template;
	}


	function GetTimestamp ($xmlfile){
		#clearstatcache();
	
		$GetTimestamp = '';
		
		$time= filemtime($xmlfile);
		
		$GetTimestamp = gmdate("F d, Y H:i", $time);
			
		return  $GetTimestamp;
	
	}
}

?>