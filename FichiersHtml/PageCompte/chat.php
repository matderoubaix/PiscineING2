<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nom_de_votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

// Récupérer les messages de la table "messages"
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les messages
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["message"] . "</p>";
    }
} else {
    echo "Aucun message trouvé.";
}

$conn->close();
?>