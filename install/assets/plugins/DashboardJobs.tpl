/**
 * DashboardLinks 
 *
 * Dashboard Dashboard Scheduled Jobs widget
 * @author    Nicola Lambathakis
 * @category    plugin
 * @version    1.0 beta
 * @license	   http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @events OnManagerWelcomeHome,OnManagerMainFrameHeaderHTMLBlock
 * @internal    @installset base
 * @internal    @modx_category Dashboard
 * @author      Nicola Lambathakis http://www.tattoocms.it/
 * @documentation Requirements: This plugin requires Evolution 1.3.1 or later
 * @reportissues https://github.com/Nicola1971/WelcomeStats-EvoDashboard-Plugin/issues
 * @link        
 * @lastupdate  23/10/2017
 * @internal    @properties &wdgVisibility=Show widget for:;menu;All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly;All &ThisRole=Run only for this role:;string;;;(role id) &ThisUser=Run only for this user:;string;;;(username) &wdgTitle= widget Title:;string;Scheduled Jobs  &wdgicon= widget icon:;string;fa-clock-o  &wdgposition=widget position:;text;1 &wdgsizex=widget width:;list;12,6,4,3;12
*/
// get manager role
$role = $_SESSION['mgrRole'];          
if(($role!=1) AND ($wdgVisibility == 'AdminOnly')) {}
else {
// get language
global $modx,$_lang;
// get plugin id
$result = $modx->db->select('id', $this->getFullTableName("site_plugins"), "name='{$modx->event->activePlugin}' AND disabled=0");
$pluginid = $modx->db->getValue($result);
if($modx->hasPermission('edit_plugin')) {
$button_pl_config = '<a data-toggle="tooltip" href="javascript:;" title="' . $_lang["settings_config"] . '" class="text-muted pull-right" onclick="parent.modx.popup({url:\''. MODX_MANAGER_URL.'?a=102&id='.$pluginid.'&tab=1\',title1:\'' . $_lang["settings_config"] . '\',icon:\'fa-cog\',iframe:\'iframe\',selector2:\'#tabConfig\',position:\'center center\',width:\'80%\',height:\'80%\',wrap:\'evo-tab-page-home\',hide:0,hover:0,overlay:1,overlayclose:1})" ><i class="fa fa-cog"></i> </a>';
}
$modx->setPlaceholder('button_pl_config', $button_pl_config);
/*Widget Box */
if (!function_exists('time_unit')) {
function time_unit($time_interval)
{
 //global $app_name;
 $unit = array(0, 'type');
 //check if its minutes
 if ($time_interval <= (59 * 60))
 {
  $unit[0]=$time_interval/60;
  $unit[1]="<font color=\"#000000\">minute(s)</font>";
 }
 //check if its hours
 if ( ($time_interval > (59 * 60)) AND ($time_interval<= (23 * 3600)) )
 {
  $unit[0]=$time_interval/3600;
  $unit[1]="<font color=\"#ff0000\">hour(s)</font>";
 }
  // check if its days
 if ( ($time_interval > (23 * 3600)) AND ($time_interval <= (6 * 86400)) )
 {
  $unit[0]=$time_interval/86400;
  $unit[1]="<font color=\"#FF8000\">day(s)</font>";
 }
 if ($time_interval >(6 * 86400))
 {
  $unit[0]=$time_interval/604800;
  $unit[1]="<font color=\"#C00000\">week(s)</font>";
 }
 $thedomain = $_SERVER['HTTP_HOST'];
 return $unit;
}
}
//function show_jobs()

global $modx;  
$table = 'phpjobscheduler'; 
$result = $modx->db->select( '*', $table); 
while( $row = $modx->db->getRow( $result ) ) 
if(count($row))  // check has got some
  {
      foreach ($row AS $key => $value) $$key = $value;  
        if ($time_last_fired==0)
        {
         $last_fire_hours = "<font color=\"#FF8000\">NOT yet fired</font>";
         $last_fire_date = "";
        }
        else
        {
         $last_fire_hours = strftime("%H:%M:%S ",$time_last_fired);
         $last_fire_date = strftime("on<br> %b %d, %Y",$time_last_fired);
        }
        $fire_hours = strftime("%H:%M:%S ",$fire_time);
        $fire_date = strftime("%b %d, %Y",$fire_time);
        $run_only_once_txt= $run_only_once ? "<i><font color=\"#ff0000\"> Will run just once</font></i>":"";
        $time_interval = time_unit($time_interval);
        $paused_txt= $paused?'<font color="#ff0000">PAUSED</font>':'';
        $table_rows.="
           <tr align=\"center\">
           <td align=\"left\">
           <div id=\"pjs$id\">
             <font color=\"#008000\">$paused_txt &quot;$name&quot;</font> 
           </div>
           </td>
          <td align=\"center\">
           <div id=\"pjs$id\">
             $last_fire_hours $last_fire_date
           </div>
           </td>
           <td align=\"center\">
           <div id=\"pjs$id\">
             $fire_hours on<br> $fire_date
           </div>
           </td>
            <td align=\"center\">
           <div id=\"pjs$id\">
            $time_interval[0] $time_interval[1]
           </div>
           </td>
           </tr>";
		
  }
$jobstable = "<div class=\"table-responsive\">
<table class=\"table data\">
    <thead>
      <tr>
        <th>JOB NAME </th>
        <th><i class=\"fa fa-clock-o\"></i> LAST FIRED:</th>
        <th><i class=\"fa fa-clock-o\"></i> NEXT EXECUTION</th>
		<th><i class=\"fa fa-clock-o\"></i> INTERVAL:</th>
      </tr>
    </thead>
    <tbody>
$table_rows
</tbody>
  </table>
  </div>";

$e = &$modx->Event;
switch($e->name){
case 'OnManagerWelcomeHome':
			$widgets['DashboardJobs'] = array(
				'menuindex' =>''.$wdgposition.'',
				'id' => 'DashboardJobs'.$pluginid.'',
				'cols' => 'col-md-'.$wdgsizex.'',
				'icon' => ''.$wdgicon.'',
				'title' => ''.$wdgTitle.' '.$button_pl_config.'',
				'body' => '<div class="card-body">'.$jobstable.' </div>',
				'hide' => '0'
			);	
            $e->output(serialize($widgets));
    break;
}
}