<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Sportify</title>
    <link rel="stylesheet" href="../FichiersCss/style.css">
    <link rel="icon" href="../images/iconLogo.png"/>
</head>
<body>
    <nav>

        <img class="logo" src="../images/logoSportify.png" alt="Logo de Sportify">
        
        <div class="onglets">
            <div class="menu">
                <a href="../PageAccueil/index.html">ACCUEIL</a>
            </div>
            <div class="menu">
                <a href="../PageParcourir/parcourir.html">PARCOURIR</a>
            </div>
            <div class="menu">
                <a href="recherche.html">RECHERCHER</a>
            </div>
            <div class="menu">
                <a href="../PageRendez-vous/rendez-vous.html">RENDEZ-VOUS</a>
            </div>
            <div class="menu">
                <a href="../PageCompte/compte.html">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>

















<?php

$database = "sportify";
$hostname = "localhost";
$username = "root";
$password = "";

$db_handle = mysqli_connect($hostname, $username, $password);
$db_found = mysqli_select_db($db_handle, $database);

if (!$db_found) {
    echo "No connection";
}

$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";
$count = 0;
if ($recherche != ""){
    $sql = "SELECT * FROM cours WHERE nom LIKE '%$recherche%' OR 'description' LIKE '%$recherche%' OR CAST(`duree` AS CHAR) LIKE '%$recherche%' OR CAST(`date` AS CHAR) LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3>"."Les Cours correspondants :"."</h3>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo "<p>". $data['nom'] . "</p>"; 
            echo "<p>" . $data['date'] . "</p>";
            echo "<p>" . $data['duree'] . "h</p>";
            echo "<p>" . $data['description'] . "</p>"; 
            echo "<br><br>";
        }
    }
    $sql = "SELECT * FROM prof WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' OR ville LIKE '%$recherche%' OR CAST(`code_postal` AS CHAR) LIKE '%$recherche%' OR email LIKE '%$recherche%' OR telephone LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3>"."Les Coachs correspondants :"."</h3>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo "<p>". $data['nom'] . "</p>"; 
            echo "<p>" . $data['prenom'] . "</p>";
            echo "<p>" . $data['ville'] . "</p>";
            echo "<p>" . $data['code_postal'] . "</p>"; 
            echo "<p>" . $data['telephone'] . "</p>"; 
            echo "<p>" . $data['email'] . "</p>"; 
            echo "<br><br>";
        }
    }
    $sql = "SELECT * FROM salles WHERE nom LIKE '%$recherche%' OR adresse LIKE '%$recherche%' OR CAST(`capacite` AS CHAR) LIKE '%$recherche%' OR email LIKE '%$recherche%' OR telephone LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3>"."Les Salles correspondantes :"."</h3>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo "<p>". $data['nom'] . "</p>"; 
            echo "<p>" . $data['adresse'] . "</p>";
            echo "<p>" . $data['capacite'] . "</p>";
            echo "<p>" . $data['telephone'] . "</p>"; 
            echo "<p>" . $data['email'] . "</p>"; 
            echo "<br><br>";
        }
    }
    $sql = "SELECT * FROM `admin` WHERE nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' OR ville LIKE '%$recherche%' OR CAST(`code_postal` AS CHAR) LIKE '%$recherche%' OR email LIKE '%$recherche%' OR telephone LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3>"."Les Admins correspondants :"."</h3>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo "<p>". $data['nom'] . "</p>"; 
            echo "<p>" . $data['prenom'] . "</p>";
            echo "<p>" . $data['ville'] . "</p>";
            echo "<p>" . $data['code_postal'] . "</p>"; 
            echo "<p>" . $data['telephone'] . "</p>"; 
            echo "<p>" . $data['email'] . "</p>"; 
            echo "<br><br>";
        }
    }

    if($count == 0){
        echo"<h3>"."Aucun résultat correspondant :("."</h3>";
    }
}
else{echo"";}

?>






<footer>
        <div class="brand">
            <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
            <hr>
            <p>© Copyrights. All rights reserved. 2024 Sportify.com</p>
        </div>
        <div class="liens">
            <p class="titreclasse">Liens rapides</p>
            <ul>
                <li><a href="../PageAccueil/index.html">Accueil</a></li>
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="recherche.html">Rechercher</a></li>
                <li><a href="../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="../PageCompte/compte.html">Votre compte</a></li>
            </ul>
        </div>
        <div class="liens">
            <p class="titreclasse">Contacts</p>
            <ul>
                <li><a href="mailto:sportify@edu.ece.fr">Contactez nous : sportify@edu.ece.fr</a></li>
                <li><a href="tel:+33776691561">Appelez nous : +33776691561</a></li>
                <li><a href="https://maps.app.goo.gl/p6xMkrBTmMQZojXu7">Écrivez nous ou venez nous rencontrer : <address>10 rue Sextius Michel, 75015 Paris, FRANCE</address></a></li>
            </ul>

        </div>
    </footer>

</body>
</html>