<?php
// Connexion à la base de données
$bdd = new SQLite3('db.db');

if (!$bdd) {
    die("Erreur de connexion à la base de données");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Création d'une table si elle n'existe pas déjà
    $bdd->exec('
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY,
            email INTEGER TEXT,
            password INTEGER TEXT
        )
    ');

    // Insertion de données
    $stmt = $bdd->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $stmt->bindParam(':password', $password, SQLITE3_TEXT);
    $stmt->execute();
    
    echo "Données insérées avec succès dans la base de données.";

    // Fermeture de la connexion à la base de données
    $bdd->close();
}
?>
