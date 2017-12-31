<?php
    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "thefacebook";

    try {
    	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    } catch(Exception $e) {
    	die($e->getMessage());
    }
?>
