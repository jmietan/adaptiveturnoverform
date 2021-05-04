<?php
error_reporting(0);

include_once('config.php');

$objTempCon = new Controller();


$arrBdyContent['title'] = 'Adaptive Support Turnover Admin';
$arrBdyContent['BdyContent'] = '';
$content .=$objTempCon->header_index();
$content .=$objTempCon->body_index($arrBdyContent);


print $content;

?>