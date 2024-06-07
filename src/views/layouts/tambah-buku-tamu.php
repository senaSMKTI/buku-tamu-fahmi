<br />
<br />
<a class="py-2 px-3 rounded-md bg-white" href="?url=buku-tamu">
    < Kembali</a>
    <div class="flex items-center flex-col">

        <h3 class="font-bold text-2xl mb-4">Tambah Buku Tamu Sekolah</h3>
        <form class="text-center" action="../processes/bukuTamuCrud.php?action=add" method="post">
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
                    <button type="submit" class="mt-6 py-1.5 px-3 rounded-md text-white bg-sky-500 hover:bg-sky-600 duration-300">Tambah</button>
                </form>
    </div>