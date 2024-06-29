<?php
include '../config/Database.php';
include '../object/Kategori.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $kategori = new Kategori($db);

    // Get values from the form
    $kategori->NamaKategori = $_POST['namakategori'];

    // Call the create function in Kategori.php
    $kategori->create();
}

header("Location: http://localhost/app_perpus/kategori/index.php");
?>
