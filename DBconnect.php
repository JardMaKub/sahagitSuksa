<?php

$dbname = "finaleproduct";
$server = "localhost";
$user = "root";
$pwd = "";

//  $conn= mysqli_connect($server, $user, $pwd, $dbname);
//  if (!$conn) // error
//    die("Connection Error...") . mysqli_connect_error();
// else 
//    echo "Connection Successful";

$conn = new mysqli($server,$user,$pwd,$dbname);
if ($conn->connect_errno) {
    die( "Failed to connect to MySQL : (" . $conn->connect_errno . ") " . $conn->connect_error);
}
$conn->set_charset("utf8");

?>