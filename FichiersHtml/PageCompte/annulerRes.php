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
        session_start();
        $id_cours = $_SESSION["id_cour"];
        $id = $_COOKIE['id'];
        echo $id_cours;
        echo $id;
        $sql = "DELETE FROM reservation WHERE client_id = '$id' AND cours_id = '$id_cours'";
        session_destroy();
        $result = $conn->query($sql);
    header("Location: compte.php");
?>