<?php
if ($_POST) {
    include '../config/Database.php';
    include '../object/Petugas.php';

    $database = new Database();
    $db = $database->getConnection();

    $petugas = new Petugas($db);

    $petugas->NamaPetugas = $_POST['namapetugas'];
    $petugas->Email = $_POST['email'];
    $petugas->NomorTelp = $_POST['nomortelp'];
    $petugas->Password = $_POST['password'];
    $petugas->Role = $_POST['role'];
    $petugas->ID = $_POST['id'];

    $petugas->update();

    }
    header("Location: http://localhost/app_perpus/petugas/index.php");
?>
