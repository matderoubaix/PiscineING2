<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
</head>
<body>
    <nav>

        <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
        
        <div class="onglets">
            <div class="menu">
                <a href="../PageAccueil/index.html">ACCUEIL</a>
            </div>
            <div class="menu">
                <a href="../PageParcourir/parcourir.html">PARCOURIR</a>
            </div>
            <div class="menu">
                <a href="../PageRecherche/recherche.html">RECHERCHER</a>
            </div>
            <div class="menu">
                <a href="../PageRendez-vous/rendez-vous.html">RENDEZ-VOUS</a>
            </div>
            <div class="menu">
                <a href="../PageCompte/compte.html">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>


    

    

    
    <div class="currentChat">
        <div class="hautDePage">
            <div><a style="text-decoration: none; color:black; font-size: 0.7 rem;" href="../PageCompte/messages.php">Retour</a></div>
            <div style="display :flex; flex-direction: row;">
    <?php

        $database = "sportify";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prof_id = $_POST['prof_id'];
            $sql = "SELECT * FROM prof WHERE id = $prof_id";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            $prof_nom = $data['nom'];
            $prof_prenom = $data['prenom'];
            $prof_photo = $data['photo'];
            echo '<img style="width: 50px ; height:50px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius:50%;" src="../../images/coach.jpg" alt="Photo coach">';
            echo '<h1 style="margin: 2%;">'.$prof_prenom.' '.$prof_nom.'</h1>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "No professor selected.";
        }



        echo '<div class="fenetreChat">';






      

        $utilisateur_id = "1";


        if ($db_found) {
            $sql = "SELECT * FROM chat WHERE chat.client_id = $utilisateur_id AND chat.prof_id = $prof_id";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) {

                if ($data['id_emetteur'] == $utilisateur_id) {
                    echo '<div class="messageUtilisateur">';
                    echo '<div class="messageCore">';
                    echo '<p>'.$data['message'].'</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="messageDestinataire">';
                    echo '<div class="messageCore">';
                    echo '<p>'.$data['message'].'</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
        
        else {
            echo "Database not found";
        }

        //fermer la connection
        mysqli_close($db_handle);
    ?>


        </div>
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
                <li><a href="index.html">Accueil</a></li>
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="../PageRecherche/recherche.html">Rechercher</a></li>
                <li><a href="../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="../PageCompte/compte.html">Votre compte</a></li>
            </ul>
        </div>
        <div class="liens">
            <p class="titreclasse">Contacts</p>
            <ul>
                <li><a href="mailto:sportify@edu.ece.fr">Contactez nous : sportify@edu.ece.fr</a></li>
                <li><a href="tel:+33776691561">Appelez nous : +33776691561</a></li>
                <li><a href="https://maps.app.goo.gl/p6xMkrBTmMQZojXu7">Écrivez nous ou venez nous rencontrer : <address>10 rue Sextius Michel, 75015 Paris, FRANCE</address<</a></li>
            </ul>

        </div>
    </footer>
</body>
</html>