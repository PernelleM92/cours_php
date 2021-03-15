<?php
// Une premiere fonction
function minPap(){
    echo "<p class=\"lead\">Minute papillon ! </p>";
    
}
function joursemaine(){
    setlocale(LC_ALL, 'fr_FR');
    echo strftime("%A %e %B %Y");

}

function quelJour(){
    echo "<p class=\"border border-primary p-2 w-50\">We are ".date('l')."</p>";
}

function dateJourFr2() {
    setlocale(LC_ALL, 'fr_FR');
    echo "<p>Aujourd'hui, nous sommes le " .strftime("%A"). "</p>";
}


// Création d'une fonction pour "var_dump" une variable (très utile pour un tableau)

function jevardump($mavariable){// La fonction nommée avec son paramètre, une variable
    echo "<br><small class=\"bg-warning text-white\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
    var_dump( $mavariable );// une variable à laquelle on applique la fonction var_dump
    echo "</pre>";
}

function jeprintr($mavariable){
    echo "<br><small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-warning w-75\">";
    print_r( $mavariable );// une variable à laquelle on applique la fonction print_r
    echo "</pre>";

}

?>





