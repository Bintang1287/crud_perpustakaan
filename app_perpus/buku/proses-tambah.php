<?php
include '../config/Database.php';
include '../object/Buku.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $buku = new Buku($db);

    // Mendapatkan nilai dari formulir
    $buku->ISBN = $_POST['isbn'];
    $buku->Judul = $_POST['judul'];
    $buku->Pengarang = $_POST['pengarang'];
    $buku->Kategori_ID = $_POST['kategori_id']; 
    $buku->Penerbit_ID = $_POST['penerbit_id']; 
    $buku->Deskripsi = $_POST['deskripsi'];
    $buku->Stok = $_POST['stok'];

    // Memanggil fungsi create di Buku.php
    $buku->create();

}
header("Location: http://localhost/app_perpus/buku/index.php");
?>
