<?php

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

require_once __DIR__ . '/../function/koneksi.php'; 
require_once __DIR__ . '/../function/f_hapus.php'; 


$id = $_GET["id"];

if(hapus($id) > 0) {
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'manage_donasi.php'; 
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
    document.location.href = 'manage_donasi.php'; 
    </script>
    ";
}


?>