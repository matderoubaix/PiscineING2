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

    <?php

        $database = "sportify";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $utilisateur_id = "1";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['prof_id'])){
                $prof_id = $_POST['prof_id'];
            }
            else {
                echo "No professor selected.";
                exit();
            }
            if (isset($_POST['message'])){
                $message = $_POST['message'];
                $sql_insert = "INSERT INTO chat (client_id, prof_id, message, id_emetteur) VALUES ('$utilisateur_id', '$prof_id', '$message', '$utilisateur_id')";
                mysqli_query($db_handle, $sql_insert);
            }


        } else {
            echo "Invalid request method.";
            exit();
        }

        // Retrieve professor information
        $sql = "SELECT * FROM prof WHERE id = $prof_id";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $prof_nom = $data['nom'];
        $prof_prenom = $data['prenom'];
        $prof_photo = $data['photo'];

        echo '<div class="hautDePage">';
        echo '<div><a style="text-decoration: none; color:black; font-size: 0.7 rem;" href="../PageCompte/messages.php">Retour</a></div>';
        echo '<div style="display :flex; flex-direction: row; margin-bottom: 10px;">';
        echo '<img style="width: 50px ; height:50px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius:50%;" src="../../images/coach.jpg" alt="Photo coach">';
        echo '<h1 style="margin: 2%;">'.$prof_prenom.' '.$prof_nom.'</h1>';
        echo '</div>';
        echo '</div>';

        echo '<div class="fenetreChat">';

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
        } else {
            echo "Database not found";
        }

        echo '</div>';

        // Close the database connection
        mysqli_close($db_handle);
?>

<form method="POST" class="chatInput" action="../PageCompte/chat.php">
    <input type="hidden" name="prof_id" value="<?php echo $prof_id; ?>">
    <input type="text" id="messageInput" placeholder="Envoyer un message" name="message" required>
    <button id="sendMessageButton">↗</button>
</form>





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

    <script>
        document.querySelector('.chatInput').addEventListener('submit', function() {
            var chatWindow = document.querySelector('.fenetreChat');
            chatWindow.scrollDown = chatWindow.scrollHeight;
        });
    </script>


















</body>
</html>