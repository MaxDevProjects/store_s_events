<?php

echo 'ecris juste un truc';
var_dump($_POST);

if (isset($_POST["depart"]) && isset($_POST["message"])) {
    echo $_GET["depart"];
    echo $_GET["retour"];
    echo $_GET["message"];

    global $wpdb;

    $table_name = $wpdb->prefix . 'store_events';

    $wpdb->insert(
        $table_name,
        array(
            'date_depart' => $_GET["depart"],
            'date_retour' => $_GET["retour"],
            'message' => $_GET["message"],
        )
    );

} else {
    echo "something wrong";
}
