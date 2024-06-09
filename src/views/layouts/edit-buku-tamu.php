<?php
include '../../inc/conn.php';

$id_tamu = $_GET['id_tamu'];

$query = "SELECT * FROM tamu WHERE id_tamu='$id_tamu'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
?>
<br />
<br />
<a class="inline-flex items-center gap-1 py-1.5 px-2 rounded-md shadow hover:shadow-md border duration-300" href="?url=buku-tamu">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
        <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
    </svg>
    Kembali
</a>
<div class="flex items-center flex-col">

    <h3 class="font-bold text-2xl mb-4">Edit Buku Tamu Sekolah</h3>
    <form class="text-center" action="../processes/bukuTamuCrud.php?action=edit&id_tamu=<?= $id_tamu ?>" method="post">
        <table class="flex justify-center text-start">
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input value="<?= $data['nama'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input value="<?= $data['email'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="asal">Asal:</label></td>
                <td><input value="<?= $data['asal'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="asal" id="asal" required></td>
            </tr>
            <tr>
                <td><label for="pekerjaan">Pekerjaan:</label></td>
                <td><input value="<?= $data['pekerjaan'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="pekerjaan" id="pekerjaan" required></td>
            </tr>
            <tr>
                <td><label for="keperluan">Keperluan:</label></td>
                <td><input value="<?= $data['keperluan'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="keperluan" id="keperluan" required></td>
            </tr>
        </table>
        <button type="submit" class="mt-6 py-1.5 px-3 rounded-md shadow-md hover:shadow-lg text-white bg-sky-500 hover:bg-sky-600 duration-300">Simpan</button>
    </form>
</div>