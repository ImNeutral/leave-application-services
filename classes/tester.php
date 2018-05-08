<?php

include ("conn.php");

$username   = "admin";
$password   = "testingPass";

$sql        = "SELECT employee_id, username, password FROM accounts ";
$sql        .= "WHERE username='" . $username . "' ";
$sql        .= "LIMIT 1";

$account    = $conn->query($sql);
if( $account->num_rows == 1) {
    $account_details    = $account->fetch_assoc();
}


