<?php

include 'Database.php';
$db = new Database();
$table = "tbl_student";

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action']== 'add'){
        $studentData = array(
            'name'  => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
        );
        $insert = $db->insert($table, $studentData);
    }
}



?>

<?php


?>