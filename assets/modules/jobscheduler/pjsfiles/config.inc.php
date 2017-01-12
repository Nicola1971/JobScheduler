<?php
// ---------------------------------------------------------
 $app_name = "phpJobScheduler";
 $phpJobScheduler_version = "3.9";
// ---------------------------------------------------------
include_once ($_SERVER['DOCUMENT_ROOT'].'/manager/includes/config.inc.php');
$dbase_name = str_replace("`","",$dbase);
define('DBHOST', $database_server);// database host address - localhost is usually fine

define('DBNAME', $dbase_name);// database name - must already exist
define('DBUSER', $database_user);// database username - must already exist
define('DBPASS', $database_password);// database password for above username

define('DEBUG', false);// set to false when done testing