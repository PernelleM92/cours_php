<?php

// création ou ouverture d'une session
echo '<h1>Cours PHP 7 - $_SESSION </h1>';

echo '<p>Les données du fichier de session sont accessibles et manipulables à partir de la superglobales $_SESSION</p>';

//cette fonction si on a besoin des informations de session, on devra être placée au début de chaque page.

session_start();// permet de créer un fichier de session avec son identifiant Ou de l'ouvrir si il existe déja et que l'on a reçu un cookie avec l'id dedans

//Principe des sessions : un fichier temporaire appelé "session" est crée sur le serveur, avec un identifiant unique. Cette session est lié a un internaute dans le meme temps un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSID). Ce cookie se détruit quand on quitte le navigateur.
//Le fichier de session peut contenir des informations sensibles !! il n'est pas accessible par l'internaute (visiteur)

$_SESSION['pseudo'] = 'Tintin';
$_SESSION['mdp'] = 'vol747';
$_SESSION['email'] = 'tintin@moulinsart.be';

 echo '<pre>';
 print_r($_SESSION);
 echo '</pre>';

 //il est possible de vider une partie de la session avec unset()
 unset($_SESSION['mdp']);

 echo '<pre>';
 print_r($_SESSION);
 echo '</pre>';

 //supprimer entièrement une session

 //session_destroy(); //suppression de la session et du fichier de session

 //echo '<p>la session est détruite.</p>; // nous avons effectué un session-destroy() mais il n'est éxécuté qu'à la fin de notre script. Nous vpoyons encore ici le contenu de la session, mais le fichier temporire dans le dossier temp a bien été supprimé

 //Ce fichier contient les informations de session et elles sont accessibles grâce a session_start()

//  echo '<pre>';
//  print_r($_SESSION);
//  echo '</pre>';


?> 