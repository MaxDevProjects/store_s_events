<?php
/**
* insertion des données par method post puis get
* import du wp-config pour avoir accés à $wpdb
*/
require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
function insertDataFromVue() {
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
}

echo 'get' . $_GET['date_depart'];
echo 'get' . $_GET['date_retour'];
echo 'get' . $_GET['message'];
insertDataFromVue();