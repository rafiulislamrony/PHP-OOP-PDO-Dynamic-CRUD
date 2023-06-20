<?php include 'inc/header.php'; ?>

<?php
include 'lib/Database.php';

?>

<div class="panel-heading">
    <h2>Student Data

        <a class="btn btn-success" href="addstudent.php">Add Student</a>
    </h2>
</div>

<div class="panel-body">
    <br>
    <div class="phed text-center">
        <h4>
            Showing Student Data
        </h4>
    </div>
    <br>

    <form action="" method="post">
        <table class="table table-striped">
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php

            $db = new Database();

            $table = "tbl_student";
            $order_by = array('order_by' => 'id DESC');

            // $selectcond = array('select'=> 'name'); 
            // $wherecond = array(
            //     'where'=>array('id' => '2', 'email'=>'rafiulerwislam@gmail.com'),
            //     'return_type'=>'single',
            // );
            // $limit = array('start'=>'2', 'limit' =>'2');
            // $limit = array('limit' =>'4');
            
            $studentData = $db->select($table, $order_by);

            if (!empty($studentData)) {
                $i = 0;
                 foreach ($studentData as $data) { $i++
                 ?> 
                    <tr>
                        <td>
                             <?php echo $i; ?>  
                        </td>
                        <td>
                        <?php echo $data['name']; ?>
                        </td>
                        <td>
                        <?php echo $data['email']; ?>
                        </td>
                        <td>
                        <?php echo $data['phone']; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="editstudent.php?id=<?php echo $data['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="lib/process_student.php?action=delete&id=<?php echo $data['id']; ?>"
                                onclick="return confirm('Are you sure to delete this Data?')">Delete</a> 
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5"> 
                       <h2>No Student Data Found.....</h2>
                    </td>
                </tr>
            <?php }
            ?>

            <tr>
                <td colspan="5">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

</div>

<?php include 'inc/footer.php'; ?>