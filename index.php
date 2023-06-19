<?php include 'inc/header.php'; ?>

<div class="panel-heading">
    <h2>Student Data

        <a class="btn btn-success" href="addstudent.php">Add Student Data</a>
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
            <tr>
                <td>
                    1
                </td>
                <td>
                    Rafi
                </td>
                <td>
                    rafi@gmail.com
                </td>
                <td>
                    01921756501
                </td>
                <td>
                    <a class="btn btn-primary" href="editstudent.php?id=1">Edit</a>
                    <a class="btn btn-danger" href="lib/process_student.php?action=delete&id=1"
                        onclick="return confirm('Are you sure to delete this Data?')">Delete</a>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

</div>

<?php include 'inc/footer.php'; ?>