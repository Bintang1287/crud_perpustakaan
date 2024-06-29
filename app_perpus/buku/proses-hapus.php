<?php
if ($_GET["ID"]) {
    include '../config/Database.php';
    include '../object/Buku.php';

    $database = new Database();
    $db = $database->getConnection();

    $buku = new Buku($db);

    $id = $_GET['ID'];
    $buku->ID = $id;

    $buku->delete();
}

header("Location: http://localhost/app_perpus/buku/index.php");
?>
