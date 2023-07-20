<?php

if (isset($_POST['edit_btn'])) {
    $id = $_POST['ID'];
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'login_db');
    $category = $_SESSION['category'];

    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    $sql = "UPDATE `$category` SET nom_entreprise=?, address=?, ville=?, ca_annuel=?, raison_sociale=?, code_postal=?, telephone=?, benefice_net=? WHERE id=?";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $stmt->error);
    }

    $stmt->bind_param(
        "sssisisii",
        $_POST["nom_entreprise"],
        $_POST["address"],
        $_POST["ville"],
        $_POST["ca_annuel"],
        $_POST["raison_sociale"],
        $_POST["code_postal"],
        $_POST["telephone"],
        $_POST["benefice_net"],
        $id
    );

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Updated Successfully';
        $stmt->close();
        $mysqli->close();
        header("Location: search.php");
    exit;
    } else {
        $_SESSION['error'] = 'An error occurred. Please try again.';
    }


}
?>




