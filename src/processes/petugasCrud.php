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
    global $conn;

    global $username;
    global $password;
    global $level;


    $query = "INSERT INTO admin(username, password, level) VALUES ('$username', '$password', '$level')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../views/admin.php?url=petugas');
        exit;
    } else {
        header('Location: ../views/admin.php?url=tambah-petugas');
        exit;
    }
}

function edit()
{
    global $conn;

    global $id_admin;
    global $username;
    global $password;
    global $level;

    $query = "UPDATE admin SET username='$username', password='$password', level='$level' WHERE id_admin='$id_admin'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../views/admin.php?url=petugas');
        exit;
    } else {
        header("Location: ../views/admin.php?url=edit-petugas&id_admin=$id_admin");
        exit;
    }
}

function delete()
{
    global $conn;

    global $id_admin;

    $query = "DELETE FROM admin WHERE id_admin='$id_admin'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../views/admin.php?url=petugas');
        exit;
    } else {
        header('Location: ../views/admin.php?url=petugas');
        exit;
    }
}
