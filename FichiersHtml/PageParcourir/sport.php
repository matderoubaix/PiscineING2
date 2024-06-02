<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcourir - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
</head>
<body>
    <nav>

        <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
        
        <div class="onglets">
            <div class="menu">
                <a href="../PageAccueil/index.php">ACCUEIL</a>
            </div>
            <div class="menu">
                <a href="parcourir.html">PARCOURIR</a>
            </div>
            <div class="menu">
                <a href="../PageRecherche/recherche.html">RECHERCHER</a>
            </div>

            <div class="menu">
                <a href="../PageCompte/compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>
    <div class="section2">
    <?php
        $access_key = 'O_K51UtYki-xLm0p2-mycOvC_4pY5I-hN1THZ7gpL8k';
    ?>
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

$sql = "SELECT * FROM sport WHERE compétition = FALSE";
$result = mysqli_query($db_handle, $sql);
if($result != false && mysqli_num_rows($result) != 0 ){
    echo "<h3 style='margin: 10px 5px 5px 5px;'>"."Nos Sports en loisir :"."</h3>";
    echo "<div class='boxParcourir'>";
    while ($data = mysqli_fetch_assoc($result)) { 
        if ($data['nom'] == "Cours Particulier") {
            $query = 'sportif';
        }
        else {
            $query = $data['nom'];
        }

        $url = "https://api.unsplash.com/search/photos?page=1&query=$query&client_id=$access_key";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result2 = curl_exec($ch);
        curl_close($ch);
        $data2 = json_decode($result2, true);
        $firstImageUrl = $data2['results'][0]['urls']['small'];
        echo " <div class='evenement_card'>
                    <div class='evenementDescription'>
                        <h2>". $data['nom']."</h2>"."<img src='$firstImageUrl' alt='image sport' width = 100% height = 200px>"." 
                        <p>Description : ". $data['description'] ."</p> 
                    </div>
                </div>"; 
    }
    echo "</div>";
}

?>

    </div>

    <footer>
        <div class="brand">
            <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
            <hr>
            <p>© Copyrights. All rights reserved. 2024 Sportify.com</p>
        </div>
        <div class="liens">
            <p class="titreclasse">Liens rapides</p>
            <ul>
                <li><a href="../PageAccueil/index.php">Accueil</a></li>
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="../PageRecherche/recherche.html">Rechercher</a></li>
                
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