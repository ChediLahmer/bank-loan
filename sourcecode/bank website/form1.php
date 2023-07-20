<?php  
    $mysqli = require __DIR__ . "/database.php";
    // Construct the SQL query
    $sql = "INSERT INTO entreprise (nom_entreprise,address, ville, ca_annuel, raison_sociale, code_postal, telephone, benefice_net) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
    $stmt->bind_param("sssisisi",
                  $_POST["nom_entreprise"],
                  $_POST["address"],
                  $_POST["ville"],
                  $_POST["ca_annuel"],
                  $_POST["raison_sociale"],
                  $_POST["code_postal"],
                  $_POST["telephone"],
                  $_POST["benefice_net"]
                  
);
if ($stmt->execute()) {
    $_SESSION['message'] = 'Submitted Successfully';
} else {
    $_SESSION['error'] = 'An error occurred. Please try again.';
}
header('Location: projectp1.php');
$stmt->close();
$mysqli->close();
?>