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
	
	function voidFileExists ($target_file){
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		
		return $uploadOk;
	}
	
	function voidFileSize ($fileuploaded){
		if ($fileuploaded > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		return $uploadOk;
	}
	
	function voidFileFormat($imageFileType){
	
		// Allow certain file formats
		if($imageFileType != "xml"  ) {
			echo "Sorry, only XML files are allowed.";
			$uploadOk = 0;
		}
		return $uploadOk;
	}
	
	function ReplaceVals($template , $array){
		foreach($array as $key => $val){
            $template = str_replace('[*'.$key.'*]',$val,$template);
        }

		return $template;
	}	

}

?>