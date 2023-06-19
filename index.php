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
            <h2>PHP OOP & PDO Dynamic CRUD</h2>
        </div>
        <br>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Student Data

                    <a class="btn btn-success" href="add.php">Add Student Data</a> 
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
                               <a href="editstudent.php?id=1">Edit</a>
                               <a href="deletestudent.php?id=1" onclick="return confirm('Are you sure to delete this Data?')" >Delete</a>
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
        </div>
        <br>


        <div class="well text-center">
            <h3>Copyright © 2023. All rights reserved.</h3>
        </div>
    </div>
</body>

</html>