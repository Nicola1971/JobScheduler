<?php
$app_name = "phpJobScheduler";
$phpJobScheduler_version = "3.9";
// -------------------------------
define('MODX_API_MODE', true);
include_once ('../../../../manager/includes/config.inc.php');
require_once('../../../../manager/includes/protect.inc.php');
include_once ('../../../../manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->loadExtension("ManagerAPI");
$modx->getSettings();
global $modx;
$module_id = (!empty($_REQUEST["id"])) ? (int)$_REQUEST["id"] : $yourModuleId;
//lang
$_lang = array();
include('../lang/english.php');
if (file_exists('../lang/english.php' . $modx->config['manager_language'] . '.php')) {
    include('../lang/' . $modx->config['manager_language'] . '.php');
}
include_once("functions.php");
update_db(); // check database is up-to-date, if not add required tables
include("header.html");
if (isset($_GET['add'])) include("add-modify.html");
else include("main.html");
include("footer.html");
?>