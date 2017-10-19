<?php global $_lang, $manager_language, $manager_theme,$theme_refresher,$modx_manager_charset, $syncid, $syncsite,$messagesallowed; $modx_root_dir=$modx->config['base_path']; $mods_path = $modx->config['base_path'] . "assets/modules/"; $site_name = preg_replace('/[^a-zA-Z0-9]+/', '_', $modx->config['site_name']); $module_id = (!empty($_REQUEST["id"])) ? (int)$_REQUEST["id"] : $yourModuleId; $out = '
<html>

<head>
    <title>EvoJobScheduler</title>
    <link rel="stylesheet" type="text/css" href="media/style/'.$manager_theme.'/style.css" />
    <link rel="stylesheet" href="media/style/common/font-awesome/css/font-awesome.min.css" />
    <script src="../assets/modules/jobscheduler/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/modules/jobscheduler/js/tabpane.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/modules/jobscheduler/css/style.css" />
</head>

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
            <li id="Button5">
                <a href="index.php?a=2">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> '.$_lang['close'].'
                </a>
            </li>
        </ul>
    </div>
    <div class="sectionBody">
        <div class="tab-pane" id="tab-pane-1">

            <div class="tab-page">
                <h2 class="tab"><span><i class="fa fa-clock-o" aria-hidden="true"></i> Tasks</span></h2>

                <h3> Manage Tasks</h3>
                <p><a href="../assets/modules/jobscheduler/pjsfiles/"><i class="fa fa-clock-o fa-lg"></i><strong> Scheduled tasks</strong></a>
                </p>

                <p><a href="../assets/modules/jobscheduler/pjsfiles?add=1"><i class="fa fa-plus-circle fa-lg"></i><strong> Add a NEW schedule</strong></a>
                </p>

                <p><a href="../assets/modules/jobscheduler/pjsfiles/error-logs.php"><i class="fa fa-exclamation-circle fa-lg"></i><strong> View error-logs</strong></a>
                </p>
                <!---
  <p><a href="../assets/modules/jobscheduler/firepjs.php"><i class="fa fa-play-circle fa-lg"></i> <strong> Run the scheduled tasks already 
  added above.</strong></a></p>
--!>

   </div>

   <div class="tab-page">
      <h2 class="tab"><span><i class="fa fa-book" aria-hidden="true"></i> Readme</span></h2>
<!--first section-->
                <div class="tab-section">
                    <div class="tab-header">
                        PhpJobScheduler Module for Evolution CMS
                    </div>
                    <div class="tab-body">
                        <strong><em>php</em>JobScheduler is designed to automate tasks by
scheduling PHP scripts to run at set intervals.</strong>
                        <br> This version runs silently (no screen output) but saves the output, including any errors, to the database.
                        <br> Full details can be found at: <a href="http://www.phpjobscheduler.co.uk/">www.phpjobscheduler.co.uk</a>

                    </div>
                </div>
                <!--end first section-->

                <!--second section-->
                <div class="tab-section">
                    <div class="tab-header">
                        Requirements for Evolution CMS
                    </div>
                    <div class="tab-body">
                        <ul>
                            <li>Evolution CMS 1.3.6 or later</li>
                            <li>MySQL (should now work with many other databases, just change the settings in&nbsp; /phpjobscheduler/pjsfiles/constants.inc.php)</li>
                            <li>PHP 5.x</li>
                        </ul>
                    </div>
                </div>
                <!--end second section-->
                <!--third section-->
                <div class="tab-section">
                    <div class="tab-header">
                        New installation on Evolution:
                    </div>
                    <div class="tab-body">
                        <p>Install with Package Manager or Extras Module </p>
                        <p>1) Add to your Home page template the <strong> {{FireJS}} Chunk</strong> or Enable <strong> FireJS</strong> plugin (both included in this package), that will automatically add the required code.
                            <p>or simply add to your <strong>existing<font color="#0080FF"> Template</font> or inside the content of a page</strong>, like your index.html home page and/or any other well visited page on any website:
                            </p>
                            <blockquote>
                                <code>
     &lt;img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/&gt</code>
                            </blockquote>
                            <p>The above <strong><font color="#0080FF">HTML</font></strong> can be added to any web page on any website (not just to the site where phpJobScheduler is installed). Adding this code will add a very small clear image to your page - invisible (unless you know its there). Execution is very quick so will not slow the loading of any pages. </p>

                            <p>click on <strong><i class="fa fa-plus-circle fa-lg"></i> Add a NEW schedule</strong>, in the Tasks tab, to add your scheduled tasks</strong>
                            </p>
                            <blockquote>
                                <p>If you have correctly completed the above the following <strong><font color="#FF8000">tables</font></strong> will be created in your database: </p>
                            </blockquote>
                            <p>When you are happy all is running without error set DEBUG to false, edit the file:<strong> /phpjobscheduler/pjsfiles/config.inc.php </strong>
                            </p>
                    </div>
                </div>
                <!--end third section-->

                <!-- section-->
                <div class="tab-section">
                    <div class="tab-header">
                        Error log - recording of runs and errors of each fired task.
                    </div>
                    <div class="tab-body">
                        <p>Recorded data: date of last run, and url including errors if any occur. If "Output:" has no data then this means the script ran without errors or output. By default error logging is turned on (TRUE). To turn on/off error logs: Change the value assigned to ERROR_LOG within the /pjsfiles/constants.inc.php file. Change the value to FALSE to stop logging. It will not affect the running of fired scripts if you turn off error logging. The output is truncated to a maximum length of 1200 characters by default to ensure the logs table does not become too large. You can change this by editing the constant MAX_ERROR_LOG_LENGTH within the constants.inc.php file.</p>
                    </div>
                </div>
                <!--end  section-->

                <!-- section-->
                <div class="tab-section">
                    <div class="tab-header">
                        Altering the time frame window
                    </div>
                    <div class="tab-body">
                        <p>
                            This can be changed by altering the value assigned to TIME_WINDOW within the /pjsfiles/constants.inc.php file. The default value is 3600 seconds (60 minutes which should suffice for most sites). This means that when the firing engine (phpjobscheduler/firepjs.php) is called any scheduled job having a fire time within 60 minutes will be executed. You can increase or decrease the default value of the time frame window. If your site receives just a few hits per day you should consider increasing the value to 43200 (12 hours). If your site <b>ALWAYS</b> receives several hits per hour or more then you should consider reducing the value to suit your needs.
                        </p>
                    </div>
                </div>
                <!--end  section-->

            </div>

            <div class="tab-page">
                <h2 class="tab"><span><i class="fa fa-database" aria-hidden="true"></i> CronEvoBackup</span></h2>

                <!--first section-->
                <div class="tab-section">
                    <div class="tab-header">
                        CronEvoBackup
                    </div>
                    <div class="tab-body">
                        This package includes <b>CronEvoBackup snippet</b> to create scheduled automatic backups of your Evolution CMS
                        <p>To create your custom backup setting, check the two files included in this package:</p>
                        <p><b>cron-backup-sqlonly.php</b>
                        </p>
                        <p><b>cron-backup-full.php</b>
                        </p>
                    </div>
                </div>
                <!--end first section-->

                <!--second section-->
                <div class="tab-section">
                    <div class="tab-header">
                        CronEvoBackup Features
                    </div>
                    <div class="tab-body">
                        <p>4 backup modes: dbonly,light,medium,full</p>
                        <p>Send email link: automatically send email with link to download the created backup</p>
                        <p>Compatible with EvoBackup</p>
                    </div>
                </div>
                <!--end second section-->
                <!--third section-->
                <div class="tab-section">
                    <div class="tab-header">
                        CronEvoBackup Documentation
                    </div>
                    <div class="tab-body">
                        coming soon
                    </div>
                </div>
                <!--end third section-->
            </div>

        </div>
        <!----close tabpane ---->
    </div>
</body>

</html>'; echo $out; ?>