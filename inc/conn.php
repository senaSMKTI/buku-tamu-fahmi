<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bukutamu';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "<script>alert('Gagal koneksi database')</script>";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
