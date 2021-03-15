<!DOCTYPE html>
<?php
    require '../inc/navigation.inc.php';
    $variable1 = "PHP 7";/*  (qui est dans une variable"; */

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title>Page 01, un exemple </title>"; ?>
</head>
<body>
    <?php
        echo "<h1>Cours sur le $variable1</h1>";
    ?>
    <p>Utilisation de variable PHP, on travaille aussi avec : <br>
    <?php /* ouverture du php */
        $variable2 = "MySQL"; /* Déclaration de la variable */
        echo $variable2;/*  affiche la variable (renvoie) */
        echo "</p>"; /* fermeture du </p> qui est dans le php */

        $variable2 = "coucou";
        echo $variable2;
    ?> <!-- ferme le php -->
    <hr>

    <?= "<blockquote>$variable2, $variable2, on entend le $variable2 <blockquote>"; ?>
    
    
</body>
</html>