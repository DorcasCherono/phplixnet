<?php
include 'connectdb.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `personal` WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("Location: view.php");
    }
}