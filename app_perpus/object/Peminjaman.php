<?php

class Peminjaman {
    private $conn;
    private $table_name = "peminjaman";

    public $ID;
    public $Anggota_ID;
    public $TglPinjam;
    public $JadwalKembali;
    public $TglKembali;
    public $Denda;
    public $Petugas_ID;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi untuk menambah data peminjaman
    function create() {
        $query = "INSERT INTO " . $this->table_name . " (Anggota_ID, TglPinjam, JadwalKembali, TglKembali, Denda, Petugas_ID) " . 
                    "VALUES (:Anggota_ID, :TglPinjam, :JadwalKembali, :TglKembali, :Denda, :Petugas_ID)";

        $result = $this->conn->prepare($query);

        $this->Anggota_ID = htmlspecialchars(strip_tags($this->Anggota_ID));
        $this->TglPinjam = htmlspecialchars(strip_tags($this->TglPinjam));
        $this->JadwalKembali = htmlspecialchars(strip_tags($this->JadwalKembali));
        $this->TglKembali = htmlspecialchars(strip_tags($this->TglKembali));
        $this->Denda = htmlspecialchars(strip_tags($this->Denda));
        $this->Petugas_ID = htmlspecialchars(strip_tags($this->Petugas_ID));

        $result->bindParam(":Anggota_ID", $this->Anggota_ID);
        $result->bindParam(":TglPinjam", $this->TglPinjam);
        $result->bindParam(":JadwalKembali", $this->JadwalKembali);
        $result->bindParam(":TglKembali", $this->TglKembali);
        $result->bindParam(":Denda", $this->Denda);
        $result->bindParam(":Petugas_ID", $this->Petugas_ID);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk membaca semua data peminjaman
    function readAll() {        
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();
        
        return $result;
    }

    // Fungsi untuk membaca satu data peminjaman berdasarkan ID
    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";
        
        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();
        
        if ($result !== false) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if ($row !== false) {
                $this->Anggota_ID = $row["Anggota_ID"];
                $this->TglPinjam = $row["TglPinjam"];
                $this->JadwalKembali = $row["JadwalKembali"];
                $this->TglKembali = $row["TglKembali"];
                $this->Denda = $row["Denda"];
                $this->Petugas_ID = $row["Petugas_ID"];
            }
        }    
    }

    // Fungsi untuk mengupdate data peminjaman
    function update() {
        $query = "UPDATE " . $this->table_name . " SET 
                    Anggota_ID = :Anggota_ID, 
                    TglPinjam = :TglPinjam, 
                    JadwalKembali = :JadwalKembali, 
                    TglKembali = :TglKembali, 
                    Denda = :Denda, 
                    Petugas_ID = :Petugas_ID
                    WHERE 
                    ID = :ID";

        $result = $this->conn->prepare($query);

        $this->Anggota_ID = htmlspecialchars(strip_tags($this->Anggota_ID));
        $this->TglPinjam = htmlspecialchars(strip_tags($this->TglPinjam));
        $this->JadwalKembali = htmlspecialchars(strip_tags($this->JadwalKembali));
        $this->TglKembali = htmlspecialchars(strip_tags($this->TglKembali));
        $this->Denda = htmlspecialchars(strip_tags($this->Denda));
        $this->Petugas_ID = htmlspecialchars(strip_tags($this->Petugas_ID));
        $this->ID = htmlspecialchars(strip_tags($this->ID));

        $result->bindParam(":Anggota_ID", $this->Anggota_ID);
        $result->bindParam(":TglPinjam", $this->TglPinjam);
        $result->bindParam(":JadwalKembali", $this->JadwalKembali);
        $result->bindParam(":TglKembali", $this->TglKembali);
        $result->bindParam(":Denda", $this->Denda);
        $result->bindParam(":Petugas_ID", $this->Petugas_ID);
        $result->bindParam(":ID", $this->ID);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }    

    // Fungsi untuk menghapus data peminjaman
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
        
        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
    
        $result->execute();
    }
}
?>
