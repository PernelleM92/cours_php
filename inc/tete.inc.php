<!DOCTYPE html>
<?php
    $variable1 = " la page faite avec des fichiers en inc. ";
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo " <title>Page faite avec des fichiers inc</title>" ;
    ?>
</head>
<body> 
    <?php


            #***********************
            #Ceci est un commantaire
            #***********************

        echo "<div><h1 style=\"border-width:5;border-style:double;background-color:#ffcc99;\">Bienvenue sur $variable1 </h1>";

        echo "<p>Une fonction qui donne le nom du fichier exécuté : ". $_SERVER['PHP_SELF'],"</p></div>";  /* Ce code affiche le chemin de la page  */

        // si on le souhaite, il n'est pas utile de fermer le passage php



    ?>










    
</body>
</html>