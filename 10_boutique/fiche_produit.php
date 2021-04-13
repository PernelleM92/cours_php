<?php require_once 'inc/init.php'; ?> 
<?php 
if ( isset( $_GET[ 'id_produit' ] ) ) { 
    $resultat = $pdoSITE->prepare( " SELECT * FROM produit WHERE id_produit = :id_produit");
    $resultat->execute(array(
        ':id_produit' => $_GET['id_produit']
    ));
    if ( $resultat->rowCOUNT() == 0 ){
        header( 'location:produits.php');
        exit();
    }
    $ligne = $resultat->fetch( PDO::FETCH_ASSOC);
}else {
    header( 'location:produits.php');
    exit();
}

?> 
?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - Fiche Produit</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body><?php require '../inc/navigation.inc.php'; ?>
<!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 -Fiche Produiut </h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4 text-center mx-auto">
        <div class="row">
            <div class="col-sm-12">
            <div class="card text-center m-auto bg-info" style="width: 18rem;">
                    <ul class="list-group list-group-flush mb-4 ">
                    <li class="list-group-item">
                        <?php 
                        echo $ligne['titre'];
                        ?> 
                        </li>
                        <li class="list-group-item">
                        <?php
                         echo "<img class=\"img-fluid\" src=\"{$ligne['photo']}\">";
                        ?> 
                        </li>
                        <li class="list-group-item">
                        <?php 
                        echo "Description : ".$ligne['description'];
                        ?> 
                        </li>
                        <li class="list-group-item">
                        <?php 
                        echo "Prix : ".$ligne['prix']. " €";
                        ?> 
                        </li>
                        <li class="list-group-item">
                        <?php 
                        echo "Stock : ".$ligne['stock'];
                        ?> 
                        </li>
                    </ul>
                    </div>
                    <button type="button"class="btn p-4 btn-warning"><a href="produits.php">Retour</a></button>
                    <button type="button" class="btn p-4 btn-success">Acheter</button>
                    
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
