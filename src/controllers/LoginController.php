<?php
include '../../inc/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

    $_SESSION['id_admin'] = $data['id_admin'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    header('Location: ../views/admin.php');
    exit;
} else {
    echo "<script>alert('Username atau password Anda salah!'); history.back();</script>";
    exit;
}
