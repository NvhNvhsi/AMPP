<?php
$servername = "ampp-mysql"; // Nom du container MySQL (adapté au projet AMPP)
$username = "myuser"; // Utilisateur MySQL (adapté au projet AMPP)
$password = "azerty"; // Mot de passe MySQL (adapté au projet AMPP)
$database = "mydatabase"; // Nom de la base de données MySQL (adapté au projet AMPP)

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

echo "Connexion à la base de données réussie.";

// Fermer la connexion
$conn->close();
?>

