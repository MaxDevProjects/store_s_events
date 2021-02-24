<?php

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';
echo $_GET['id'];
$result = $wpdb->delete($table_name, array('id' => $_GET['id']));