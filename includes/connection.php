<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="product_delivery";
    $mysqli='';
    

// Create connection
$mysqli =mysqli_connect($servername, $username, $password, $dbname) or die ("could not connect to mysql");

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}