<?php include 'inc/header.php'; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Update Student Data
            <a class="btn btn-success" href="index.php"> Back</a>
        </h2>
    </div>

    <div class="panel-body">
        <br>
        <form action="lib/process_student.php" method="post">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" value="Rafiul Islam" id="name" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Student Email</label>
                <input type="email" name="email" value="email" id="email" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" name="number" value="number" id="number" class="form-control" required="">
            </div>
            <br>
            <div class="form-group">
                <input type="hidden" name="id" value="1" />
                <input type="hidden" name="action" value="edit" />
                <input type="submit" name="submit" value="Update Student" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>