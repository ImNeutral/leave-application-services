<?php

require_once ("config.php");

function run() {
    $conn   = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    if( $conn->connect_error ) {
        die("Connection Failed.");
    }

    return $conn;
}

