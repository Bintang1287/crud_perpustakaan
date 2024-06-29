<?php
include '../config/layout.php';
include '../config/Database.php';


$database = new Database();
$db = $database->getConnection();

// Ambil data anggota
$query_anggota = "SELECT ID, NamaLengkap FROM anggota";
$result_anggota = $db->prepare($query_anggota);
$result_anggota->execute();

// Ambil data petugas
$query_petugas = "SELECT ID, NamaPetugas FROM petugas";
$result_petugas = $db->prepare($query_petugas);
$result_petugas->execute();

$query_buku = "SELECT ID, Judul FROM buku";
$result_buku = $db->prepare($query_buku);
$result_buku->execute();

?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Tambah Data Peminjaman</h2>
        <form action="proses-tambah.php" method="POST">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
            <label for="anggota_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Anggota ID</label>
            <select name="anggota_id" id="anggota_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                <?php
                // Menampilkan opsi select dari hasil kueri anggota atau petugas (gunakan satu hasil kueri yang sama)
                while ($row_anggota = $result_anggota->fetch(PDO::FETCH_ASSOC)) {
                    $selected_anggota = ''; // Untuk menandai item terpilih
                    // Sesuaikan dengan nilai yang diambil dari formulir atau sesuai kebutuhan
                    if ($row_anggota['ID'] == $anggota_id) {
                        $selected_anggota = 'selected';
                    }

                    echo "<option value='{$row_anggota['ID']}' $selected_anggota>{$row_anggota['NamaLengkap']}</option>";
                }
                ?>
            </select>
        </div>
<div class="flex gap-4 ">
    <div class="w-full">
        <label for="tgl_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
    </div>
    <div class="w-full">
        <label for="jadwal_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Jadwal Kembali</label>
        <input type="date" name="jadwal_kembali" id="jadwal_kembali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
    </div>
    <div class="w-full">
    <label for="tgl_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" id="tgl_kembali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="0000-00-00" oninput="checkDate()">
</div>
</div>


                <div class="w-full">
                    <label for="denda" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Denda</label>
                    <input type="text" name="denda" id="denda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Denda">
                </div>
                <div class="sm:col-span-2">
    <label for="petugas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Petugas ID</label>
    <select name="petugas_id" id="petugas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        <?php
        // Menampilkan opsi select dari hasil query anggota dan petugas
        while ($row_petugas = $result_petugas->fetch(PDO::FETCH_ASSOC)) {
            $selected_petugas = ''; // Untuk menandai item terpilih
            // Sesuaikan dengan nilai yang diambil dari formulir atau sesuai kebutuhan
            if ($row_petugas['ID'] == $petugas_id) {
                $selected_petugas = 'selected';
            }

            echo "<option value='{$row_petugas['ID']}' $selected_petugas>{$row_petugas['NamaPetugas']}</option>";
        }
        ?>
    </select>
</div>
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Detail Peminjaman</h2>
            <br>
            <div class="w-full">
    <label for="buku_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Buku ID</label>
    <select name="buku_id" id="buku_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
        <?php
        // Menampilkan opsi select dari hasil query buku
        while ($row_buku = $result_buku->fetch(PDO::FETCH_ASSOC)) {
            $selected_buku = ($row_buku['ID'] == $buku_id) ? 'selected' : '';
            $judul_buku = htmlspecialchars($row_buku['Judul']); // Menggunakan htmlspecialchars
            echo "<option value='{$row_buku['ID']}' $selected_buku>{$judul_buku}</option>";
        }
        ?>
    </select>
</div>

<div class="w-full">
    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Jumlah</label>
    <input type="text" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Jumlah" required="">
</div>

            <div class="sm:col-span-2">
       
            <button type="submit" class="text-white bg-blue-700
hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
<button type="button" onclick="history.back()"
class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4
focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200
text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-
gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white
dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button> 
      </form>
  </div>
        </form>
    </div>
</div>
 


</body>
</html>