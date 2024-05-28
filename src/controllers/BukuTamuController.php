<?php
include '../../inc/conn.php';

session_start();

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
        echo "<script>alert('Data berhasil ditambahkan!');";
        if (isset($_SESSION['id_admin'])) {
            echo "window.location.assign('../views/admin.php?url=buku-tamu');</script>";
            exit;
        } else {
            echo "window.location.assign('../../');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Data gagal ditambahkan!');";
        if (isset($_SESSION['id_admin'])) {
            echo "window.location.assign('../views/admin.php?url=buku-tamu');</script>";
            exit;
        } else {
            echo "window.location.assign('../../');</script>";
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
        echo "<script>alert('Data berhasil diubah!'); 
        window.location.assign('../views/admin.php?url=buku-tamu');</script>";
        exit;
    } else {
        echo "<script>alert('Data gagal diubah!'); 
        window.location.assign('../views/admin.php?url=edit-buku-tamu&id_tamu=$id_tamu');</script>";
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
        echo "<script>alert('Data berhasil dihapus!'); 
        window.location.assign('../views/admin.php?url=buku-tamu');</script>";
        exit;
    } else {
        echo "<script>alert('Data gagal dihapus!'); 
        window.location.assign('../views/admin.php?url=buku-tamu');</script>";
        exit;
    }
}
