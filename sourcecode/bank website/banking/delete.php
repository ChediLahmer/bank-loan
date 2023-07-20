<?php
include 'connect.php';
$category = $_GET['category'];
$row_id = $_GET['row_id'];


if (isset($_POST['delete'])) {
    $row_id = $_POST['row_id'];

    // Assuming $con is the database connection variable
    $sql = "DELETE FROM `$category` WHERE id='$row_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('Location: search.php');
    } else {
        echo "Error deleting row: " . mysqli_error($con);
    }
}
?>
