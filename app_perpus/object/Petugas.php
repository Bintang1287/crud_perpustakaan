<?php

    class Petugas {


        private $conn;
        private $table_name = "petugas";

        public $ID;
        public $NamaPetugas;
        public $Email;
        public $NomorTelp;
        public $Password;
        public $Role;

        public function __construct($db) {
            $this->conn = $db;
        }
        function create() {
        
            $query = "INSERT INTO " . $this->table_name . " (NamaPetugas, Email, NomorTelp, Password, Role) " . 
                                    "VALUES (:NamaPetugas, :Email, :NomorTelp, :Password, :Role)";
        
            $result = $this->conn->prepare($query);
            
            $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
            $this->Email = htmlspecialchars(strip_tags($this->Email));
            $this->NomorTelp = htmlspecialchars(strip_tags($this->NomorTelp));
            $this->Password = htmlspecialchars(strip_tags($this->Password));
            $this->Role = htmlspecialchars(strip_tags($this->Role));
           
        
            $result->bindParam(":NamaPetugas", $this->NamaPetugas);
            $result->bindParam(":Email", $this->Email);
            $result->bindParam(":NomorTelp", $this->NomorTelp);
            $result->bindParam(":Password", $this->Password);
            $result->bindParam(":Role", $this->Role);
          
        
            if($result->execute()) {
                return true;
            } else {
                return false;
            }
        }
        

        function readAll() {        
            // select
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
                    $this->NamaPetugas = $row["NamaPetugas"];
                    $this->Email = $row["Email"];
                    $this->NomorTelp = $row["NomorTelp"];
                    $this->Password = $row["Password"];
                    $this->Role = $row["Role"];
                }
            }    
        
        }
        function update() {
            $query = "UPDATE " . $this->table_name . " SET 
                        NamaPetugas = :NamaPetugas, 
                        Email = :Email,
                        NomorTelp = :NomorTelp, 
                        Password = :Password, 
                        Role = :Role    
                        WHERE 
                        ID = :ID";
        
            $result = $this->conn->prepare($query);
        
            $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
            $this->Email = htmlspecialchars(strip_tags($this->Email));
            $this->NomorTelp = htmlspecialchars(strip_tags($this->NomorTelp));
            $this->Password = htmlspecialchars(strip_tags($this->Password));
            $this->Role = htmlspecialchars(strip_tags($this->Role));
            $this->ID = htmlspecialchars(strip_tags($this->ID));
        
            $result->bindParam(":NamaPetugas", $this->NamaPetugas);
            $result->bindParam(":Email", $this->Email);
            $result->bindParam(":NomorTelp", $this->NomorTelp);
            $result->bindParam(":Password", $this->Password);
            $result->bindParam(":Role", $this->Role);
            $result->bindParam(":ID", $this->ID);
        
            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        }    
        function delete() {
            $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
            
            $result = $this->conn->prepare($query);
            $result->bindParam(1, $this->ID);
        
            $result->execute();
        }
    function authenticate() {
            $query = "SELECT * FROM " . $this->table_name . " WHERE Email = :Email AND Password = :Password";
            $result = $this->conn->prepare($query);
            
            $this->Email = htmlspecialchars(strip_tags($this->Email));
            $this->Password = htmlspecialchars(strip_tags($this->Password));
            
            $result->bindParam(":Email", $this->Email);
            $result->bindParam(":Password", $this->Password);
            
            $result->execute();
            
            if($result->rowCount() > 0) {
                $petugas = $result->fetch(PDO::FETCH_ASSOC);

                $_SESSION["namapetugas"] = $petugas["NamaPetugas"];
                $_SESSION["rolepetugas"] = $petugas["Role"];
                $_SESSION["idpetugas"] = $petugas["ID"];
                $_SESSION["emailpetugas"] = $petugas["Email"];

                return true;               
            } else {
                return false;
                }
    }    
    }
    ?>