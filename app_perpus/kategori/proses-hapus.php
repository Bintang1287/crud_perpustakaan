<?php
include '../config/Database.php';
include '../object/Kategori.php';

$database = new Database();
$db = $database->getConnection();

if ($_GET["ID"]) {
    $kategori = new Kategori($db);

    $id = $_GET['ID'];
    $kategori->ID = $id;

    $kategori->delete();
}

header("Location: http://localhost/app_perpus/kategori/index.php");
?>
