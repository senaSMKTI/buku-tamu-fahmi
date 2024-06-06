<br />
<br />
<a class="py-2 px-3 rounded-md bg-white" href="?url=petugas">
    < Kembali</a>
        <div class="flex items-center flex-col">

            <h3 class="font-bold text-2xl mb-4">Tambah Petugas</h3>
            <form class="text-center" action="../controllers/PetugasController.php?action=add" method="post">
                <table class="flex justify-center text-start">
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input class="m-1 ml-3 p-1 px-2 border rounded-md" type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td><label for="level">Level:</label></td>
                        <td>
                            <select class="m-1 ml-3 p-1 px-2 border rounded-md" name="level" id="level" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="admin">admin</option>
                                <option value="petugas">petugas</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="mt-6 py-1.5 px-3 rounded-md text-white bg-sky-500 hover:bg-sky-600 duration-300">Tambah</button>
            </form>
        </div>