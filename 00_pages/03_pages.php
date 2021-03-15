<?
define("PI",3.1415926535, TRUE); // definition insensible à la casse parceque on as mis TRUE
echo "La constante PI vaut ",PI," <br>;
echo "La constante PI vaut ",pi," <br>;
//Véfification de l'existence de la constante
if(define( "PI") ) echo "La constance est déjà définie";
// ou comme ça .....if(define( "pi") ) echo "La constance est déjà définie";
define("sitegravillon", "http://www.gravillon.fr", FALSE); // définition sensible à la casse avec FALSE 
echo "l'url de Gravillon est : ".sitegravillon. "<br>";
echo "Visitez le site de <a href= \".sitegravillon." \ "target=\" _blank\">Gravillon</a>";
require '../inc/navigation.inc.php';
?>