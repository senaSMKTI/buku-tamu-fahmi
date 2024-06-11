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
<a class="inline-block bg-green-400 hover:bg-green-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md mb-6" href="?url=tambah-petugas">Tambah +</a>
<div class="relative overflow-x-auto">
    <table class="border border-gray-100 w-full" border="1">
        <thead>
            <tr class="font-bold uppercase text-xs bg-gray-100">
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
            if (mysqli_num_rows($result) > 0) :
                foreach ($result as $data) :
            ?>
                    <tr>
                        <td class="p-2 font-bold text-sm"><?= $no ?></td>
                        <td class="p-2"><?= htmlspecialchars($data['username']) ?></td>
                        <td id="password-<?= $no ?>" data-password="<?= htmlspecialchars($data['password']) ?>" class="p-2">**********</td>
                        <td class="p-2"><?= htmlspecialchars($data['level']) ?></td>
                        <td class="p-2">
                            <a class="text-sm inline-flex gap-1 items-center my-0.5 bg-yellow-400 hover:bg-yellow-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md" href="?url=edit-petugas&id_admin=<?= $data['id_admin'] ?>">Edit
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                    <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                    <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                </svg>
                            </a>
                            <a class="text-sm inline-flex gap-1 items-center my-0.5 bg-red-400 hover:bg-red-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md" href="../processes/petugasCrud.php?action=delete&id_admin=<?= $data['id_admin'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a id="showPassBtn-<?= $no ?>" class="select-none cursor-pointer text-sm inline-flex gap-1 items-center my-0.5 bg-teal-400 hover:bg-teal-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md whitespace-nowrap" onclick="togglePassword(<?= $no ?>, true)">Tampilkan Password
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </a>
                            <a id="hidePassBtn-<?= $no ?>" class="select-none cursor-pointer text-sm hidden gap-1 items-center my-0.5 bg-teal-600 hover:bg-teal-700 text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md whitespace-nowrap" onclick="togglePassword(<?= $no ?>, false)">Sembunyikan Password
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach;
            else :
                ?>
        </tbody>
    </table>
    <p class="text-center w-full text-gray-500 text-2xl mt-8">Tidak ada isi tabel</p>
<?php
            endif
?>
</div>
<script>
    function togglePassword(no, show) {
        const passwordField = document.getElementById(`password-${no}`);
        const showPassBtn = document.getElementById(`showPassBtn-${no}`);
        const hidePassBtn = document.getElementById(`hidePassBtn-${no}`);

        if (show) {
            passwordField.textContent = passwordField.getAttribute('data-password');
            showPassBtn.classList.remove('inline-flex');
            showPassBtn.classList.add('hidden');
            hidePassBtn.classList.remove('hidden');
            hidePassBtn.classList.add('inline-flex');
        } else {
            passwordField.textContent = '**********';
            showPassBtn.classList.remove('hidden');
            showPassBtn.classList.add('inline-flex');
            hidePassBtn.classList.remove('inline-flex');
            hidePassBtn.classList.add('hidden');
        }
    }
</script>