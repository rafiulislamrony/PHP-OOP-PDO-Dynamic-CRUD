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
    // $sql = "SELECT * FROM tableName WHERE id=:id AND email=:email LIMIT 5";
    // $query = $this->pdo->prepare($sql);
    // $query->bindValue(':id', $id);
    // $query->bindValue(':email', $email);
    // $query->execute();

    public function select($table, $data = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $data) ? $data['select'] : '*';
        $sql .= ' FROM ' . $table;
        // For Where 
        if (array_key_exists("where", $data)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($data['where'] as $key => $value) {
                $add = ($i > 0) ? ' And ' : '';
                $sql .= "$add" . "$key=:$key";
                $i++;
            }
        }
        // For Order By
        if (array_key_exists("order_by", $data)) {
            $sql .= ' ORDER BY ' . $data['order_by'];
        }
        // For Limit
        if (array_key_exists("start", $data) && array_key_exists("limit", $data)) {
            $sql .= ' LIMIT ' . $data['start'] . ',' . $data['limit'];
        } elseif (!array_key_exists("start", $data) && array_key_exists("limit", $data)) {
            $sql .= ' LIMIT ' . $data['limit'];
        }

        // Double Where
        $query = $this->pdo->prepare(($sql));

        if (array_key_exists("where", $data)) {
            foreach ($data['where'] as $key => $value) {
                $query->bindValue(":$key", $value);
            }
        }

        $query->execute();

        if (array_key_exists("return_type", $data)) {
            switch ($data['return_type']) {
                case 'count':
                    $value = $query->rowCount();
                    break;
                case 'single':
                    $value = $query->fetch(PDO::FETCH_ASSOC);
                    break;

                default:
                $value= '';
                    break;
            }
        }else{
            if($query->rowCount() > 0){
                $value = $query->fetchAll();
            }
        }
        return !empty($value)?$value:false;

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