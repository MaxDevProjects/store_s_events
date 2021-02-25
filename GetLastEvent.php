<?php

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';

$result = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1');

$json = json_encode($result);
$result_parsed = json_decode($json)[0];
echo $json[0]->date_retour;
wp_enqueue_script('close_notif',
            plugins_url('closeNotif.js', __FILE__)
        );
$html = '<div id="event"><ul>
                         <span>🌴</span>
                         <div id="eventData">
                             <div class="dates">
                                <li>Fermeture le' . date('d/m/Y',strtotime($result_parsed->date_depart)) . '</li>
                                <li>retour le '. date('d/m/Y',strtotime($result_parsed->date_retour)) . '</li>
                                </div>
                             <li id="eventMessage">' . $result_parsed->message . '</li>
                         </div>
                         <span id="closeEventNotif"><small>❌(close)</small></span>
         </ul></div>';

echo $html;