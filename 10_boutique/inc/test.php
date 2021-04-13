<?php 
$pdoSITE = new PDO('mysql:host=localhost;dbname=site',// On a en premier lieu le driver mysql (IBM, ORACLE, ODBC...) le nom du serveur, le nom de la BDD. 
'root',//L'utilisateur pour le BDD
'',// si vous ête sur mac il y a un mot de passe = 'root'
array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Cette ligne sert à afficher les erreurs sur le navigateurs 
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Cette ligne sert a définir le charset des échanges avec la BDD
));

$requete= $pdoSITE-> query("SELECT * FROM membre");
while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
    echo $ligne['pseudo'];
}
 
?> 