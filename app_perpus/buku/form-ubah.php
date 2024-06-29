<?php
include '../config/layout.php';
include '../config/Database.php';
include '../object/Kategori.php';
include '../object/Buku.php';
include '../object/Penerbit.php';

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);

$kategori = new Kategori($db);
$penerbit = new Penerbit($db);

$dataKategori = $kategori->readAll();
$dataPenerbit = $penerbit->readAll();

$id = $_GET["ID"];
$buku->ID = $id;

$buku->readOne();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Tambah Data Buku</h2>
        <form action="proses-ubah.php" method="POST">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">ISBN</label>
                    <input type="text" name="isbn" value="<?= $buku->ISBN ?>" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ISBN" required="">
                </div>
                <div class="w-full">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Judul</label>
                    <input type="text" name="judul" value="<?= $buku->Judul ?>" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Judul" required="">
                </div>

                <div class="w-full">
                    <label for="pengarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pengarang</label>
                    <input type="text" name="pengarang" value="<?= $buku->Pengarang?>"id="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Pengarang" required="">
                </div>

                <div class="w-full">
                <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <?php
                    while ($row = $dataKategori->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                    ?>
                    <option value="<?= $ID ?>" <?php if($ID == $buku->Kategori_ID) echo 'selected'?>><?= $NamaKategori ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

                            <div class="w-full      ">
                    <label for="penerbit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Penerbit</label>
                    <select name="penerbit_id" id="penerbit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <?php
                    while ($row = $dataPenerbit->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                    ?>
                    <option value="<?= $ID ?>" <?php if($ID == $buku->Penerbit_ID) echo 'selected'?>><?= $NamaPenerbit ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="id" value="<?= $id ?>">
                </div>


                <div class="sm:col-span-2">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi" required=""><?= $buku->Deskripsi ?></textarea>
                </div>

                <div class="sm:col-span-2">
                    <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Stok</label>
                    <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Stok" required="">
                </div>
                </div>
          <div class="sm:col-span-2">
            <br>
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
</section>
</div></body>
</html>
