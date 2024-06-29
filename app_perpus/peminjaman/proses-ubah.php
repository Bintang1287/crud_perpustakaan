<?php
include '../config/Database.php';
include '../object/Peminjaman.php';

$database = new Database();
$db = $database->getConnection();

$peminjaman = new Peminjaman($db);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form values to object properties
    $peminjaman_id = $_POST['id'];
    $peminjaman->ID = $peminjaman_id;
    $peminjaman->Anggota_ID = $_POST["anggota_id"];
    $peminjaman->TglPinjam = $_POST["tgl_pinjam"];
    $peminjaman->JadwalKembali = $_POST["jadwal_kembali"];
    $peminjaman->TglKembali = ($_POST["tgl_kembali"] == '0000-00-00') ? NULL : $_POST["tgl_kembali"];
    $peminjaman->Denda = $_POST["denda"];
    $peminjaman->Petugas_ID = $_POST["petugas_id"];

    

 
}

// If the form is not submitted properly, handle the error or redirect accordingly
?>
