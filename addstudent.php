<?php include 'inc/header.php'; ?>


<div class="panel-heading">
    <h2>Add Student Data
        <a class="btn btn-success" href="index.php"> Back</a>
    </h2>
</div>

<div class="panel-body">
    <br>
    <form action="lib/process_student.php" method="post">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" class="form-control" required="">
        </div>
        <br>
        <div class="form-group">
            <label for="email">Student Email</label>
            <input type="email" name="email" id="email" class="form-control" required="">
        </div>
        <br>
        <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="text" name="number" id="number" class="form-control" required="">
        </div>
        <br>
        <div class="form-group">
            <input type="hidden" name="action" value="add" />
            <input type="submit" name="submit" value="Add Student data" class="btn btn-primary">
        </div>

    </form>
</div>


<?php include 'inc/footer.php'; ?>