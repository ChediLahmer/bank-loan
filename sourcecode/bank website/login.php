<?php
if (empty($_POST['email']) || empty($_POST['password'])) {
    header("Location: index.php");
    exit;
}

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require('./database.php');
    $email = $mysqli->real_escape_string($_POST["email"]);
    $sql = sprintf("SELECT * FROM user WHERE email='%s'", $email);

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_t"]=$user["type"];
            $_SESSION["user_name"] = $user["name"]; 
            $_SESSION["user_email"]=$user["email"];
            header("Location: request.php");
            exit;
        } else {
            $is_invalid = true;
        }
    } else {
        $is_invalid = true;
    }
}

if ($is_invalid) {
    session_start();
    $_SESSION['error'] = 'Invalid credentials. Please try again.';
    header("Location: index.php");
    exit;
}
?>