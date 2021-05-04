<?php

define('EMAILTO', 'C:\xampp\htdocs\adaptive\turnoverdev-v5\txt\tEmailAdd.txt');
define('PATH_ARCHIVE', 'C:\xampp\htdocs\adaptive\turnoverdev-v5\archive');
define('PATH_TEMPLATE', 'C:\xampp\htdocs\adaptive\turnoverdev-v5\template');
define('PATH_TXT', 'C:\xampp\htdocs\adaptive\turnoverdev-v5\txt');

require_once('lib\clsFile.php');
require_once('lib\TemplateController.php');
require_once('lib\clsArchive.php');
require_once('lib\clsCases.php');
require_once('lib\clsCRQ.php');
require_once('lib\clsMail.php');
require_once('lib\clsSuppression.php');


$xmlhigh_incidents = 'C:\xampp\htdocs\XML\adaptive-high-inc.xml';
$xmlswq=  'C:\xampp\htdocs\XML\adaptive-swq.xml';
$xmlCRQdrafts =  'C:\xampp\htdocs\XML\adaptive-CRQdrafts.xml';
$xmlCRQStart24=  'C:\xampp\htdocs\XML\adaptive-CRQnext24.xml';
$xmlCRQpending=  'C:\xampp\htdocs\XML\adaptive-CRQpending.xml';
$xmlsupptickets = 'C:\xampp\htdocs\XML\adaptive-supression-inc.xml';

$txt_mgmtawareness = 'C:\xampp\htdocs\adaptive\turnover\txt\nMgmt_Awareness.txt';
$txt_HHO = 'C:\xampp\htdocs\adaptive\turnover\txt\nHHO.txt';
$txt_maintenance = 'C:\xampp\htdocs\adaptive\turnover\txt\nMaintenance.txt';

?>