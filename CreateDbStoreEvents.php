<?php
global $version_db;
$version_db = '1.0';
/**
 * Method store_events_install
 *
 * @return void
 */
function store_events_install()
{
    global $wpdb;
    global $version_db;
    $installed_ver = get_option('version_db');
    if ($installed_ver != $version_db) {
        $table_name = $wpdb->prefix . 'store_events';

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
            date_depart DATE NOT NULL,
            date_retour DATE,
            message TEXT(255) DEFAULT '',
            PRIMARY KEY (id)
        )";

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('version_db', $version_db);
    }
}

/**
 * Method store_events_install_data
 *
 * @return void
 */
function store_events_install_data()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'store_events';

    $wpdb->insert(
        $table_name,
        array(
            'date_depart' => date("Y.m.d"),
            'date_retour' => '',
            'message' => date("h:i:sa") . ': Congratulations, you just completed the installation!',
        )
    );
}
/**
 * Method myplugin_update_db_check
 *
 * @return void
 */
function myplugin_update_db_check()
{
    global $version_db;
    if (get_site_option('version_db') != $version_db) {
        store_events_install();
    }
}
