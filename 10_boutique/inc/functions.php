<?php 
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

///////2 - FONCTION POUR EXECUTER LES prepare()

function executeRequete($requete, $parametres = array ()) { 
    foreach ($parametres as $indice => $valeur) {        
        $parametres[$indice] = htmlspecialchars($valeur);
        global $pdoSITE; 
        $resultat = $pdoSITE->prepare($requete); 
        $succes = $resultat->execute($parametres);
        if ($succes === false) {
            return false; // si la requête  n'a pas marché je renvoie false
        } else {
            return $resultat;
        }// fin if else 
    }
}// fermeture fonction executeRequete

///////3 - V2RIFIER SI LE MEMBRE EST CONNECTE/////////

////////46 VERIFIER LE STATUT DU MEMBRE////////////
?> 