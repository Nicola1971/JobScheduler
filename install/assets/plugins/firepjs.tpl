//<?php
/**
 * firepjs
 *
 * fire jobscheduler image
 *
 * @author    Nicola Lambathakis
 * @category    plugin
 * @version    1.0  RC3
 * @internal    @events OnWebPagePrerender
 * @internal    @installset base
 * @internal    @disabled 0
 * @internal    @modx_category Cookies
 * @internal    @properties  
 */


$firepjs = '<img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/>';
$find = array('<body>');
$replace = array('<body><img src="assets/modules/jobscheduler/firepjs.php?return_image=1" border="0"/>');
$modx->documentOutput = str_replace($find,$replace,$modx->documentOutput);