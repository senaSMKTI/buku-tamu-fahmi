<?php
include '../../inc/conn.php';

$action = $_GET['action'];

$id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : '';
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

switch ($action) {
    case 'add':
        add();
        break;

    case 'edit':
        edit();
        break;

    case 'delete':
        delete();
        break;

    default:
        echo "<script>alert('Aksi tidak dikenal'); history.back();</script>";
        break;
}

function add()
{
    global $conn, $username, $password, $level;

    $query = "INSERT INTO admin(username, password, level) VALUES ('$username', '$password', '$level')";
    $result = mysqli_query($conn, $query);

    $_SESSION['add_petugas_status'] = $result ? true : false;

    $redirectUrl = $result ? '../views/admin.php?url=petugas' : '../views/admin.php?url=tambah-petugas';
    header("Location: $redirectUrl");
    exit;
}

function edit()
{
    global $conn, $id_admin, $username, $password, $level;

    $query = "UPDATE admin SET username='$username', password='$password', level='$level' WHERE id_admin='$id_admin'";
    $result = mysqli_query($conn, $query);

    $_SESSION['edit_petugas_status'] = $result ? true : false;

    $redirectUrl = $result ? '../views/admin.php?url=petugas' : "../views/admin.php?url=edit-petugas&id_admin=$id_admin";
    header("Location: $redirectUrl");
    exit;
}

function delete()
{
    global $conn, $id_admin;

    $query = "DELETE FROM admin WHERE id_admin='$id_admin'";
    $result = mysqli_query($conn, $query);

    $_SESSION['delete_petugas_status'] = $result ? true : false;

    header("Location: ../views/admin.php?url=petugas");
    exit;
}
