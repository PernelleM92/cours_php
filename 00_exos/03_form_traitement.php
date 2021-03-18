<?php require_once '../inc/functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
            <!-- ========================================= -->
            <!-- Navbar -->
            <!-- ========================================= -->
        <?php require("../inc/navigation.inc.php"); ?>

    <?php 
    if (!empty($_POST)){//si $_POST n'est pas vide c'est qu'il est remplie et donc le fomrulaire a été envoyeé, noter qu'en l'état on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alorsdes string vides. En effet on peut avoir des information non obligatoire dans un formulaire et les input ne seront pas remplie
        // jevardump($_POST);

    echo "<p>Prenom : <strong>" .$_POST['prenom']. "</strong><br>";
    echo "Nom : <strong>" .$_POST['nom']."</strong></p>";
    echo "Email : <strong>" .$_POST['email']."</strong></p>";
    echo "Adresse : <strong>" .$_POST['adresse']."</strong></p>";
    echo "Code Postal : <strong>" .$_POST['codepostal']."</strong></p>";
    echo "Ville : <strong>" .$_POST['ville']."</strong></p>";
     
    

    // On va écrire le contenu de la superglobale dans un fichier texte en l'absence de BDD
    $file = fopen('formulaire.txt', 'a'); //fopen() en mode "a" permet de créer un fichier s'il n'existe pas encore, sinon cela permet de l'ouvrir

    $donneeformulaire = $_POST['prenom']. " "  . $_POST['nom']. "//" . $_POST['email']. "//" . $_POST['adresse']. "// ".  $_POST['codepostal']. "//" . $_POST['ville']. '\n'; // \n

    fwrite ($file, $donneeformulaire);

}

    ?> 

  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>