<?php  
    $mysqli = require __DIR__ . "/database.php";
    
    // Construct the SQL query
    $sql = "INSERT INTO individuel (cin, nom, prenom, adresse, `code-postal`, ville, numerotel, date_de_demande, type_de_credit, mtndemande, typeres, mtnannuel)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $mysqli->stmt_init();
    
    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    
    $stmt->bind_param("sssssssssisi",
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
        $_POST["mtnannuel"]
    );
    if ($stmt->execute()) {
        session_start();
        $_SESSION['message'] = 'Submitted Successfully';
    } else {
        session_start();
        $_SESSION['error'] = 'An error occurred. Please try again.';
    }
    
    $stmt->close();
    $mysqli->close();
    
    header('Location: projectp2.php');
    exit();
?>
