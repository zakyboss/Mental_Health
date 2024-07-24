<?php
//connect to our database (our database credentials)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "wad";
$port = "3306";
$conn = new mysqli($host, $user, $password, $dbname, $port);

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}