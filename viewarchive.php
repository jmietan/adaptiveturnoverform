<?php
require_once('config.php');

$objArch = new Archive();
$content = $objArch->viewarchive();

print'<pre>';
print_r($content);





?>

