<?php
class Penerbit {
    private $conn;
    private $table_name = "penerbit";

    public $ID;
    public $NamaPenerbit;
    public $Alamat;
    public $NoTelp;

    public function __construct($db) {
        $this->conn = $db;
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
                $this->NamaPenerbit = $row["NamaPenerbit"];
                $this->Alamat = $row["Alamat"];
                $this->NoTelp = $row["NoTelp"];
            }
        }
    }
}
?>
