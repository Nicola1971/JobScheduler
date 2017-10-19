<?php
define('MODX_API_MODE', true);
include_once(dirname(__FILE__)."../../../../index.php");
$modx->db->connect();
if (empty ($modx->config)) {
    $modx->getSettings();
}
$modx->invokeEvent("OnWebPageInit");
$message = "Backup Sql Database Successfull";

$out = $modx->runSnippet('CronEvoBackup', array('mode' => 'dbonly', 'zipdb' => '0', 'number_of_backups' => '10', 'sendEmail' => 'yes'));
$return = array('message' => $out);
//echo json_encode($return);
echo $message;
?>