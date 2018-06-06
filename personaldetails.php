<?php


include 'connectdb.php';


?>

<!DOCTYPE html>
<html>
<head>
    <title>personal details</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        form {
            width: 40%;
            padding: 40px;
            margin: 20px auto;
            border: 1px solid #8a8a8a;
            border-radius: 5px;
            background-color: #ffffff;
            color: #0e90d2;
        }
    </style>
</head>
<body style="background-color: #ededed">
<?php

if (isset($_POST["save"])) {


    $name = $_POST["Name"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];
    $comments = $_POST["Personalinfo"];
    $qualifications = $_POST["Qualifications"];
    $hobbies = $_POST["Hobbies"];

    $sql = "INSERT INTO `personal`(`name`, `phone`, `email`, `personalinfo`, `qualifications`, `hobbies`) VALUES ('$name','$phone','$email','$comments','$qualifications','$hobbies')";

    $query = mysqli_query($con, $sql);
    if ($query) {
       header("Location: view.php");
       exit;
    } else {

        echo "Error";
    }


}

?>
<div class="container">
    <form class="" method="POST" action="">
        <label><h1>Personal details</h1></label>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="Name" required>

        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" class="form-control" name="Phone" required>

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="Email" required>

        </div>

        <div class="form-group">
            <label>Personal Info:</label>
            <textarea rows="4" cols="40" class="form-control" name="Personalinfo" required></textarea>


        </div>
        <div class="form-group">
            <label>Qualifications:</label>
            <input type="text" class="form-control" name="Qualifications" required>
        </div>
        <div class="form-group">
            <label>Hobbies:</label>
            <input type="text" class="form-control" name="Hobbies" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="save">Save</button>
            <button type="reset" class="btn btn-warning" name="reset">Clear</button>
        </div>
    </form>
</div>
</body>
</html>