<?php
    $servername = "localhost";
    $username= "root";
    $password= "";
    $dbname = "sportify";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $type_de_paiement = $_POST["type"];
        $numero_de_carte = $_POST["numero"];
        $date_expiration = $_POST["date"];
        $id = $_COOKIE['id'];
        $sql = "INSERT INTO `coordonnéeBancaire` (`type_de_paiement`,`numero_de_carte`, `date_expiration`,`client_id`) VALUES ( '$type_de_paiement', '$numero_de_carte', '$date_expiration','$id')";
        $result = $conn->query($sql);
    }
    header("Location: reservation.php");
?>