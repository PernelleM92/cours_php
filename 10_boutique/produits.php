<?php require_once 'inc/init.php'; ?> 

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - Produits</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body><?php require '../inc/navigation.inc.php'; ?>
<!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 - Produits Boutique</h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12 ">
            <?php 
            $requete = $pdoSITE->query("SELECT * FROM produit ORDER BY public");
    
           

            echo "<table class=\"table table-dark table-striped\">";
            echo "<thead><tr><th scope=\"col\">Produit</th><th scope=\"col\">Référence</th><th scope=\"col\">Catégorie</th><th scope=\"col\">Titre</th><th scope=\"col\">Couleur</th><th scope=\"col\">Taille</th><th scope=\"col\">Public</th><th scope=\"col\">Prix</th><th scope=\"col\">Fiche</th></tr></thead>";
            while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                echo "<td><img class=\"img-fluid\" src=\"{$ligne['photo']}\"></td>";
                echo "<td>".$ligne['reference']. "</td>";
                echo "<td>".$ligne['categorie']. "</td>";
                echo "<td>".$ligne['titre']. "</td>";
                echo "<td>".$ligne['couleur']. "</td>";
                echo "<td>".$ligne['taille']. "</td>";
                echo "<td>".$ligne['public']. "</td>";
                echo "<td>".$ligne['prix']. "</td>";
                echo "<td><a href=\"fiche_produit.php?id_produit=".$ligne['id_produit']."\">Voir sa fiche</a></td>";
                echo "</tr>";
            }

            echo "</table>";








            
            ?> 
                
                
            </div>
            <!-- fin col -->
            <div class="col-sm-12 col-md-6">
            
            </div> <!--fin de col-->
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
