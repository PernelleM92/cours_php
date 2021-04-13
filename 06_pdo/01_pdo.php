<?php require_once '../inc/functions.php'; ?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - PDO</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php require '../inc/navigation.inc.php'; ?>
    <!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 - PDO ( PHP DATA OBJECT)</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à un BDD</p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12">
            <h2>1-Connexion à la BDD</h2>
            <p><abbr title="PHP data object">PDO</abbr> est l'accronyme de PHP Data Object</p>
            <?php 
            $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise',// On a en premier lieu le driver mysql (IBM, ORACLE, ODBC...) le nom du serveur, le nom de la BDD. 
            'root',//L'utilisateur pour le BDD
            '',// si vous ête sur mac il y a un mot de passe = 'root'
            array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Cette ligne sert à afficher les erreurs sur le navigateurs 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Cette ligne sert a définir le charset des échanges avec la BDD
            ));

            //Gabarit pour la soutenance
            //Connextion PISOLA
            // $host='localhost';
            // $database='entreprise';
            // $user='root';
            // $psw='';

            // $pdoENT = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw);
            // $pdoENT ->exec("SET NAMES utf8");

            jevardump($pdoENT); // L'objet est vide car il n'y a pas de propriétés
            jevardump( get_class_methods($pdoENT));// permet d'afficher la liste des méthodes présentes dans la l'objet PDO
                
            ?> 
                
                
            </div>
            <!-- fin col -->
            <div class="col-sm-12">
            <h2>2-Faire des requêtes avec exec()</h2>
            <p>La méthode exec() est utilisée pour faire des requêtes qui ne retourne pas de résultats: INSERT, UPDATE, DELETE</p>
            <p>Valeur de retours : <br>
            Succès : dans le jevardump de $requete on aura le nombre de lignes affectées par la requête, 3 delete = integer(3) query() retourne un nouvel objet quiui provient avec la classe PDOstatement<br>
            Echec : false = 0</p>
            <?php 
            //On va isérer un employé dans la BDD
            //Requêye sql d'insertion de la bdd et dans la table employés //INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)

            // $requête = $pdoENT->exec(  "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)" )

            // $requete =  $pdoENT->exec( "DELETE FROM employes WHERE prenom = 'Jean' AND nom='Bon'" );
            //  jevardump($requete)
            // echo "Dernier id générée en BDD: " .$pdoENT->LastInsertId();
             ?> 
            </div> <!--fin de col-->

            <div class="col-sm-12">
            <h2>3- Faire des requêtes avec <code>query()</code></h2>
            <p><code>query()</code> est utilisé pour faire des requêtes qui retournent un ou plusieurs résultats : SELECT, mais aussi DELETE, UPDATE et INSERT, query() retourne un nouvel objet quiui provient avec la classe PDOstatement 
            <br>
            ECHEC : false</p>
            <ul>
                <li>Pour information, on peut mettre dans les paramètres() de fetch()</li>
                <li>PDO::FETCH_NUM : pour obtenir un tableau aux indices numériques</li>
                <li>PDO::FETCH_OBJ : pour obtenir un dernier objet</li>
                <li>Ou encore des parenthèse vide pour obtenir un mélange de tableaux associatifs et numériques</li>
            </ul>
            <?php
            //1 - On demande des informtions a la BDD car il y a un ou plusieurs résultats avec query() 
            $requete = $pdoENT->query ( "SELECT * FROM employes WHERE id_employes = '417' ");
            jevardump($requete);
            //2 - Dans cet objet $requete nous ne voyons pas encore les données conernant amandine Pourtant emlle s'y trouve Pour accéder, nous devons utiliser une méthode de $requete qui s'appelle fetch()          
        
            $ligne = $requete->fetch( PDO::FETCH_ASSOC); 
            jevardump($ligne);
            //3 - Avec cette méthode fetch() on transfome l'objet de $requete
            //4 - fetch(), avec le paremètre PDO::FETCH_ASSOC permet de transformer l'objet $requete et un array associatif appelé ici $ligne : on y trouve le nom des champs de la requête SQL


            echo "<p>Son nom est : " .$ligne['prenom']. " " .$ligne['nom'].", a été embauché le : ".$ligne['date_embauche']. " et travaille dans le service :  " .$ligne['service']."</p>";

            //exo: Afficher le service de l'employé dont l'id est 417 et son nom et son prénom
            ?> 

            </div> <!-- fin de col -->

            <div class="col-sm-12">
                <h2>04 - Faire des requête avec <code>query()</code> et afficher plusieurs résultats</h2>

                <?php 
                
                $requete = $pdoENT->query ( "SELECT * FROM employes");
                jevardump($requete);

                // $ligne = $requete->fetch( PDO::FETCH_ASSOC); 
                // jevardump($ligne); //Fetch ne peux pas tout récupérer

                $nbr_employes = $requete->rowCount();// cette méthode rowCount() permet de compter le nbr de rangées (d'enregistrements) retournés par la requête
                jevardump($nbr_employes);

                echo "Il y a " .$nbr_employes. " employés dans la base.";
                //Comme nous avons plusieurs résultats dans $requete, nous devons faire une boucle

                while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC)) {
                    echo "<p>Son nom est : " .$ligne['prenom']. " " .$ligne['nom'].", a été embauché le : ".$ligne['date_embauche']. " et travaille dans le service :  " .$ligne['service']."</p>";
                };

                $requete = $pdoENT->query("SELECT DISTINCT(service) FROM employes");
                $nbr_services = $requete->rowCount();

                echo "Il y a " .$nbr_services. " services dans la société.";
                echo "<ul>";
                while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC)){
                    echo "<li>" .$ligne['service']. "</li>";
                }
                echo "</ul>";
                ?>

            </div> <!-- fin de col -->


            <div class="col-sm-12">

            <?php

            // Exo 1 : dans un h2 compter le nbre d'employés
            // 2 / puis afficher toutes les information des employés dans un tableau html

            $requete = $pdoENT->query ( "SELECT * FROM employes");
            jevardump($requete);

            $nbr_employes = $requete->rowCount();
            echo "<h2>Il y a " .$nbr_employes. " employés dans la société. </h2>";

            // while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC)) {
            //     echo "<p>Son nom est : " .$ligne['prenom']. " " .$ligne['nom'].", a été embauché le : ".$ligne['date_embauche']. " et travaille dans le service :  " .$ligne['service']."</p>";
            // };

            echo "<table class=\"table\">";
            echo "<thead><tr><th></th></tr></thead>";
            while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>". $ligne['id_employes']. "</td>";
                echo "<td>". $ligne['prenom']. "</td>";
                echo "<td>". $ligne['nom']. "</td>";
                echo "<td>". $ligne['sexe']. "</td>";
                echo "<td>". $ligne['service']. "</td>";
                echo "<td>". $ligne['date_embauche']. "</td>";
                echo "<td>". $ligne['salaire']. "</td>";
                echo"</tr>";
            };
            echo "</table>";

            //requête préparées sans bindparam
            $resultat = $pdoENT ->prepare("SELECT * FROM employes WHERE prenom = :prenom ANd nom = :nom");//préparation de la requête
            $resultat->execute(array(
                ':nom' => 'Thoyer',
                ':prenom' =>'Amandine'// on peut se passer de bindParam

            ));
            jevardump($resultat);
            $employe = $resultat->fetch(PDO::FETCH_ASSOC);
            jevardump($employe);

            echo $employe['prenom']. " " .$employe['nom']. " est au service " .$employe['service']; // on affiche les infos







            ?> 
            

            </div> <!-- fin de col 


 -->
            <div class="col-sm-12">

            <?php
            ?>

            </div>
       </div> <!-- fin row -->


    </main>
    <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
