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

<body class="bg-gray-50 text-gray-900">
    <div class="m-10">
        <h1 class="font-bold text-2xl">Aplikasi Buku Tamu Sekolah</h1>
        <h3 class="mb-6 mt-1">Anda login sebagai <span class="font-bold"><?= ($_SESSION['level'] == 'admin') ? 'Administrator' : htmlspecialchars('Petugas ' . $_SESSION['username']) ?></span></h3>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-gray-50 px-3 py-2 rounded-md shadow-md hover:shadow-lg" href="admin.php">Home</a>
        <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-gray-50 px-3 py-2 rounded-md shadow-md hover:shadow-lg" href="?url=buku-tamu">Buku Tamu</a>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <a class="m-[1px] bg-blue-500 hover:bg-blue-600 duration-300 text-gray-50 px-3 py-2 rounded-md shadow-md hover:shadow-lg" href="?url=petugas">Petugas</a>
        <?php endif ?>

        <a class="inline-flex items-center gap-1 max-sm:mt-3 md:absolute md:top-0 md:right-0 md:m-20 bg-red-500 hover:bg-red-600 duration-300 text-gray-50 px-3 py-2 rounded-md shadow-md hover:shadow-lg" href="../processes/logoutProcess.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M17 4.25A2.25 2.25 0 0 0 14.75 2h-5.5A2.25 2.25 0 0 0 7 4.25v2a.75.75 0 0 0 1.5 0v-2a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v11.5a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1-.75-.75v-2a.75.75 0 0 0-1.5 0v2A2.25 2.25 0 0 0 9.25 18h5.5A2.25 2.25 0 0 0 17 15.75V4.25Z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M14 10a.75.75 0 0 0-.75-.75H3.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 14 10Z" clip-rule="evenodd" />
            </svg>
            Logout</a>

        <hr class="mt-6">
        <?php if (empty($_GET['url'])) : ?>
            <h1 class="mt-4 mb-2 font-bold text-xl">Selamat Datang di Aplikasi Buku Tamu Sekolah</h1>
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
                        echo '<div id="notifSuccess" class="text-green-900 flex items-center gap-2 select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-green-200 border border-green-500 rounded-md mx-auto mt-16">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                          </svg>'
                            . $successMessage . '</div>';
                    } else {
                        echo '<div id="notifFailed" class="text-red-900 flex items-center gap-2 select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-red-200 border border-red-500 rounded-md mx-auto mt-16">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                          </svg>'
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