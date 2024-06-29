<?php

if($_GET["ID"]) {
    include '../config/Database.php';
    include '../object/Peminjaman.php';

    $database = new Database(); 
    $db = $database->getConnection();

    $petugas = new Peminjaman ($db);
    $petugas->ID = $_GET["ID"];

    $petugas->delete();

}

header("Location: http://localhost/app_perpus/peminjaman/index.php"); 
?>