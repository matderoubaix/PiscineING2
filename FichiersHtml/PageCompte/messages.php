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


    

    <div class="conversations">
        <h1 class="vosMessages">Vos messages</h1>
        <form method="POST" action="../PageCompte/chat.php">
            <input type="hidden" name="prof_id" value="1">
            <div class="dm" onclick="this.parentNode.submit();">
                <img src="../../images/coach.jpg" alt="Photo coach">
                <p>Jean-Pierre Segado</p>
            </div>
        </form>

    


    <?php
      
        $database = "sportify";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $utilisateur_id = "1";


        //si le BDD existe, faire le traitement
        if ($db_found) {
            $sql = "SELECT DISTINCT prof.id, prof.nom, prof.prenom, prof.photo FROM prof, chat  WHERE chat.client_id = $utilisateur_id AND chat.prof_id = prof.id";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                echo '<form method="POST" action="../PageCompte/chat.php">
                        <input type="hidden" name="prof_id" value="'.$data['id'].'">
                        <div class="dm" onclick="this.parentNode.submit();">
                            <img src="'.$data['photo'].'" alt="Photo coach">
                            <p>'.$data['prenom'].' '.$data['nom'].'</p>
                        </div>
                      </form>';
            }
            
        }
        
        else {
            echo "Database not found";
        }

        //fermer la connection
        mysqli_close($db_handle);
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