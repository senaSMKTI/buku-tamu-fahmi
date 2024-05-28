<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_fahmi';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "<script>alert('Gagal koneksi database')</script>";
}