<?php
include 'lib/Database.php'; ?>
<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Update Student Data
            <a class="btn btn-success" href="index.php"> Back</a>
        </h2>
    </div>

    <?php
    $id = $_GET['id'];
    $db = new Database();
    $table = "tbl_student";
    $wherecond = array(
        'where' => array('id' => $id),
        'return_type' => 'single'
    );
    $value = $db->select($table, $wherecond);

    if(!empty($value)){ ?> 
    <div class="panel-body">
        <br>
        <form action="lib/process_student.php" method="post">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" value="<?php echo $value['name']; ?>" id="name" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Student Email</label>
                <input type="email" name="email" value="<?php echo $value['email']; ?>" id="email" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" name="number" value="<?php echo $value['phone']; ?>" id="number" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>" /> 
                <input type="hidden" name="action" value="edit" />
                <input type="submit" name="submit" value="Update Student" class="btn btn-primary">
            </div>

        </form>
    </div>
    <?php  }  ?>
</div>

<?php include 'inc/footer.php'; ?>