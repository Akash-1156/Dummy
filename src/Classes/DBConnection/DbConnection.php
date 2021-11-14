<?php

namespace App\DbConnection;
use PDO;
use PDOException;

class DbConnection
{
    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        // $servername = "sql302.epizy.com";
        // $username = "epiz_30343074";
        // $password = "D2mUV9RtSLrlp";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=db.a", $username, $password);
            // $this->conn = new PDO("mysql:host=$servername;dbname=epiz_30343074_serv", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
