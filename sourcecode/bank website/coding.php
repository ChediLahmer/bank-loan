<?php
if (isset($_POST['c_btn'])) {
    $id = $_POST['ID'];
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'login_db');
    $category = $_SESSION['category'];

    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    $sql = "UPDATE `$category` SET cin=?, nom=?, prenom=?, adresse=?, `code-postal`=?, ville=?, numerotel=?, date_de_demande=? 
    , type_de_credit=? , mtndemande=? , typeres=? , mtnannuel=? WHERE id=?";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $stmt->error);
    }

    $stmt->bind_param(
        "sssssssssisii",
        $_POST["cin"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["adresse"],
        $_POST["code-postal"],
        $_POST["ville"],
        $_POST["numerotel"],
        date("Y-m-d", strtotime($_POST["date_de_demande"])),
        $_POST["type_de_credit"],
        $_POST["mtndemande"],
        $_POST["typeres"],
        $_POST["mtnannuel"],
        $id
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Updated Successfully';
    } else {
        $_SESSION['error'] = 'An error occurred. Please try again.';
    }

    $stmt->close();
    $mysqli->close();
    header("Location: search.php");
    exit;
}
?>