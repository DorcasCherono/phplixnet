<?php
include "connectdb.php";
$sql = "SELECT * FROM `personal`";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>view</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/material/material-icons.css">

    <style>
        i {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="personaldetails.php" class="btn btn-primary col col-md-1 offset-md-10">
        <i class="material-icons">add</i> Add
    </a>
    <table class="table table-bordered table-striped">
        <tr class="text-success">
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>PersonalInfo</th>
            <th>Qualifications</th>
            <th>Hobbies</th>
            <th><i class="material-icons">delete</i> Delete</th>
            <th>Update</th>


        </tr>
        <?php
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['personalinfo'] . "</td>";
                echo "<td>" . $row['qualifications'] . "</td>";
                echo "<td>" . $row['hobbies'] . "</td>";
                echo "<td> <a href='delete.php?id=" . $row['id'] . "' class='btn btn-info'>Delete</a></td>";
                echo "<td> <a href='update.php?id=" . $row['id'] . "' class='btn btn-info'>Update</a></td>";

                echo "</tr>";
            }

        }

        ?>
    </table>
</div>
</body>
</html>