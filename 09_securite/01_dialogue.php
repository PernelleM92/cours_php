<?php require_once '../inc/functions.php'; ?> 
<!-- Connexion a la BDD -->
<?php 
    $pdoDIAL = new PDO('mysql:host=localhost;dbname=dialogue',// On a en premier lieu le driver mysql (IBM, ORACLE, ODBC...) le nom du serveur, le nom de la BDD. 
    'root',//L'utilisateur pour la BDD
    '',// si vous ête sur mac il y a un mot de passe = 'root'
    array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Cette ligne sert à afficher les erreurs sur le navigateurs 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Cette ligne sert a définir le charset des échanges avec la BDD
    ));
    //traitement du formulaire & insertion dans la BDD
    //ce formulaire n'est pas assez protégé contre les injections SQL !!!! >>>>>ok');DELETE FROM commentaire; ( cette phrase peut supprimer toutes les données de la table)
    if ( !empty( $_POST)) {
      //pour se pré-munir des failles nous faisons ceci :
      $_POST[ 'pseudo' ] = htmlspecialchars($_POST[ 'pseudo' ]);
      $_POST[ 'message' ] = htmlspecialchars($_POST[ 'message' ]);

      $resultat = $pdoDIAL->prepare( " INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message) " );
      //NOW() renvoie la date d'aujourd'hui

      $resultat->execute(array(
        ':pseudo' => $_POST[ 'pseudo' ],
        ':message' => $_POST[ 'message' ],
      ));
    } // fin du if
    //Le fait de mettre des marqueur dans la requête permet de ne pas concatener les instructions SQL d'origine et celles qui seraient injectées. Ainsi elles ne peuvent pas s'exécuter successivement. De plus, en liant les marqueurs à leur valeur dn ans execute(), PDO les neutralise automatiquement et les transforment en chaînes de caractères inoffensifs

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - SECURITE</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body><?php require '../inc/navigation.inc.php'; ?>
<!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 - Securité & PHP</h1>
        <p class="lead">ok');DELETE FROM commentaire;(</p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <!-- il faut faire un formulaire HTML avec action et method ; action reste vide si nous insérons grâce à cette même page et POST va envoyer les infos du form dans la superglobale $_POST -->
            <form method="POST" action="" class="p-2">
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" value="">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control" value=""></textarea>
                </div>
                <button type="submit" class="btn btn-small btn-primary">Envoyer</button>
              </form>
    
   
               
                
            </div>
            <!-- fin col -->
            <div class="col-sm-12 col-md-6">
            <p>Création d'une BDD "dialogue" avec les informations suivantes</p>
            <ul class="alert alert-success p-4">
                <li>Nom de la BDD : dialogue</li>
                <li>Nom de la table : commentaire</li>
                <li>la table contient les champs suivants:</li>
                <li>id_commentaire INT PK AI</li>
                <li>pseudo : VARCHAR(20)</li>
                <li>message : TEXT</li>
                <li>date_enregistrement : DATETIME</li>
            </ul>
            
            </div> <!--fin de col-->

            <div class="col-sm-12 col-md-6">
            <?php 
            // $pdoDIAL = new PDO('mysql:host=localhost;dbname=dialogue',// On a en premier lieu le driver mysql (IBM, ORACLE, ODBC...) le nom du serveur, le nom de la BDD. 
            // 'root',//L'utilisateur pour la BDD
            // '',// si vous ête sur mac il y a un mot de passe = 'root'
            // array(
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Cette ligne sert à afficher les erreurs sur le navigateurs 
            // PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Cette ligne sert a définir le charset des échanges avec la BDD
            // ));
            ?>


            <?php 
            // Affichage des commentaires avec query et boucle while et compter les enregistrements de la table
            $resultat = $pdoDIAL->query( " SELECT * FROM commentaire " );
            // jeprint_r($resultat->rowCount());
            $nbr_commentaires = $resultat->rowCount();// je compte les résultats et je passe le total dans une nouvelle variable
          ?> 
            <h5>Il y a <?php echo $nbr_commentaires;// je compte les résultats ?> commentaires</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pseudo</th>
                        <th>Message</th>
                        <th>Date d'enregistrement</th>
                    </tr>
                </thead>
            <?php 
            while ( $commentaire = $resultat->fetch( PDO::FETCH_ASSOC ) ) { ?>
                <tr>
                    <td><?php echo $commentaire['id_commentaire']; ?></td>
                    <td><?php echo $commentaire['pseudo']; ?></td>
                    <td><?php echo $commentaire['message']; ?></td>
                    <td><?php echo $commentaire['date_enregistrement']; ?></td>
                </tr>
            <?php } ?> 
            </table>

            

            

            
            

            
            </div>

       </div> <!-- fin row -->


    </main>
    <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
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
