<?php

define('EMAILTO', '/data02/websites/gochandoff/htdocs/adaptive/turnover/txt/tEmailAdd.txt');
define('PATH_ARCHIVE', '/data02/websites/gochandoff/htdocs/adaptive/turnover/archive');
define('PATH_TEMPLATE', '/data02/websites/gochandoff/htdocs/adaptive/turnover/template');

require_once('lib/clsFile.php');
require_once('lib/TemplateController.php');
require_once('lib/clsArchive.php');
require_once('lib/clsCases.php');
require_once('lib/clsCRQ.php');
require_once('lib/clsMail.php');
require_once('lib/clsSuppression.php');


$xmlhigh_incidents = '/data02/websites/gochandoff/htdocs/XML/adaptive-high-inc.xml';
$xmlswq=  '/data02/websites/gochandoff/htdocs/XML/adaptive-swq.xml';
$xmlCRQdrafts =  '/data02/websites/gochandoff/htdocs/XML/adaptive-CRQdrafts.xml';
$xmlCRQStart24=  '/data02/websites/gochandoff/htdocs/XML/adaptive-CRQnext24.xml';
$xmlCRQpending=  '/data02/websites/gochandoff/htdocs/XML/adaptive-CRQpending.xml';
$xmlsupptickets = '/data02/websites/gochandoff/htdocs/XML/adaptive-supression-inc.xml';

$txt_mgmtawareness = '/data02/websites/gochandoff/htdocs/adaptive/turnover/txt/nMgmt_Awareness.txt';
$txt_HHO = '/data02/websites/gochandoff/htdocs/adaptive/turnover/txt/nHHO.txt';
$txt_maintenance = '/data02/websites/gochandoff/htdocs/adaptive/turnover/txt/nMaintenance.txt';


?>