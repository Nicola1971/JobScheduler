<?php
define('MODX_API_MODE', true);
include_once(dirname(__FILE__)."../../../../index.php");
$modx->db->connect();
if (empty ($modx->config)) {
    $modx->getSettings();
}
$modx->invokeEvent("OnWebPageInit");
$message = "Restore Database Successfull";
$modx->clearCache();
$out = $modx->runSnippet('CronRestoreDB', array('sql_restore_file' => '2017-10-20_17-33-42.sql'));
$return = array('message' => $out);
//echo json_encode($return);
echo $out;

?>