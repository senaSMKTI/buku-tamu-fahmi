<?php
include '../../inc/conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username=? AND password=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

    $_SESSION['id_admin'] = $data['id_admin'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['login_status'] = true;

    header('Location: ../views/admin.php');
    exit;
} else {
    $_SESSION['login_status'] = false;
    echo "<script>history.back();</script>";
}
