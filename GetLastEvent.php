<?php

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';

$result = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC LIMIT 1');

// $last = $result[0];
// var_dump(strtotime($last->date_retour), strtotime(date("Y-m-d")));
// if (
//     strtotime($last->date_depart) <= strtotime(date("Y-m-d"))
//     && ( strtotime($last->date_retour) > strtotime(date("Y-m-d")) && strtotime($last->date_retour) > 0)
//     )
//     {
//         echo $last->date_depart;
//         echo $last->date_retour;
//         echo $last->message;
//     }
