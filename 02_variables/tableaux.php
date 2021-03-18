<?php require_once '../inc/functions.php'; ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - tableaux</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <!-- ========================================= -->
        <!-- Navbar -->
        <!-- ========================================= -->
        <?php require '../inc/navigation.inc.php'; ?>
    <!-- fin navbar -->
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 -Tableaux</h1>
        <p class="lead">Une variable est le conteneur d'une valeur d'un des types utilisés par PHP (entiers, flottants, chaînes de caractères, tableaux, booléens, objets, ressource ou NULL).</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <!-- CONTENU PRINCIPAL -->

    <main class="container bg-white">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center">7 - Les tableaux</h2>
        <p>Les tableaux représentent un type composé car ils permettent de stocker sous un même nom de variable plusieurs valeurs indépendantes d'un des types de base que vous venez de voir. C'est comme un tiroir divisé en compartiments. Chaque compartiment, que nous nommerons un élément du tableau, est repéré par un indice numérique (le premier ayant par défaut la valeur 0 et non 1). D'où l'expression de tableau indicé.</p>
        <p>Un tableau appelé array en anglais est une variable amélioré dans laquelle on sotcke une multitude de valeurs. Ces valeurs être de n'importe quelle type. Elles possèdent un indice dont la numérotation commence à 0</p>
        <blockquote>
          <?php
            $tab[0] = 2004; // la variable $tab est un tableua par le simple fait que son nom est suivi de crochets
            $tab[1] = 31.14E7;
            $tab[2] = "PHP 7";
            $tab[35] = $tab[2]." et MySQL"; // les élements indicés entre 2 et 35 n'existent pas
            $tab[] = TRUE; // son indice sera 36 , il prend automatiquement la suite du dernier indice utilisé 
            echo "<p class=\"alert alert-success w-50 mx-auto\">Nombre d'élements du tableau : ". COUNT($tab). ".<br>Le langage préféré de l'open source est $tab[2]. <br> Utilisez $tab[35].</p>";

            // jevardump($tab);
            // jeprintr($tab);
          ?>
        </blockquote>
      </div>

      <div class="col-sm-12">
        <h2>Les tableaux associatifs</h2>
        <p>Dans un tableaux associatifs, nous pouvons choisir le nom des indices ou des index, c'est à dire que nous associons un indices créé par nous a sa valeur.</p>
        <?php 
        $couleurs = array (
          'b' => 'bleu' ,
          'bl' => 'blanc',
          'r' => 'rose',
        );
        
        jevardump($couleurs);
        jeprintr($couleurs);
        
        //Pour afficher une valeur de notre tableau associatif en le cherchant par son indice
        echo '<p> La première couleur du tableau est ' .$couleurs['b'].'</p>'; // quand un tableau associatif est dans des quotes, il prend des uotes autour de son indice.
        echo "<p> La première couleur du tableau est $couleurs[b] </p>"; // Dans des guillemets, il y a une exception, l'indice ne prend plus de quotes


        //mini exos compter le nombre d'élément du tableau

        echo "<p>Nombre d'élément dans le tableau \$couleurs : " .count( $couleurs). "</p>";
        echo "<p>Nombre d'élément dans le tableau \$couleurs : " .sizeof( $couleurs). "</p>";

        ?> 
      </div>

      <div class="col-sm-12">
      <h2>Les tableaux multidimensionnels</h2>
      <p>Un tableau multi-dimensionnel est un tableau qui contiendra une suite de tableau Chaque tableau présente une dimension</p>
      <?php 
      $tableau_multi = array(
        0 => array(
          'prenom' => 'Burna',
          'nom' => 'Boy',
          'telephone' =>'01 25 26 36 99'
        ),
        1 => array(
          'prenom' => 'Steflon',
          'nom' => 'Don',
          'telephone' =>'01 58 52 36 99'
        ),
        2 => array(
          'prenom' => 'Vybz',
          'nom' => 'Kartel'
        )
      );

      jeprintr($tableau_multi);

      //pour afficher Burna
      echo "Burna";
      echo $tableau_multi[0]['prenom']; // Pour afficher Burna on entre d'abord l'indice 0 puis dans le sous-tableau on va à l'indice prenom

      //Pour parcourir le tableau multi-dimensionnel on peut faire une boucle for car ses indices sont numériques

      echo "<ul>";
      for ($i=0; $i < count($tableau_multi);$i++){
        echo "<li>" .$tableau_multi[$i]['nom']." ".$tableau_multi[$i]['prenom']."</li>";
      }
      echo "</ul>";

      // Faire un foreach pour avoir les indices de notre tableau.
      echo "<p>";
      foreach ( $tableau_multi as $indice => $prenom){
        echo $tableau_multi[$indice]['prenom'];
      }
      ?> 

        
      
      </div>
    </div>



    </main>

    <?php require '../inc/footer.inc.php'; ?>