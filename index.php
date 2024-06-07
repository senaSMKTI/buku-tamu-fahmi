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
    <title>Aplikasi Buku Tamu Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex justify-center items-center h-[100vh]">
        <?php if (isset($_GET['url']) && $_GET['url'] == 'tambah-buku-tamu') : ?>
            <div class="block">
                <a href="./index.php" class="py-2 px-3 rounded-md bg-white">
                    < Kembali</a>
                        <h3 class="font-bold text-2xl mb-4 mt-6">Tambah Buku Tamu Sekolah</h3>
                        <form class="text-center" action="./src/processes/bukuTamuCrud.php?action=add" method="post">
                            <table class="flex justify-center text-start">
                                <tr>
                                    <td><label for="nama">Nama:</label></td>
                                    <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="text" name="nama" id="nama" required></td>
                                </tr>
                                <tr>
                                    <td><label for="email">Email:</label></td>
                                    <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="text" name="email" id="email" required></td>
                                </tr>
                                <tr>
                                    <td><label for="asal">Asal:</label></td>
                                    <td><input class="m-1 ml-3 p-1 px-2" type="text" name="asal" id="asal" required></td>
                                </tr>
                                <tr>
                                    <td><label for="pekerjaan">Pekerjaan:</label></td>
                                    <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="text" name="pekerjaan" id="pekerjaan" required></td>
                                </tr>
                                <tr>
                                    <td><label for="keperluan">Keperluan:</label></td>
                                    <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="text" name="keperluan" id="keperluan" required></td>
                                </tr>
                            </table>
                            <button type="submit" class="mt-6 py-1.5 px-3 rounded-md text-white bg-sky-500 hover:bg-sky-600" onclick="
                            return confirm('Apakah Anda yakin ingin menambahkan data ini?');
                            ">Tambah</button>
                        </form>
            </div>
        <?php else : ?>
            <form class="bg-white p-12 border border-gray-200 rounded-lg w-min text-center" action="./src/processes/loginProcess.php" method="post">
                <h1 class="font-bold text-3xl mb-6 sm:mb-8 sm:whitespace-nowrap">Aplikasi Buku Tamu Sekolah</h1>
                <label class="text-lg" for="username">Username: </label>
                <input class="border px-2 py-1 rounded-md mb-4" type="text" name="username" id="username" required> <br />
                <label class="text-lg" for="password">Password: </label>
                <input class="border px-2 py-1 rounded-md mb-4" type="password" name="password" id="password" required> <br />
                <button class="bg-sky-500 hover:bg-sky-600 px-4 py-1 mb-4 rounded-md duration-300 text-white" type="submit">Login</button> <br />
                <a href="index.php?url=tambah-buku-tamu" class="text-sm text-blue-600 hover:text-blue-800 duration-300">Masuk sebagai tamu</a>
            </form>
        <?php endif ?>
    </div>
</body>

</html>