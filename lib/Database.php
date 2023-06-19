<?php
class Database
{
    private $hostdb = "localhost";
    private $userdb = "root";
    private $passdb = "";
    private $namedb = "crud_pdo";
    private $pdo;

    public function __construct()
    {
        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=" . $this->hostdb . ";dbname=" . $this->namedb, $this->userdb, $this->passdb);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $e) {
                die("Faield to connect with Database" . $e->getMessage());
            }
        }
    }
    // Read Data
    
    // $sql = $this->pdo->prepare("SELECT * FROM tableName WHERE id=:id AND email=:email LIMIT 1");
    // $sql->bindValue(':id', $id);
    // $sql->bindValue(':email', $email);
    // $sql->execute();

    public function select()
    {

    }
    // Insert Data
    public function insert()
    {

    }
    // Update Data
    public function update()
    {

    }

    // Delete Data
    public function delete()
    {

    }


}
?>