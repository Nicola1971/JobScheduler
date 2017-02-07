<?php 
global $_lang, $manager_language, $manager_theme, $theme_refresher, $modx_manager_charset, $syncid, $syncsite, $messagesallowed; 
$modx_root_dir=$modx->config['base_path']; 
$mods_path = $modx->config['base_path'] . "assets/modules/"; 
$site_name = preg_replace('/[^a-zA-Z0-9]+/', '_', $modx->config['site_name']); 
$module_id = (!empty($_REQUEST["id"])) ? (int) $_REQUEST["id"] : $yourModuleId; 
$out = '
<html>

<head>
	<title>phpJobScheduler</title>
	<link rel="stylesheet" type="text/css" href="media/style/' . $manager_theme . '/style.css" />
	<link rel="stylesheet" href="media/style/common/font-awesome/css/font-awesome.min.css" />
	<script src="../assets/modules/jobscheduler/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/modules/jobscheduler/js/tabpane.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/modules/jobscheduler/css/style.css" /> </head>

<body>
	<h1 class="pagetitle">
  <span class="pagetitle-icon">
    <i class="fa fa-clock-o"></i>
  </span>
  <span class="pagetitle-text">
    JobScheduler
  </span>
</h1>
	<div id="actions">
		<ul class="actionButtons">
			<li id="Button5"><a href="index.php?a=2">
            ' . $_lang['close'] . '
        </a> </li>
		</ul>
	</div>
	<div class="sectionBody">
		<div class="tab-pane" id="tab-pane-1">
			<div class="tab-page">
				<h2 class="tab"><i class="fa fa-clock-o" aria-hidden="true"></i> Tasks</h2>
				<h3> Manage Tasks</h3>
				<p><a href="../assets/modules/jobscheduler/pjsfiles/"><i class="fa fa-clock-o fa-lg"></i><strong> Scheduled tasks</strong></a> </p>
				<p><a href="../assets/modules/jobscheduler/pjsfiles?add=1"><i class="fa fa-plus-circle fa-lg"></i><strong> Add a NEW schedule</strong></a> </p>
				<p><a href="../assets/modules/jobscheduler/pjsfiles/error-logs.php"><i class="fa fa-exclamation-circle fa-lg"></i><strong> View error-logs</strong></a> </p>
				<p><a href="../assets/modules/jobscheduler/firepjs.php"><i class="fa fa-play-circle fa-lg"></i> <strong> Run the scheduled tasks already 
  added above.</strong></a> </p>
			</div>
			<div class="tab-page">
				<h2 class="tab"><i class="fa fa-book" aria-hidden="true"></i> Readme</h2>
				<h3>PhpJobScheduler Module for MODX Evolution </h3>
				<p><strong><em>php</em>JobScheduler is designed to automate tasks by
scheduling PHP scripts to run at set intervals.</strong>
					<br> This version runs silently (no screen output) but saves the output, including any errors, to the database.
					<br> Full details can be found at: <a href="http://www.phpjobscheduler.co.uk/">www.phpjobscheduler.co.uk</a> </p> <strong>
<h3>Guide for MODX Evolution</h3>
<p>Requirements:</strong>
				<ul>
					<li>MODX Evolution 1.2</li>
					<li>MySQL (should now work with many other databases, just change the settings in&nbsp; /phpjobscheduler/pjsfiles/constants.inc.php)</li>
					<li>PHP 5.x</li>
				</ul>
				<p><strong>Index:</strong> </p>
				<ul>
					<li><a href="#new_install">NEW install</a> - how to install from fresh </li>
					<li><a href="#error_log">Error log</a> - error logging, turn on and off</li>
					<li><a href="#timeframewindow">TimeFrame window</a> - altering the time frame window, how to change the settings to suit your website</li>
					<li><a href="#debug">Debug</a> - testing</li>
				</ul> <strong><p>New installation on Evolution:</strong>
				<a name="new_install"></a>
				<ul>
					<li>Install with Package Manager or Extras Module
						<br> </li>
					<li type="i">Enable <strong> firepjs</strong> plugin (included in this package), that will automatically add the required code.
						<p><font color="#8080C0"><strong></strong></font>
							<br> </p>
					</li>
					<li type="i">or simply add to your <strong>existing<font color="#0080FF"> Template</font> or inside the content of a page</strong>, like your home page and/or any other well visited page on any website:
						<br> </li> <code>
     &lt;img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/&gt</code>
					<p> The above <strong><font color="#0080FF">HTML</font></strong> can be added to any web page on any website (not just to the site where phpJobScheduler is installed). Adding this code will add a very small clear image to your page - invisible (unless you know its there). Execution is very quick so will not slow the loading of any pages. </p>
					</li>
					<li>click on <strong><i class="fa fa-plus-circle fa-lg"></i> Add a NEW schedule</strong>, in the Tasks tab, to add your scheduled tasks</strong>
						<br>
						<br> </li>
					<p>If you have correctly completed the above the following <strong><font color="#FF8000">tables</font></strong> will be created in your database database: </p>
					<ul>
						<p align="left"><font color="#FF8000"><strong>phpJobScheduler<br>
        phpJobScheduler_log</strong></font> </p>
					</ul>
					<li>click on <i class="fa fa-play-circle fa-lg"></i> <strong> Run the scheduled tasks</strong> to run the scheduled tasks already added above.&nbsp; This allows you to check the output and to see all is working.&nbsp; As DEBUG is on by default you should see some output if it is working for you like:&nbsp; &quot;Found script to run...&quot;, etc.
						<br>
						<br> </li>
					<li>When you are happy all is running without error set DEBUG to false, edit the file:<strong> /phpjobscheduler/pjsfiles/config.inc.php </strong>
						<br>
						<br> </li>
				</ul>
				<hr width="100%" color="#808080" align="center">
				<p><strong><a name="error_log"></a><font color="#FF8000">Error log</font> - recording of
    runs and errors of each fired task.</strong> </p>
				<p>Recorded data: date of last run, and url including errors if any occur. If &quot;Output:&quot; has no data then this means the script ran without errors or output. </p>
				<p>By default error logging is turned on (TRUE). To turn on/off error logs: </p>
				<p>Change the value assigned to ERROR_LOG within the <strong>/pjsfiles/constants.inc.php</strong> file. Change the value to FALSE to stop logging. It will not affect the running of fired scripts if you turn off error logging. </p>
				<p>The output is truncated to a maximum length of 1200 characters by default to ensure the logs table does not become too large. You can change this by editing the constant MAX_ERROR_LOG_LENGTH within the constants.inc.php file.</p>
				<p>&nbsp;</p>
				<hr width="100%" color="#808080" align="center">
				<p>
					<a name="timeframewindow"></a><strong><font color="#FF8000">Altering the time frame
    window</font></strong> </p>
				<p align="left">This can be changed by altering the value assigned to TIME_WINDOW within the <strong>/pjsfiles/constants.inc.php</strong> file.&nbsp; The default value is 3600 seconds (60 minutes&nbsp; which should suffice for most sites).&nbsp; This means that when the firing engine (phpjobscheduler/firepjs.php) is called any scheduled job having a fire time within 60 minutes will be executed.</p>
				<p align="left">You can increase or decrease the default value of the time frame window.&nbsp; If your site receives just a few hits per day you should consider increasing the value to 43200 (12 hours).</p>
				<p align="left">If your site<strong> ALWAYS</strong> receives several hits per hour or more then you should consider reducing the value to suit your needs.</p>
				<p align="left">&nbsp;</p>
				<hr width="100%" color="#808080" align="center">
				<p><strong><font color="#FF8000"><a name="debug"></a>DEBUG - 
		for testing</font></strong> </p>
				<p align="left">When you are happy all is running without error set DEBUG to false, edit the file:<strong> 
			<br>/phpjobscheduler/pjsfiles/config.inc.php 
			</strong> </li>
				</p>
				<p align="left">This will then prevent any output - so when you call firejps.php it will run silently.</p>
				<p align="left">
					<br> </p>
				<hr width="100%" color="#808080" align="center"> </div>
			<div class="tab-page">
				<h2 class="tab"><i class="fa fa-info-circle" aria-hidden="true"></i> About</h2>
				<div>
					<table cellSpacing="3" cellPadding="0" border="0" width="1058">
						<tr bgColor="#334873">
							<td width="200" align="middle" bgcolor="#FFFFFF">
								<p align="center">
									<a href="http://www.phpjobscheduler.co.uk/"><img src="../assets/modules/jobscheduler/pjslogo.gif" alt="phpJobScheduler" border="0" width="165" height="75"> </a><strong><br>
    </strong> </td>
							<td align="middle" bgcolor="#FFFFFF" width="849">
								<p align="left"><strong>phpJobScheduler - README</strong>
									<br> Author: <a href="http://www.DWalker.co.uk">DWalker.co.uk</a>&nbsp; For help and support please try the <a href="http://members.dwalker.co.uk/forum/">forum</a>
									<br> </td>
						</tr>
					</table>
					<br> </div>
				<p align="left"><strong>HISTORY</strong>
					<a name="history"></a>
				</p>
				<p><strong>Launch Date: 14th Oct 2003 <br></strong>
					<br><strong>Version and 
description of changes</strong> </p>
				<ul>
					<li>1.0 14th Oct 2003 Original release </li>
					<li>3.0 Nov 2005 Released under GPL/GNU </li>
					<li>3.1 June 2006 Fixed modify issues, and other minor issues </li>
					<li>3.3 Dec 2006 removed bugs/improved code </li>
					<li>3.4 Nov 2007 AJAX, and improved script including using CURL and fsockopen </li>
					<li>3.5 Dec 2008 Improvements, including single fire, silent db connect, fire time in minutes </li>
					<li>3.6 Oct 2009 Version check added </li>
					<li>3.7 Feb 2011 - DEBUG improved to aid install, and new method added to ensure only one instance of the same script runs at any one time</li>
					<li>3.8 April 2012 - Corrected issue stopping the database updating and logs being saved when a schedule was fired. Also, amended the db structure to ensure logs are saved when two or more schedules run at the same time. </li>
					<li>3.9 April 2014 - Improved database connectivity now using PDO, the old PHP MySQL functions (eg. mysql_connect) have gone.&nbsp; Also the ability to Pause scripts has been added. </li>
				</ul>
				<hr width="100%" color="#808080" align="center">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">Like it? Please consider to
					<br>
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="2148409">
					<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt=""> <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
					<br /> Every penny or cent helps :-) </form>
				<hr width="100%" color="#808080" align="center">
				<p align="left"><strong>DISCLAIMER</strong>
					<a name="disclaimer"></a>
				</p> phpJobScheduler IS PROVIDED &quot;AS IS&quot; WITHOUT REPRESENTATION OR WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING WITHOUT LIMITATION, ANY REPRESENTATIONS OR ENDORSEMENTS REGARDING THE USE OF, THE RESULTS OF, OR PERFORMANCE OF THE INFORMATION, ITS APPROPRIATENESS, ACCURACY, RELIABILITY, OR CORRECTNESS.
				<br> THE ENTIRE RISK AS TO THE USE OF phpJobScheduler IS ASSUMED BY THE USER.&nbsp; IN NO EVENT I BE LIABLE FOR ANY DAMAGES, DIRECT, INDIRECT, INCIDENTAL OR CONSEQUENTIAL, RESULTING FROM ANY DEFECT IN phpJobScheduler, EVEN IF THE POSSIBILITY OF SUCH DAMAGES HAS BEEN ADVISED. &nbsp; THIS DISCLAIMER SHALL SUPERSEDE ANY VERBAL OR WRITTEN STATEMENT TO THE CONTRARY. IF YOU DO NOT ACCEPT THESE TERMS YOU MUST CEASE AND DESIST USING phpJobScheduler IMMEDIATELY.
				<p align="left">&nbsp;</p>
				<div align="center">
					<div style="background-color:#CCCCCC;"> <strong>My applications:</strong>
						<br />
						<br />
						<table border="0">
							<tr>
								<th scope="col" style="width: 296px">
									<div id="logo-bk">
										<div align="center">
											<a href="http://www.dwalker.co.uk/phpautomembersarea/"><img src="http://www.dwalker.co.uk/phpautomembersarea/pamalogo.gif" alt="phpAMA - create a members area using PHP MySQL, protect your members only or adult content" border="0"> </a>
										</div>
									</div> <a href="http://www.dwalker.co.uk/phpautomembersarea/">phpAutoMembersArea</a> </th>
								<th scope="col" style="width: 315px">
									<div id="logo-bk0">
										<div align="center">
											<a href="http://www.dwalker.co.uk/phpmysqlautobackup/"><img src="http://www.dwalker.co.uk/phpmysqlautobackup/logo.gif" alt="phpMySQLAutoBackup - automate the backup of your MySQL databases and email a copy to yourself" width="165" height="75" border="0"> </a>
										</div>
									</div> <a href="http://www.dwalker.co.uk/phpmysqlautobackup/">phpMySQLAutoBackup</a> </th>
								<th scope="col" style="width: 342px">
									<div align="center">
										<div style="background-color:white;width:165px;">
											<a href="http://www.phpjobscheduler.co.uk/"><img src="http://www.phpjobscheduler.co.uk/pjslogo.gif" alt="phpJobScheduler - scheduling PHP scripts to run at set intervals your replacement for cron jobs.&nbsp; " border="0" height="75" width="165"> </a>
										</div>
									</div> <a href="http://www.phpjobscheduler.co.uk">phpJobScheduler</a> </th>
							</tr>
						</table>
						<br>
						<br> </div>
				</div>
			</div>
		</div>
	</div>
	<!----close tabpane ---->
	</div>
</body>

</html>'; echo $out; ?>