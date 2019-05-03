<?php
class Database{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect(){

        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "collegedb";
        $this->charset = "utf8mb4";

        try {
            $datasourcename="mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo=new PDO($datasourcename, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $th) {
            echo "Connection failed: ".$th->getMessage();
        }

    }
}
?>