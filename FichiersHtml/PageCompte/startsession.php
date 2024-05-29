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
        session_start();
        $_SESSION["email"] = $email;
        header("Location: accueilcompte.php");
        exit();
    } else {
        header("Location: compte.php");
        exit();
    }
    $conn->close();
}
?>