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
            background-color: white;
            color: #0e90d2;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col col-md-6 offset-md-3" id="roww">
            <h2 class="text-center">Login</h2>

            <?php
            if (isset($_POST["submit"])) {
                $usernamee = $_POST["username"];
                $passwordd = $_POST["password"];
                $submit = $_POST["submit"];

                $sql = "SELECT * FROM `registration` WHERE username ='$usernamee' AND password ='$passwordd'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    if (mysqli_num_rows($query) > 0) {
                        $result = mysqli_fetch_assoc($query);
                        if ($usernamee == $result['username'] && $passwordd == $result['password']) {
                            header("Location:view.php");
                        } else {
                            echo "<div class='text-center text-danger'>incorrect username or password</div>";
                        }
                    } else {
                        echo "<div class='text-center text-danger'>incorrect username or password</div>";
                    }
                }
            }
            ?>

            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="submit" value="Login" required>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>