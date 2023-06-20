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
    // $query->bindParam(':id', $id);
    // $query->bindParam(':email', $email);
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
        $query = $this->pdo->prepare($sql);
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
                    $value = '';
                    break;
            }
        } else {
            if ($query->rowCount() > 0) {
                $value = $query->fetchAll();
            }
        }
        return !empty($value) ? $value : false;

    }

    // Insert Data 
    // $sql = "INSERT INTO tableName(name, email) VALUES (:name, :email)"; 
    // $query = $this->pdo->prepare($sql);
    // $query->bindValue(':name', $name)
    // $query->bindValue(':email', $email);
    // $query->execute();

    public function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            $keys = '';
            $values = '';
            $i = 0;
            $keys = implode(',', array_keys($data));
            $values = ":" . implode(', :', array_keys($data));
            $sql = "INSERT INTO " . $table . " (" . $keys . ") VALUES ( " . $values . ")";
            $query = $this->pdo->prepare($sql);

            foreach ($data as $key => $val) {
                $query->bindValue(":$key", $val);
            }
            $insertdata = $query->execute();

            if ($insertdata) {
                $lastId = $this->pdo->lastInsertId();
                return $lastId;
            } else {
                return false;
            }
        }
    }
    // Update Data
    // $sql = "UPDATE tableName SET name=:name, email=:email, phone=:phone WHERE id=:id;"; 
    // $query = $this->pdo->prepare($sql);
    // $query->bindValue(':name', $name);
    // $query->bindValue(':email', $email);
    // $query->bindValue(':phone', $phone);
    // $query->bindValue(':id', $id);
    // $query->execute();

    public function update($table, $data, $condition)
    {
        if (!empty($data) && is_array($data)) {
            $keysvalue = '';
            $whereCond = '';
            $i = 0;

            foreach ($data as $key => $val) {
                $add = ($i > 0) ? ' , ' : '';
                $keysvalue .= "$add" . "$key=:$key";
                $i++;
            }

            if (!empty($condition) && is_array($condition)) {
                $whereCond .= " WHERE ";
                $i = 0;
                foreach ($condition as $key => $val) {
                    $add = ($i > 0) ? ' AND ' : '';
                    $whereCond .= "$add" . "$key=:$key";
                    $i++;
                }
            }

            $sql = "UPDATE " . $table . " SET " . $keysvalue . $whereCond;

            $query = $this->pdo->prepare($sql);
            foreach ($data as $key => $val) {
                $query->bindValue(":$key", $val);
            }
            foreach ($condition as $key => $val) {
                $query->bindValue(":$key", $val);
            }
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        } else {
            return false;
        }
    }

    // Delete Data
    // $sql = "DELETE FROM tableName WHERE id=:id;"; 
    // $query = $this->pdo->prepare($sql); 
    // $query->bindValue(':id', $id);
    // $query->execute();
    public function delete($table, $data)
    {
        $whereCond = ''; 
        if (!empty($data) && is_array($data)) {
            $whereCond .= " WHERE ";
            $i = 0;
            foreach ($data as $key => $val) {
                $add = ($i > 0) ? ' AND ' : '';
                  $whereCond .= "$add" . "$key=:$key";
                //$whereCond .= $add.$key." = '".$val."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereCond;  
        // $delete = $this->pdo->exec($sql);
        // return $delete?true:false;

        $query = $this->pdo->prepare($sql);
        foreach ($data as $key => $val) {
            $query->bindValue(":$key", $val);
        }
        $delete = $query->execute();
        return $delete?true:false;

    }

}
?>