<?php
include '../../inc/conn.php';

$queryBukuTamu = "SELECT * FROM tamu";
$resultBukuTamu = mysqli_query($conn, $queryBukuTamu);

$queryAdmin = "SELECT * FROM admin";
$resultAdmin = mysqli_query($conn, $queryAdmin);

if (empty($_SESSION['id_admin'])) {
    echo "<script>
    alert('Sesi Anda telah habis!');
    window.location.assign('../../');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Buku Tamu Sekolah</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script> <!-- Jaga-jaga jika tailwind tidak ter-update -->
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="m-10">
        <h1 class="font-bold text-2xl">Aplikasi Buku Tamu Sekolah</h1>
        <h3 class="mb-6 mt-1">Anda login sebagai <span class="font-bold"><?= ($_SESSION['level'] == 'admin') ? 'Administrator' : htmlspecialchars('Petugas ' . $_SESSION['username']) ?></span></h3>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="admin.php">Home</a>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="?url=buku-tamu">Buku Tamu</a>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-white px-3 py-2 rounded-md" href="?url=petugas">Petugas</a>
        <?php endif ?>

        <a class="max-sm:inline-block max-sm:mt-3 md:absolute md:top-0 md:right-0 md:m-20 bg-red-500 hover:bg-red-600 duration-300 text-white px-3 py-2 rounded-md" href="../processes/logoutProcess.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>

        <hr class="mt-6">
        <?php if (empty($_GET['url'])) : ?>
            <h1 class="mt-4 font-bold text-xl">Selamat Datang di Aplikasi Buku Tamu Sekolah</h1>
            <p>Aplikasi ini berguna untuk mencatat tamu yang datang beserta keperluannya.</p>
            <br />
            <p>Jumlah petugas saat ini: <?= mysqli_num_rows($resultAdmin) ?> </p>
            <p>Jumlah buku tamu saat ini: <?= mysqli_num_rows($resultBukuTamu) ?> </p>
        <?php else :
            $url = $_GET['url'];
            include "./layouts/$url.php";

            function displayNotification($sessionKey, $successMessage, $errorMessage)
            {
                if (isset($_SESSION[$sessionKey])) {
                    if ($_SESSION[$sessionKey]) {
                        echo '<div id="notifSuccess" class="select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-green-200 border border-green-500 rounded-md mx-auto mt-16">'
                            . $successMessage . '</div>';
                    } else {
                        echo '<div id="notifFailed" class="select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-red-200 border border-red-500 rounded-md mx-auto mt-16">'
                            . $errorMessage . '</div>';
                    }
                    unset($_SESSION[$sessionKey]);
                }
            }

            // Status Buku Tamu
            displayNotification('add_buku_tamu_status', 'Berhasil menambah buku tamu!', 'Gagal menambah buku tamu!');
            displayNotification('edit_buku_tamu_status', 'Berhasil mengubah buku tamu!', 'Gagal mengubah buku tamu!');
            displayNotification('delete_buku_tamu_status', 'Berhasil menghapus buku tamu!', 'Gagal menghapus buku tamu!');

            // Status Petugas
            displayNotification('add_petugas_status', 'Berhasil menambah petugas!', 'Gagal menambah petugas!');
            displayNotification('edit_petugas_status', 'Berhasil mengubah petugas!', 'Gagal mengubah petugas!');
            displayNotification('delete_petugas_status', 'Berhasil menghapus petugas!', 'Gagal menghapus petugas!');
        endif
        ?>
    </div>
    <script>
        document.addEventListener('click', function(event) {
            if (event.target.id === 'notifSuccess' || event.target.id === 'notifFailed') {
                event.target.classList.add('hidden');
            }
        });
    </script>
</body>

</html>