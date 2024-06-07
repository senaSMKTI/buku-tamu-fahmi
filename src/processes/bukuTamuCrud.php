<?php
include '../../inc/conn.php';

$action = $_GET['action'];

$id_tamu = isset($_GET['id_tamu']) ? $_GET['id_tamu'] : '';
$nama = $_POST['nama'];
$email = $_POST['email'];
$asal = $_POST['asal'];
$pekerjaan = $_POST['pekerjaan'];
$keperluan = $_POST['keperluan'];

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

    global $nama;
    global $email;
    global $asal;
    global $pekerjaan;
    global $keperluan;

    $query = "INSERT INTO tamu(nama, email, asal, pekerjaan, keperluan) VALUES ('$nama', '$email', '$asal', '$pekerjaan', '$keperluan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (isset($_SESSION['id_admin'])) {
            header('Location: ../views/admin.php?url=buku-tamu');
            exit;
        } else {
            header('Location: ../../');
            exit;
        }
    } else {
        if (isset($_SESSION['id_admin'])) {
            header('Location: ../views/admin.php?url=buku-tamu');
            exit;
        } else {
            header('Location: ../../');
            exit;
        }
    }
}

function edit()
{
    global $conn;

    global $id_tamu;
    global $nama;
    global $email;
    global $asal;
    global $pekerjaan;
    global $keperluan;

    $query = "UPDATE tamu SET nama='$nama', email='$email', asal='$asal', pekerjaan='$pekerjaan', keperluan='$keperluan' WHERE id_tamu='$id_tamu'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../views/admin.php?url=buku-tamu');
        exit;
    } else {
        header("Location: ../views/admin.php?url=edit-buku-tamu&id_tamu=$id_tamu");
        exit;
    }
}

function delete()
{
    global $conn;

    global $id_tamu;

    $query = "DELETE FROM tamu WHERE id_tamu='$id_tamu'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../views/admin.php?url=buku-tamu');
        exit;
    } else {
        header('Location: ../views/admin.php?url=buku-tamu');
        exit;
    }
}
