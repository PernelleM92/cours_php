<?php require_once '../inc/functions.php';

$host = 'localhost';
$database = 'entreprise';
$user = 'root';
$psw = '';

$pdoENT = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw);
$pdoENT->exec("SET NAMES utf8");

if ( !empty($_POST)) {
    //pour se prémunir des failles nous faisons ceci
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);

    //$requete = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, NOW(), :salaire) " );
    //NOW() renvoie la date d'aujourd'hui

    $requete = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire) " );

    $requete->execute(array (
        ':prenom' => $_POST['prenom'],
        ':nom' => $_POST['nom'],
        ':sexe' => $_POST['sexe'],
        ':service' => $_POST['service'],
        ':date_embauche' => $_POST['date_embauche'],
        ':salaire' => $_POST['salaire'],
    ));
}//fin if !empty

?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel="stylesheet">  
    
    <link rel="stylesheet" href="../css/style.css">

    <title>Cours PHP 7 - Entreprise et employés</title>

  </head>
  <body class="bg-dark">
  <div class="container-fluid p-0 m-0">
        <!-- ========================================= -->
        <!-- Navbar -->
        <!-- ========================================= -->
        <?php require("../inc/navigation.inc.php"); ?>
        
    </div><!-- fin du container fluid -->

    <!-- ========================================= -->
    <!-- Contenu principal -->
    <!-- ========================================= -->

    <div class="container bg-white p-5">
        <div class="row jumbotron bg-light">
            <div class="col-sm-12">
                <h1 class="text-center">Cours PHP 7 - Entreprise et employés</h1>
                <p class="lead text-center mt-4"></p>
            </div>
        </div><!-- fin row -->
        <!-- fin du jumbotron -->

        <hr>

        <div class="row bg-light mt-4">

            <div class="col-sm-12">
                <h2><span>I.</span> Tableau des employés</h2>
                <?php 
                    $requete = $pdoENT->query("SELECT * FROM employes ORDER BY prenom");
    
                    $nbr_employes = $requete->rowCount();

                    echo "<p>Il y a " .$nbr_employes. " employés dans la base.</p>";

                    echo "<table class=\"table table-dark table-striped\">";
                    echo "<thead><tr><th scope=\"col\">ID</th><th scope=\"col\">Prénom</th><th scope=\"col\">Nom</th><th scope=\"col\">Sexe</th><th scope=\"col\">Service</th><th scope=\"col\">Date d'embauche</th><th scope=\"col\">Salaire</th></tr></thead>";
                    while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td>#". $ligne['id_employes']. "</td>";   
                        echo "<td>";
                        if($ligne['sexe'] == 'f') {
                            echo "Mme ";
                        }else {
                            echo "M. ";
                        }
                        echo $ligne['prenom']. "</td>";
                        echo "<td>". $ligne['nom']. "</td>";
                        echo "<td>". $ligne['sexe']. "</td>";
                        echo "<td>". $ligne['service']. "</td>";
                        echo "<td>".date('d/m/Y', strtotime($ligne['date_embauche'])). "</td>";
                        echo "<td>".number_format($ligne['salaire'], 2, ',', ' '). " €</td>";
                        echo "<td><a href=\"02_fiche_employe.php?id_employes=".$ligne['id_employes']."\">Voir sa fiche</a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                ?> 
               
            </div><!-- fin col -->

            <div class="col-sm-12">
                <h2><span>II.</span> Formulaire</h2>

                <form action="" method="POST" class="w-50">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select id="sexe" class="form-control" name="sexe">
                            <option selected>Votre sexe</option>
                            <option>f</option>
                            <option>m</option>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="service">Service</label>
                        <select id="service" class="form-control" name="service">
                            <option selected>Sélectionnez le service</option>
                            <option>assistant</option>
                            <option>commercial</option>
                            <option>comptabilite</option>
                            <option>communication</option>
                            <option>direction</option>
                            <option>informatique</option>
                            <option>juridique</option>
                            <option>production</option>
                            <option>secretariat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date_embauche">Date d'embauche</label>
                        <input type="date" class="form-control" name="date_embauche" id="date_embauche" value="">
                    </div>

                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="number" cols="30" rows="5" class="form-control" id="salaire" name="salaire" value="" required>
                    </div>

                    <button type="submit" class="btn btn-small btn-info">Envoyer</button>
                </form>
            </div><!-- fin col -->

        </div><!-- fin row -->

        


    </div> <!-- fin du container -->

    <?php require("../inc/footer.inc.php"); ?>

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
