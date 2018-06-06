<?php
include 'connectdb.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        #roww {
            padding-top: 100px;
        }

        form {
            background-color: #ffffff;
            color: #0e90d2;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col col-md-6 offset-md-3" id="roww">
            <h2 class="text-center">Register</h2>

            <?php
            if (isset($_POST["submit"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $confirm = $_POST["confirm"];
                $submit = $_POST["submit"];

                if (empty($username)) {

                    echo "enter username";
                } elseif (empty($password)) {

                    echo "enter password";
                } elseif (empty($confirm)) {


                    echo "confirm your password";
                } else {
                    if ($password == $confirm) {

                        $sql = "INSERT INTO `registration`(`username`, `password`) VALUES ('$username','$password')";
                        $query = mysqli_query($con, $sql);
                        if ($query) {

                            echo "registered successfully";
                        } else {
                            echo "failed" . mysqli_error($con);
                        }
                    }
                    else{

                        echo "<div class='text-center text-danger'>password do not match!!</div>";
                    }
                }
            }
            ?>

            <form method="POST" action=" ">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>