<?php

// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'donasi';

$hostname = 'localhost';
$username = 'ribg3268_admin';
$password = 'li][JNcTMbf*';
$database = 'ribg3268_donasi';

try {
   $conn = mysqli_connect($hostname, $username, $password, $database);
} catch (Exception $e) {
    echo "<b>koneksi gagal : <b/>" . $e;
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
  }
  return $rows;
}


?>

