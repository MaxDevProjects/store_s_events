<?php

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';

$result = $wpdb->get_results('SELECT * FROM ' . $table_name . ' ORDER BY id DESC');

echo json_encode($result);
