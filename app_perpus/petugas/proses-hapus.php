<?php

if($_GET["ID"]) {
    include '../config/Database.php';
    include '../object/Petugas.php';

    $database = new Database(); 
    $db = $database->getConnection();

    $petugas = new Petugas ($db);
    $petugas->ID = $_GET["ID"];

    $petugas->delete();

}

header("Location: http://localhost/app_perpus/petugas/index.php"); 
?>