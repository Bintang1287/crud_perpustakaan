<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/Database.php';
    include '../object/Anggota.php';
    include '../object/Petugas.php';

    $database = new Database();
    $db = $database->getConnection();

    $petugas = new Petugas($db);

    // Ambil data dari form
    $petugas->NamaPetugas = htmlspecialchars(strip_tags($_POST['namapetugas']));
    $petugas->Email = htmlspecialchars(strip_tags($_POST['email']));
    $petugas->NomorTelp = htmlspecialchars(strip_tags($_POST['nomortelp']));
    $petugas->Password = htmlspecialchars(strip_tags($_POST['password']));
    $petugas->Role = $_POST['role'];

    // Panggil fungsi create
    if ($petugas->create()) {
        // Jika berhasil, redirect
        header("Location: http://localhost/app_perpus/petugas/index.php");
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menambahkan petugas.";
    }
}
?>