<?php
class Kategori {
    private $conn;
    private $table_name = "kategori";

    public $ID;
    public $NamaKategori;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " (NamaKategori) VALUES (:NamaKategori)";

        $result = $this->conn->prepare($query);

        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));

        $result->bindParam(":NamaKategori", $this->NamaKategori);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();

        if ($result !== false) {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row !== false) {
                $this->NamaKategori = $row["NamaKategori"];
            }
        }
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET NamaKategori = :NamaKategori WHERE ID = :ID";

        $result = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));

        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaKategori", $this->NamaKategori);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = :ID";

        $result = $this->conn->prepare($query);
        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $result->bindParam(":ID", $this->ID);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
