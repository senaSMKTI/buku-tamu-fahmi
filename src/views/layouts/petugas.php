<?php
include '../../inc/conn.php';



if ($_SESSION['level'] != 'admin') {
    echo "<script>
    alert('Anda bukan sesi Admin');
    window.location.assign('./admin.php');
    </script>";
}
?>
<h2 class="font-bold text-xl my-2">Halaman Petugas</h2>
<a class="inline-block bg-green-400 hover:bg-green-500 duration-300 rounded-md py-1.5 px-2" href="?url=tambah-petugas">Tambah +</a>
<br />
<br />
<div class="relative overflow-x-auto">
    <table class="border rounded-md w-full" border="1">
        <thead>
            <tr class="font-bold uppercase text-xs bg-gray-200">
                <td class="p-3">No</td>
                <td class="p-3">Username</td>
                <td class="p-3">Password</td>
                <td class="p-3">Level</td>
                <td class="p-3">Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM admin";
            $result = mysqli_query($conn, $query);
            foreach ($result as $data) :
            ?>
                <tr>
                    <td class="p-2 font-bold text-sm"><?= $no++ ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['username']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['password']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['level']) ?></td>
                    <td class="p-2">
                        <a class="text-sm inline-block my-0.5 bg-yellow-400 hover:bg-yellow-500 hover:text-white duration-300 rounded-md py-1.5 px-2" href="?url=edit-petugas&id_admin=<?= $data['id_admin'] ?>">Edit</a>
                        <a class="text-sm inline-block my-0.5 bg-red-400 hover:bg-red-500 hover:text-white duration-300 rounded-md py-1.5 px-2" href="../processes/petugasCrud.php?action=delete&id_admin=<?= $data['id_admin'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>