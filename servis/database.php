<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "buku_tamu";
$port ="3308";

$db = mysqli_connect($hostname, $username, $password, $database_name, $port);


  if($db->connect_error) {
    echo "koneksi database rusak";
    echo ("erorr!");
 }

?>