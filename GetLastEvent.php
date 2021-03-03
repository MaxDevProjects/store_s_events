<?php

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';

$result = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1');

$json = json_encode($result);
$result_parsed = json_decode($json)[0];
wp_enqueue_script('close_notif',
            plugins_url('closeNotif.js', __FILE__)
        );
$html = '<div id="event"><ul>
                         <span>🌴</span>
                         <div id="eventData">
                             <div class="dates">
                                <li>Fermeture le ' . date('d/m/Y',strtotime($result_parsed->date_depart)) . '</li>';
if ((strtotime($result_parsed->date_retour) != strtotime('0000-00-00'))) {
    $html .= '<li>Retour le ' . date('d/m/Y',strtotime($result_parsed->date_depart)) . '</li>';
} else {
    $html .= '';
};
$html .= '<li id="eventMessage">' . str_replace("\'", "'", $result_parsed->message). '</li>
</div></div>
<span id="closeEventNotif"><small>❌(close)</small></span>
</ul></div>';

if (
(strtotime('now') >= strtotime($result_parsed->date_depart)
&& strtotime('now') <= strtotime($result_parsed->date_retour))
|| (strtotime('now') >= strtotime($result_parsed->date_depart)
&& strtotime($result_parsed->date_retour) === strtotime('0000-00-00'))
&& $result_parsed->message != 'Congratulations, you just completed the installation!'
)
 {
    echo $html;
}