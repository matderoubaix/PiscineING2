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
                <a href="../FichiersHtml/PageAccueil/index.php">ACCUEIL</a>
            </div>
            <div class="menu">
                <a href="../FichiersHtml/PageParcourir/parcourir.html">PARCOURIR</a>
            </div>
            <div class="menu">
                <a href="../FichiersHtml/PageRecherche/recherche.html">RECHERCHER</a>
            </div>
            <div class="menu">
                <a href="../FichiersHtml/PageRendez-vous/rendez-vous.html">RENDEZ-VOUS</a>
            </div>
            <div class="menu">
                <a href="../FichiersHtml/PageCompte/compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>

    <div class="boxRecherche">

        <form method="POST" class="searchBox" action="recherche.php">
            <input autofocus type="text" placeholder="Chercher un cours, un coach..." name="recherche" required>
            <button> &#x1F50E;&#xFE0E;</button>
        </form>
        <div class="resultats">

    


<?php

$database = "sportify";
$hostname = "localhost";
$username = "root";
$password = "";
$testID = 0;

$db_handle = mysqli_connect($hostname, $username, $password);
$db_found = mysqli_select_db($db_handle, $database);


if (!$db_found) {
    echo "No connection";
}

if (isset($_COOKIE['id'])){
    $testID = $_COOKIE['id'];
}

$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";
$count = 0;
if ($recherche != ""){

    /* Cours */
    $sql = "SELECT * FROM cours WHERE nom LIKE '%$recherche%' OR 'description' LIKE '%$recherche%' OR CAST(`duree` AS CHAR) LIKE '%$recherche%' OR CAST(`date` AS CHAR) LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3 style='margin: 10px 5px 5px 5px;'>"."Les Cours correspondants :"."</h3>";
        echo "<div class='boxCours'>";

        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) {
            $prof_id = $data['prof_id'];
            $sql_prof = "SELECT nom, prenom FROM client WHERE typeCompte = 'prof' AND id = $prof_id";
            $result_prof = mysqli_query($db_handle, $sql_prof);
            if($result_prof != false && mysqli_num_rows($result_prof) != 0 ){
                $prof_data = mysqli_fetch_assoc($result_prof);
                $prof_nom = $prof_data['nom'];
                $prof_prenom = $prof_data['prenom'];
                $sport_id = $data['sport_id'];
            }
            echo " <div class='evenement'>
                        <div class='evenementDescription'>
                            
                            <h2>". $data['nom'] ."</h2>
                            <p>Le <b>". $data['date'] ."</b> pendant <b>" . $data['duree'] . "h </b></p>
                            <p>Animé par : <b>". $prof_prenom ." ". $prof_nom ."</b></p>
                            
                            
                        </div>
                    </div>"; 
        }
        echo "</div>";
    }


    /* Coachs */
    $sql = "SELECT * FROM client WHERE typeCompte = 'prof' AND (nom LIKE '%$recherche%' OR prenom LIKE '%$recherche%' OR ville LIKE '%$recherche%' OR CAST(`code_postal` AS CHAR) LIKE '%$recherche%' OR email LIKE '%$recherche%' OR telephone LIKE '%$recherche%')";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3 style='margin: 10px 5px 5px 5px;'>"."Les Coachs correspondants :"."</h3>";
        echo "<div class='boxCours'>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo " <div class='searchResult'>
                        <div class='evenementDescription'>
                            <img style='width: 50px ; height:50px; border-radius:50%;' src='../photo/". $data['photo'] ."' alt='Photo du coach'>
                            <h2>". $data['nom']." ". $data['prenom'] ."</h2>
                            <p>".$data['ville']."</p>
                            <p>Téléphone : ". $data['telephone'] ."</p>
                            <p>Mail : " . $data['email'] ."</p>";
                            
                            if ($testID != 0){

                                echo "<div class=\"boutonsCoach\">";
        
        
                                echo "<form method=\"POST\" action=\"../FichiersHtml/PageCompte/chat.php\">
                                        <input type=\"hidden\" name=\"prof_id\" value=\"".$data["id"]."\">
                                        <button type='submit'>
                                            Discuter
                                        </button>
                                    </form>";
        
                                echo "<form method=\"POST\" action=\"../FichiersHtml/PageRendez-vous/rendezvous.php\">
                                        <input type=\"hidden\" name=\"prof_id\" value=\"".$data["id"]."\">
                                        <button type='submit'>
                                            Prendre rendez-vous
                                        </button>
                                    </form>";

                                echo "<form class='cvRecherche' method=\"POST\" action=\"../FichiersHtml/PageAccueil/cv.php\">
                                        <input type=\"hidden\" name=\"resume\" value=\"resume.xml\">
                                        <button type='submit'>&#128462;</button>
                                    </form>";
                                
                                echo "</div>";
        
                                }
                            
                        echo"</div>".
                    "</div>"; 
        }
        echo "</div>";
    }

    /* Salles */
    $sql = "SELECT * FROM salles WHERE nom LIKE '%$recherche%' OR adresse LIKE '%$recherche%' OR CAST(`capacite` AS CHAR) LIKE '%$recherche%' OR email LIKE '%$recherche%' OR telephone LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3 style='margin: 10px 5px 5px 5px;'>"."Les Salles correspondantes :"."</h3>";
        echo "<div class='boxCours'>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo " <div class='evenement'>
                        <div class='evenementDescription'>
                            <h2>". $data['nom']."</h2>
                            <p>".$data['adresse']."</p>
                            <p>Capacité : ". $data['capacite'] ."</p>
                            <p>Téléphone : ". $data['telephone'] ."</p>
                            <p>Mail : " . $data['email'] ."</p>
                            
                            
                        </div>
                    </div>"; 
        }
        echo "</div>";

    }


    /* Sports */
    $sql = "SELECT * FROM sport WHERE nom LIKE '%$recherche%' OR description LIKE '%$recherche%'";
    $result = mysqli_query($db_handle, $sql);
    if($result != false && mysqli_num_rows($result) != 0 ){
        echo "<h3 style='margin: 10px 5px 5px 5px;'>"."Les Sports correspondants :"."</h3>";
        echo "<div class='boxCours'>";
        $count += 1;
        while ($data = mysqli_fetch_assoc($result)) { 
            echo " <div class='evenement'>
                        <div class='evenementDescription'>
                            <h2>". $data['nom']."</h2>
                            <p>".$data['description']."</p>
                        </div>
                    </div>"; 
        }
        echo "</div>";
    }

    if($count == 0){
        echo"<h3>"."Aucun résultat correspondant :("."</h3>";
    }
}
else{echo"";}

?>

</div>

</div> 






<footer>
        <div class="brand">
            <img class="logo" src="../images/logoSportify.png" alt="Logo de Sportify">
            <hr>
            <p>© Copyrights. All rights reserved. 2024 Sportify.com</p>
        </div>
        <div class="liens">
            <p class="titreclasse">Liens rapides</p>
            <ul>
                <li><a href="../PageAccueil/index.php">Accueil</a></li>
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="recherche.html">Rechercher</a></li>
                <li><a href="../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="../PageCompte/compte.php">Votre compte</a></li>
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