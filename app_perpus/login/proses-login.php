<?php
session_start();
    
if($_POST) {
    include '../config/Database.php';
    include '../object/Petugas.php';

    $database = new Database(); 
    $db = $database->getConnection();

    $petugas = new Petugas ($db);

    $petugas->Email = $_POST["email"];
    $petugas->Password = $_POST["password"];
    
    if($petugas->authenticate()) {
        header("Location: http://localhost/app_perpus/dashboard/index.php"); 
    } else {
        header("Location: http://localhost/app_perpus/login/index.php");
    }
}
?>