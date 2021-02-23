<?php
echo 'coucouo';
global $wpdb;

$table_name = $wpdb->prefix . 'store_events';

$wpdb->insert(
    $table_name,
    array(
        'date_depart' => $_GET['date_depart'],
        'date_retour' => $_GET['date_retour'],
        'message' => $_GET['message'],
    )
);
echo 'get' . $_GET['date_depart'];
echo 'post' . $_POST['date_depart'];
