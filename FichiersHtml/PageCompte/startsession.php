<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from the form
    $email = $_POST["userId"];
    $mdp = $_POST["passwd"];
    // TODO: Implement your login verification logic here
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
    $sql = "SELECT * FROM client WHERE email = '$email' AND mdp = '$mdp'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        setcookie("email", $email, time() + 3600);
        $row = $result->fetch_assoc();
        $type = $row["typeCompte"];
        setcookie("id", $row["id"], time() + 3600);
        echo $row["id"];
        setcookie("type", $type, time() + 3600);
        setcookie("nom", $row["nom"], time() + 3600);
        setcookie("prenom", $row["prenom"], time() + 3600);
        setcookie("ville", $row["ville"], time() + 3600);
        setcookie("code_postal", $row["code_postal"], time() + 3600);
        setcookie("telephone", $row["telephone"], time() + 3600);
        setcookie("carte_etudiant", $row["carte_etudiant"], time() + 3600);
        setcookie("photo", $row["photo"], time() + 3600);
        header("Location: accueilcompte.php");
        exit();
    } else {
        header("Location: compte.php");
        exit();
    }
    $conn->close();
}
?>