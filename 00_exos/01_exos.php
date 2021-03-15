<?php 
require_once '../inc/functions.php';
 require '../inc/navigation.inc.php';
$chaine = "Longtemps je me suis couché ... dans le temps";
$decimal = 18.74;
$entier = 500;
$lib = "liberté";
$eg = "égalité";
$fr = "fraternité";


?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>EXERCICE PHP</title>
  </head>
  <body>

    <h1>EXERCICE PHP  !</h1>
    <?php 
    joursemaine();
    quelJour();
    dateJourFr2();

    // Cette fonction permet d'analyser dans le navigateur le contenu et le type d'une variable
    var_dump($decimal);

    echo "<hr>";

    print_r( " affiche du contenu avec la fonction print_r ");

    echo "<hr>";

    //gettype()

    echo gettype($chaine);

    echo "<hr>";

    

    echo "La devise de la république est \"$lib, $eg, $fr\".";


    echo "<hr>";
    

    // mini exo if else si le prix est supérieur à 100 euros , la remise est de 10% sinon la remise est de 5% et donnez le montant du prix net

    $prix = 1050;
    $remise10 =  $prix*0.9;
    $remise5 =   $prix *0.95;
    if ($prix > 100){
      echo "Pour un montant d'achat de $prix £, la remise est de 10%. Le prix net est de $remise10 £"; 
    }else{
      echo "Pour un montant d'achat de $prix £, la remise est de 5%. Le prix net est de  $remise5 £";
    }
    
    echo "<hr>";

    //exo
    // Si vous achetez un PC à plus de 1000 euros, la remise est de 15 %
    // Pour un pc de 1000 euros et moins, la remise est de 10 %
    // Si c'est un livre, la remise est de 5 %
    // pour tous les autres articles, la remise est de 2%

    // SI c'est un pc Si le prix est sup ou égal a 1000, la remise est de 15%, SINON la remise est de 10% SINON SI c'est un livre, la remise est de % SINON c'est autre chose (qu'un PC ou un livre) la remise est de 2%
    
    $prix = 10000;
    $remise15 = $prix * 0.85;
    $remise10 = $prix * 0.90;
    $remise5  = $prix * 0.95;
    $remise2 = $prix * 0.98;
    $achat = 'livre';
    
    if ($achat == "pc"  ){
      if ($prix>1000){
        echo " Vous avez acheté un pc à $prix £, vous bénéficiez d'une remise de 15 %. Votre pc vous revient à $remise15 £ ";
      }else {
        echo " Vous avez acheté un pc à $prix £, vous bénéficiez d'une remise de 10 %. Votre pc vous revient à $remise10 £ ";
      }

    }elseif ($achat == "livre"){
      echo " Vous avez acheté un livre, vous bénéficiez d'une remise de 5 %. Votre livre vous revient à $remise5 £ ";

    }else {
      echo " Vous avez un autre produit , vous beneficiez d'une remise de 2 %. Votre article vous revient à $remise2 £";

    }
    echo "<hr>";


    //Boucle While 
    // Les boucles whiles sont destinées à répéter du code de facon automatique

    $i = 0;
    while ($i < 25) {
    $i ++;
    echo ("Je compte $i ");
    }


    echo "<hr>";

    //mini exo 5
    // dans une boucle faire les options d'uin élément select en démarrant à 1920 et en s'arrêtant en 2021

    $annee = 1920;
    echo "<label for = \"annee\"> Années </label><select>";
    while ($annee <= 2021) {  //
    echo "<option value=\"\$annee\">" .$annee. "</option>";
    $annee++;
    }
    echo "</select>";

    echo "<hr>";


    $annee2 = 2021;
    echo "<label for = \"annee\"> Années </label><select>";
    while ($annee2 >= 1920) {  //
    echo "<option value=\"\$annee\">" .$annee2. "</option>";
    $annee2--;
    }
    echo "</select>";

    echo "<hr>";

    // mini exo 7
    //si la variable contien espagnole ecrire hola si c'est anglais ecrire hello etc....

    $langue = "français" ;
    switch ($langue){
      case "français" :
          echo"Bonjour !";
          break;
      
      case "anglais" :
          echo"Hello !";
          break;

      case "espagnol" :
          echo"Hola !";
          break;
      
      default:
          echo "Autre langue";
          break;

    }

    

    
    ?> 

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