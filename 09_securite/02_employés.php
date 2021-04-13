<?php require_once '../inc/functions.php'; ?> 
<?php 
    $pdoENTR = new PDO('mysql:host=localhost;dbname=entreprise',// On a en premier lieu le driver mysql (IBM, ORACLE, ODBC...) le nom du serveur, le nom de la BDD. 
    'root',//L'utilisateur pour la BDD
    '',// si vous ête sur mac il y a un mot de passe = 'root'
    array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Cette ligne sert à afficher les erreurs sur le navigateurs 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Cette ligne sert a définir le charset des échanges avec la BDD
    ));
    ?>
     <?php 
               if ( !empty( $_POST)) {
                //pour se pré-munir des failles nous faisons ceci :
                $_POST[ 'prenom' ] = htmlspecialchars($_POST[ 'prenom' ]);
                $_POST[ 'nom' ] = htmlspecialchars($_POST[ 'nom' ]);
                // $_POST[ 'date_embauche' ] = htmlspecialchars($_POST[ 'date_embauche' ]);
                $_POST[ 'salaire' ] = htmlspecialchars($_POST[ 'salaire' ]);



                $resultat = $pdoENTR->prepare( " INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :sexe, :service, :salaire, NOW()) " );
                //NOW() renvoie la date d'aujourd'hui

                $resultat->execute(array(
                    ':prenom' => $_POST[ 'prenom' ],
                    ':nom' => $_POST[ 'nom' ],
                    ':sexe' => $_POST[ 'sexe' ],
                    ':service' => $_POST[ 'service' ],
                    // ':date_embauche' => $_POST[ 'date_embauche' ],
                    ':salaire' => $_POST[ 'salaire' ],
                ));
            }
            
              ?> 


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - PDO</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body><?php require '../inc/navigation.inc.php'; ?>
<!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 - EMPLOYES </h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12">
            <?php 
            // Affichage des commentaires avec query et boucle while et compter les enregistrements de la table
            $resultat = $pdoENTR->query( " SELECT * FROM employes ORDER BY nom " );
            // jeprint_r($resultat->rowCount());
            $nbr_employes = $resultat->rowCount();// je compte les résultats et je passe le total dans une nouvelle variable
          ?> 
            <h5>Il y a <?php echo $nbr_employes;// je compte les résultats ?> employés</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Sexe</th>
                        <th>Service</th>
                        <th>Date d'embauche</th>
                        <th>Salaire</th>
                        <th>Fiche</th>
                    </tr>
                </thead>
            <?php 
            while ( $employes = $resultat->fetch( PDO::FETCH_ASSOC ) ) { ?>
                <tr>
                    <td><?php echo $employes['id_employes']; ?></td>
                    <td><?php echo $employes['prenom']; ?></td>
                    <td><?php echo $employes['nom']; ?></td>
                    <td><?php echo $employes['sexe']; ?></td>
                    <td><?php echo $employes['service']; ?></td>
                    <td><?php echo $employes['date_embauche']; ?></td>
                    <td><?php echo $employes['salaire']; ?></td>
                    
                    
                </tr>
            <?php } ?> 
            </table>
                
                
            </div>
            <!-- fin col -->
            <div class="col-sm-12">
            <div class="row">
            <div class="col-sm-12 col-md-6">
            <!-- il faut faire un formulaire HTML avec action et method ; action reste vide si nous insérons grâce à cette même page et POST va envoyer les infos du form dans la superglobale $_POST -->
            <form method="POST" action="" class="p-2">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe" value="f">
                    <label class="form-check-label" for="sexe">Femme</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="sexe" value="m">
                    <label class="form-check-label" for="sexe">Homme</label>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select class="form-select" aria-label="Default select example" name="service" id="service">
                        <option selected>Choisir le service</option>
                        <option value="commercial">Commercial</option>
                        <option value="juridique">Juridique</option>
                        <option value="informatique">Informatique</option>
                        <option value="secrétariat">Secrétariat</option>
                        <option value="production">Production</option>
                        <option value="communication">Communication</option>
                        <option value="comptabilité">Comptabilité</option>
                        <option value="direction">Direction</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="salaire">Salaire</label>
                    <input type="text" class="form-control" name="salaire" id="salaire" value="">
                </div>
                
               
                <button type="submit" class="btn btn-small btn-primary">Envoyer</button>
              </form>



              
            
            </div> <!--fin de col-->
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
