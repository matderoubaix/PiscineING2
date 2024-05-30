<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $type = $_POST["sport"];
        $nom = $_POST["nomCour"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $heure = $_POST["heure"];
        $duree = $_POST["duree"];
        $prix = $_POST["prix"];
        $id = $_COOKIE["id"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sportify";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO `Cours` (`nom`, `description`, `date`, `heure`, `duree`, `prix`, `sport_id`, `prof_id`) 
        VALUES ('$nom', '$description', '$date', '$heure', '$duree', '$prix', '$type', '$id')";
        $conn->query($sql);
        header("Location: accueilcompte.php");
    }
?>