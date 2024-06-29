<?php
include '../config/Database.php';
include '../object/Kategori.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $kategori = new Kategori($db);

    // Get values from the form
    $kategori->ID = $_POST['id'];
    $kategori->NamaKategori = htmlspecialchars(strip_tags($_POST['namakategori']));

    // Call the update function in Kategori.php
    $kategori->update();
}

header("Location: http://localhost/app_perpus/kategori/index.php");
?>
