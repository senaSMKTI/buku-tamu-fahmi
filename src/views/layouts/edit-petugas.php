<?php
include '../../inc/conn.php';

$id_admin = $_GET['id_admin'];

$query = "SELECT * FROM admin WHERE id_admin='$id_admin'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
?>
<br />
<br />
<a class="inline-flex items-center gap-1 py-1.5 px-2 rounded-md shadow hover:shadow-md border duration-300" href="?url=petugas">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
        <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
    </svg>
    Kembali
</a>
<div class="flex items-center flex-col">

    <h3 class="font-bold text-2xl mb-4">Edit Petugas</h3>
    <form class="text-center" action="../processes/petugasCrud.php?action=edit&id_admin=<?= $id_admin ?>" method="post">
        <table class="flex justify-center text-start">
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input value="<?= $data['username'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input value="<?= $data['password'] ?>" class="m-1 ml-3 p-1 px-2 border rounded-md shadow" type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td><label for="level">Level:</label></td>
                <td>
                    <select class="m-1 ml-3 p-1 px-2 border rounded-md shadow" name="level" id="level" required>
                        <option value="<?= $data['level'] ?>"><?= $data['level'] ?></option>
                        <option value="admin">admin</option>
                        <option value="petugas">petugas</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="mt-6 py-1.5 px-3 rounded-md text-white shadow-md hover:shadow-lg bg-sky-500 hover:bg-sky-600 duration-300">Simpan</button>
    </form>
</div>