<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP & PDO Dynamic CRUD</title>
    <link rel="stylesheet" href="inc/boostrap.min.css">
    <link rel="stylesheet" href="inc/min.css">
    <script src="inc/jquery.min.js"></script>
    <script src="inc/boostrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="well text-center">
            <h2>Student List</h2>
        </div>
        <br>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    <a class="btn btn-success" href="add.php">Add Student</a>
                    <a class="btn btn-info pull-right" href="attendance_view.php">View All</a>
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
                            <th width="25%">Serial</th>
                            <th width="25%">Student Name</th>
                            <th width="25%">Student Roll</th>
                            <th width="25%">Attendance </th>
                        </tr>
                        <tr>
                            <td>
                                Hi
                            </td>
                            <td>
                                Hi
                            </td>
                            <td>
                                Hi
                            </td>
                            <td>
                                Hi
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
        <br>


        <div class="well text-center">
            <h3>Copyright © 2023. All rights reserved.</h3>
        </div>
    </div>
</body>

</html>