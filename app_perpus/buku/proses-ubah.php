<?php
if ($_POST) {
    include '../config/Database.php';
    include '../object/Buku.php';

    $database = new Database();
    $db = $database->getConnection();

    $buku = new Buku($db);

    $buku->ID = $_POST['id'];
    $buku->ISBN = htmlspecialchars(strip_tags($_POST['isbn']));
    $buku->Judul = htmlspecialchars(strip_tags($_POST['judul']));
    $buku->Pengarang = htmlspecialchars(strip_tags($_POST['pengarang']));
    $buku->Kategori_ID = $_POST['kategori_id'];
    $buku->Penerbit_ID = $_POST['penerbit_id'];
    $buku->Deskripsi = htmlspecialchars(strip_tags($_POST['deskripsi']));
    $buku->Stok = $_POST['stok'];

    $buku->update();
}

header("Location: http://localhost/app_perpus/buku/index.php");
?>
