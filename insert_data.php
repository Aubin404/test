<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Exécute le script Python avec les informations en tant qu'arguments
    $output = shell_exec("python db.py \"$password\" \"$email\"");
    
    echo $output;
}
?>
