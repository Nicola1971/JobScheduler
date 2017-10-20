/**
 * CronRestoreDB
 *
 * Execute a DB restore 
 *
 * @author    Nicola Lambathakis
 * @version    1.0 RC
 * @category	snippet
 * @internal	@modx_category admin
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 */
<?php
// usage
// [!CronRestoreDB? &sql_restore_file=`2017-10-20_17-33-42.sql`!]
// [!CronRestoreDB!] http://localhost/evotest/restore.html&sql_restore_file=2017-10-20_17-33-42.sql 
/*manual config for now*/
$sendEmail = isset($sendEmail) ? $sendEmail : 'yes';
$SendTo = isset($SendTo) ? $SendTo : $modx->config['emailsender'];
$subject = isset($subject) ? $subject : 'restore db done';
$SendToCC = isset($SendToCC) ? $SendToCC : '';
$modx_db_backup_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/backup/';
//comment the line below for url parameter
$sql_restore_file = isset($sql_restore_file) ? $sql_restore_file : '';
//uncomment the line below for url parameter
//$sql_restore_file = isset($_GET['sql_restore_file']) ? $_GET['sql_restore_file'] : '';
$path = $modx_db_backup_dir.$sql_restore_file;
global $dbase,$database_user,$database_password,$dbname,$database_server;
$sqlSource = file_get_contents($path);
if($sqlSource == false AND empty($sqlSource))
{
$out = "<h1> no restore file in '$path'</h1>";
}
else {
//$out = "<div class=\"success\"> <h1>we got it: '$path'</h3></div>";
$dbname = str_replace("`","",$dbase);        
$sql = mysqli_connect($database_server, $database_user, $database_password, $dbname);
mysqli_multi_query($sql,$sqlSource);
$modx->clearCache();
  // Send email	
if ($sendEmail == 'yes') {
$to = $SendTo;
$txt = "[(site_name)] Restore DB Done";
$msg = wordwrap($txt,255);
$headers = "From: ".$modx->config['emailsender']."" . "\r\n" .
"CC: ".$SendToCC."";
mail($to,$subject,$msg,$headers);
}
// end Send email
$out = "<div class=\"success\"> <h1>restored : '$path'</h3></div>";
};
return $out;