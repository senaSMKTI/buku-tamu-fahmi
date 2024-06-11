<?php
include '../../inc/conn.php';
?>
<h2 class="font-bold text-xl my-2">Buku Tamu Sekolah</h2>
<a class="inline-block bg-green-400 hover:bg-green-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md" href="?url=tambah-buku-tamu">Tambah +</a>
<br />
<br />
<div class="relative overflow-x-auto">
    <table class="border border-gray-100 w-full" border="1">
        <thead>
            <tr class="font-bold uppercase text-xs bg-gray-100">
                <td class="p-3">No</td>
                <td class="p-3">Nama</td>
                <td class="p-3">Email</td>
                <td class="p-3">Asal</td>
                <td class="p-3">Pekerjaan</td>
                <td class="p-3">Keperluan</td>
                <td class="p-3">Waktu Kirim</td>
                <td class="p-3">Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM tamu";
            $result = mysqli_query($conn, $query);
            foreach ($result as $data) :
            ?>
                <tr>
                    <td class="p-2 font-bold text-sm"><?= $no++ ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['nama']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['email']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['asal']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['pekerjaan']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['keperluan']) ?></td>
                    <td class="p-2"><?= htmlspecialchars($data['waktu_buku_tamu']) ?></td>
                    <td class="p-2">
                        <a class="text-sm inline-flex gap-1 items-center my-0.5 bg-yellow-400 hover:bg-yellow-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md" href="?url=edit-buku-tamu&id_tamu=<?= $data['id_tamu'] ?>">Edit
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                            </svg>
                        </a>
                        <a class="text-sm inline-flex gap-1 items-center my-0.5 bg-red-400 hover:bg-red-500 hover:text-gray-50 duration-300 rounded-md py-1.5 px-2 shadow hover:shadow-md" href="../processes/bukuTamuCrud.php?action=delete&id_tamu=<?= $data['id_tamu'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>