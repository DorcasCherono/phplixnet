<?php


include 'connectdb.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `personal` WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $result = mysqli_fetch_assoc($query);
        } else {
            header("Location: view.php");
            exit;
        }
    }
} else {
    header("Location: view.php");
    exit;
}

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

    $sql = "UPDATE `personal` SET `name`='$name',`phone`='$phone',`email`='$email',`personalinfo`='$comments',`qualifications`='$qualifications',`hobbies`='$hobbies' WHERE id='$id'";

    $query = mysqli_query($con, $sql);
    if ($query) {
        header("Location: view.php");
        exit;
    }

}

?>
<div class="container">
    <form class="" method="POST" action="">
        <label><h1>Personal details</h1></label>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="Name" value="<?php echo $result['name']; ?>" required>

        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" class="form-control" name="Phone" value="<?php echo $result['phone']; ?>" required>

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="Email" value="<?php echo $result['email']; ?>" required>

        </div>

        <div class="form-group">
            <label>Personal Info:</label>
            <textarea rows="4" cols="40" class="form-control" name="Personalinfo" required>
                <?php echo $result['personalinfo']; ?>
            </textarea>


        </div>
        <div class="form-group">
            <label>Qualifications:</label>
            <input type="text" class="form-control" name="Qualifications"
                   value="<?php echo $result['qualifications']; ?>" required>
        </div>
        <div class="form-group">
            <label>Hobbies:</label>
            <input type="text" class="form-control" name="Hobbies" value="<?php echo $result['hobbies']; ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="save">Save</button>
            <button type="reset" class="btn btn-warning" name="reset">Clear</button>
        </div>
    </form>
</div>
</body>
</html>