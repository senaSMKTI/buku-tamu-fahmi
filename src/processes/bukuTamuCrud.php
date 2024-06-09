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
    global $conn, $nama, $email, $asal, $pekerjaan, $keperluan;

    $query = "INSERT INTO tamu(nama, email, asal, pekerjaan, keperluan) VALUES ('$nama', '$email', '$asal', '$pekerjaan', '$keperluan')";
    $result = mysqli_query($conn, $query);

    $_SESSION['add_buku_tamu_status'] = $result ? true : false;

    $redirectUrl = isset($_SESSION['id_admin']) ? '../views/admin.php?url=buku-tamu' : '../../';
    header("Location: $redirectUrl");
    exit;
}

function edit()
{
    global $conn, $id_tamu, $nama, $email, $asal, $pekerjaan, $keperluan;

    $query = "UPDATE tamu SET nama='$nama', email='$email', asal='$asal', pekerjaan='$pekerjaan', keperluan='$keperluan' WHERE id_tamu='$id_tamu'";
    $result = mysqli_query($conn, $query);

    $_SESSION['edit_buku_tamu_status'] = $result ? true : false;

    $redirectUrl = $result ? '../views/admin.php?url=buku-tamu' : "../views/admin.php?url=edit-buku-tamu&id_tamu=$id_tamu";
    header("Location: $redirectUrl");
    exit;
}

function delete()
{
    global $conn, $id_tamu;

    $query = "DELETE FROM tamu WHERE id_tamu='$id_tamu'";
    $result = mysqli_query($conn, $query);

    $_SESSION['delete_buku_tamu_status'] = $result ? true : false;
    header('Location: ../views/admin.php?url=buku-tamu');
    exit;
}
