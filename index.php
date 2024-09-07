<?php
session_start();
if (isset($_SESSION['id_admin'])) {
    header('Location: ./src/views/admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo MTQ</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script> <!-- Jaga-jaga jika tailwind tidak ter-update -->
</head>

<body class="bg-[url('./public/img/bg.jpg')] bg-no-repeat bg-cover text-gray-900">
    <div class="flex justify-center items-center h-[100vh]">
        <?php if (isset($_GET['url']) && $_GET['url'] == 'tambah-buku-tamu') : ?>
            <div class="block bg-gray-100 p-10 max-md:p-8 rounded-md max-md:w-min">
                <a href="./index.php" class="inline-flex items-center gap-1 py-1.5 px-2 rounded-md shadow hover:shadow-md border duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
                    </svg>
                    Kembali</a>
                <h3 class="font-bold text-2xl mb-4 mt-6">Buku Tamu Digital</h3>
                <form class="text-center" action="./src/processes/bukuTamuCrud.php?action=add" method="post">
                    <table class="flex justify-center text-start">
                        <tr>
                            <td><label for="nama">Nama:</label></td>
                            <td><input class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="nama" id="nama" required></td>
                        </tr>
                        <tr>
                            <td><label for="instansi">Instansi:</label></td>
                            <td><input class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="instansi" id="instansi" required></td>
                        </tr>
                        <tr>
                            <td><label for="asal">Asal:</label></td>
                            <td><input class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="asal" id="asal" required></td>
                        </tr>
                    </table>
                    <button type="submit" class="mt-6 py-1.5 px-3 rounded-md text-white bg-sky-500 shadow-md hover:bg-sky-600 hover:shadow-lg duration-300">Tambah</button>
                </form>
            </div>
        <?php else : ?>
            <form class="bg-gray-100 p-12 border border-gray-200 rounded-lg w-min text-center" action="./src/processes/loginProcess.php" method="post">
                <h1 class="font-bold text-3xl mb-6 sm:mb-8 sm:whitespace-nowrap">Buku Tamu Digital</h1>
                <!-- <label class="text-lg" for="username">Username: </label>
                <input class="border px-2 py-1 rounded-md mb-4 shadow-sm" type="text" name="username" id="username" required> <br />
                <label class="text-lg" for="password">Password: </label>
                <input class="border px-2 py-1 rounded-md mb-4 shadow-sm" type="password" name="password" id="password" required> <br /> -->
                <?php
                if (isset($_SESSION['login_status'])) {
                    if (!$_SESSION['login_status']) {
                        echo '<div>
                                <span class="text-xs text-red-500">Username atau Password Anda Salah!</span>
                             </div>';
                        session_unset();
                    };
                };
                ?>
                <br><br>
                <!-- <button class="bg-sky-500 shadow-md hover:shadow-lg hover:bg-sky-600 px-4 py-1 mt-2 mb-4 rounded-md duration-300 text-white" type="submit">Login</button> <br />
                <a href="index.php?url=tambah-buku-tamu" class="text-sm text-blue-600 hover:text-blue-800 duration-300">Masuk sebagai tamu</a> -->
                <a href="index.php?url=tambah-buku-tamu" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buku Tamu</a>
                <br><br>
            </form>
            <?php
            if (isset($_SESSION['add_buku_tamu_status'])) {
                if ($_SESSION['add_buku_tamu_status']) {
                    echo '<div id="notifSuccess" class="text-green-900 flex items-center gap-2 select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-green-200 border border-green-500 rounded-md mx-auto mt-16">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                        Berhasil menambah buku tamu!
                    </div>';
                } else {
                    echo '<div id="notifFailed" class="text-red-900 flex items-center gap-2 select-none cursor-pointer fixed w-min whitespace-nowrap left-0 right-0 top-0 p-4 bg-red-200 border border-red-500 rounded-md mx-auto mt-16">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                        Gagal menambah buku tamu!
                    </div>';
                }
                session_unset();
            }
            ?>
        <?php endif ?>
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