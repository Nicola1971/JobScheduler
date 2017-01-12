<?php
define('MODX_API_MODE', true);
include_once(dirname(__FILE__)."../../../../index.php");
$modx->db->connect();
if (empty ($modx->config)) {
    $modx->getSettings();
}
$modx->invokeEvent("OnWebPageInit");
$message = "Backup Database Successfull";

$out = $modx->runSnippet('CronEvoBackup', array('mode' => 'dbonly', 'zipdb' => '0'));
$return = array('message' => $out);
//echo json_encode($return);
echo $message;
?>