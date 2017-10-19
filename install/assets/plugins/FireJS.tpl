//<?php
/**
 * FireJS
 *
 * Fire JobScheduler image (render jobschedule image before the closing Body tag)
 *
 * @author    Nicola Lambathakis
 * @category    admin
 * @version    1.2  RC3
 * @internal    @events OnWebPagePrerender
 * @internal    @installset base
 * @internal    @disabled 0
 * @internal    @modx_category Admin
 * @internal    @properties  
 */


$firepjs = '<img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/>';
$find = array('</body>');
$replace = array('<img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/></body>');
$modx->documentOutput = str_replace($find,$replace,$modx->documentOutput);