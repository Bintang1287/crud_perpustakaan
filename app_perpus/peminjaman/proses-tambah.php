<?php
include '../config/database.php';
include '../object/Peminjaman.php';

// Ambil data yang dikirimkan dari formulir
$anggota_id = $_POST['anggota_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$jadwal_kembali = $_POST['jadwal_kembali'];
$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];
$petugas_id = $_POST['petugas_id'];

// Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// Inisialisasi objek Peminjaman
$peminjaman = new Peminjaman($db);

// Set nilai-nilai properti objek Peminjaman
$peminjaman->Anggota_ID = $anggota_id;
$peminjaman->TglPinjam = $tgl_pinjam;
$peminjaman->JadwalKembali = $jadwal_kembali;
$peminjaman->TglKembali = $tgl_kembali;
$peminjaman->Denda = $denda;
$peminjaman->Petugas_ID = $petugas_id;

// Panggil fungsi create untuk menambah data peminjaman
$peminjaman->create();
header("Location: http://localhost/app_perpus/peminjaman/index.php"); 
 
?>
