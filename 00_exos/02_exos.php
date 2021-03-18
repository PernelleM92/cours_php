<?php require_once '../inc/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>EXERCICE PHP - TABLEAUX</title>
</head>
<body>
<?php require '../inc/navigation.inc.php'; ?>
<h1>ECERCICES PHP - LES TABLEAUX</h1>


<?php 


//Déclarer un tableau, les valeurs du tableau sont indiqués
$tableau1 = array( 'Dialo', 'Gabin', 'Arletty', 'Fernandel', 'Pauline Carto');
//echo $tableau1; erreur de type "array to string conversion
echo "<pre>";
var_dump($tableau1); //var_dump affiche le contenu du tableau et les types de données et les valeurs
echo "</pre>";

echo "<pre>";
print_r( $tableau1 ); //print_r affiche sans les valeurs (contenus et indices) sans les types
echo "</pre>";

// autre facon de déclarer un array

$tableau2 = [ 'France', 'Espagne', 'Italie', 'Portugal' ];

$tableau2[] = 'Roumanie'; //Rajouter un élément dans notre tableau avec des crochets
print_r( $tableau2 );

// dateJour();
// jevardump();
// jeprintr();

// mini exo avec une boucle foreach, parcourez les deux tableaux de cette page et affichez le dans deux ul
echo "<ul>";
//on parcourt le tableau $tableau par ses valeurs, la variables $acteur prend les valeurs du tableau successivementa chaque tour de boucle, le mot "as" est obligatoire
foreach ($tableau1 as $acteur) {
    // echo "<li>";
    // echo $acteurs;
    // echo "</li>";
    echo "<li> $acteur </li>";    
}

echo "</ul>";
foreach ($tableau2 as $pays) {
    echo "<li> $pays </li>";    
}
echo "</ul>";



//La boucle foreach pour parcourir les indices et les valeurs
echo "<ul>";
foreach ( $tableau1 as $indice => $acteur) {
    echo "<li> pour $indice, la valeur est $acteur </li>";
}
echo "</ul>";

//mini exo
// 1 - déclarez un tableau associatif $contacts avec les indices suivants : prenom, nom email et téléphone et vous y mettez les valeurs correspondant à un seul contact.
// 2 - Puis avec une boucle foreach vous affichez les valeurs
// 3 - Puis dans une autre boucle, vous affichez les valeurs dans des p sauf le prenom qui doit être dans un h3

$contacts = array (
    'prenom' => 'Mike' ,
    'nom' => 'Pernelle',
    'email' => 'mike.pernelle@colombbus.org',
    'telephone' => '06 06 86 05 15',
);

    $contacts2 = [
        'prenom' => 'Mike' ,
        'nom' => 'Pernelle',
        'email' => 'mike.pernelle@colombbus.org',
        'telephone' => '06 06 86 05 15',
    ];

  jevardump($contacts);


  echo "<ul>";
    foreach ($contacts as $valeur){
    echo "<li>".$valeur. "</li>";
}
echo "</ul>";


echo "<ul>";
foreach ($contacts as $indice => $valeur) {
    echo "<li>Pour  $indice la valeur est : $valeur </li>";
      
}
echo "</ul>";

foreach($contacts as $indice => $valeur){
    if($indice == 'prenom'){
      echo "<h3>".$valeur."</h3>";  
    }else{
        echo "<p>".$valeur."</p>";
    };
    
};
//1 - EXo faire un tableau $tailles avec des tailles de vêtements du small au xl et les afficher avec une boucle foreach dans une ul
//2 - puis les afficher dans un select avec une boucle foreach

$tailles = array (
    'small' => 'S - Small',
    'medium' => 'M - Medium',
    'large' => 'L - Large',
    'extralarge' => 'Xl - Extra-Large',
);

jevardump($tailles);

echo "<ul>";
foreach ($tailles as $indices => $sizes){
    echo "<li>".$sizes. "</li>";
}
echo "</ul>";

$tailles2 = [
    "S" => "small",
    "M" => "medium",
    "L" => "large",
    "XL" => "extra-large"
];


echo "<select class=_\"form-control w-25\">";
foreach ($tailles2 as $indices2 => $sizes2){
    echo "<option>" .$indices2. " pour ".$sizes2. "</option>";
}
echo "</select>";

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