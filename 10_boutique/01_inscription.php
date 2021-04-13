<?php require_once 'inc/init.php'; ?> 

<?php 

if ( !empty($_POST)){
    jeprintr($_POST);

    if ( !isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
        $contenu .='<div>Le pseudo doit contenir entre 4 et 20 caractères.</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['pseudo'])

    if ( !isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20){
        $contenu .='<div>Le mot de passe doit contenir entre 4 et 20 caractères.</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['pseudo'])

    if ( !isset($_POST['nom']) || strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 20){
        $contenu .='<div>Le nom doit contenir entre 2 et 20 caractères.</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['pseudo'])

    if ( !isset($_POST['prenom']) || strlen($_POST['prenom']) < 4 || strlen($_POST['prenom']) > 20){
        $contenu .='<div>Le prénom doit contenir entre 2 et 20 caractères.</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['prenom'])

    if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
        $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme.</div>';// filter_var -> filtre de variable // dans ce filtre on passe la fonction prédéfinie FILTER_VALIDATE_EMAIL (c'est une constante elle est écrite en MAJUSCULE) cette fonction vérifie que le format est bien de format email
    }// fin if !isset($_POST['email']

    if ( !isset($_POST['civilite']) || $_POST['civilite'] !='m' && $_POST['civilite'] !='f'){
        $contenu .='<div>La civilité n\'est pas valable</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['prenom'])

    if ( !isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 20){
        $contenu .='<div>L\'adresse est-elle complète?</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['prenom'])

    if (!isset($_POST['code_postal']) || !preg_match( '#^[0-9]{5}$#', $_POST['code_postal']) ) {
        $contenu .='<div class="alert alert-danger">Le code postale n\'est pas valable.</div>';// est ce que le code postal correspond à l'expression
    }// 

    
    if ( !isset($_POST['ville']) || strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20){
        $contenu .='<div>Vérifier le nom de votre ville.</div>'; // si indice pseudo inf à 4 car ou sup à 20 on affiche ce message
    }// fin if !isset($_POST['prenom'])

    if (empty($contenu)) {// si la variable est vide c'est qu'il n'y a pas d'erreurs sur le form

        $membre = executeRequete (" SELECT * FROM membre WHERE pseudo = :pseudo",
                        array(':pseudo' => $_POST['pseudo']));
                        if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
                            $contenu .= '<div class="alert alert-danger">le pseudo est indisponible veuillez en choisir un autre</div>';
                        } else { // si on inscirt le membre en BDD
                            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);// cette fonction prédéfinie permet de hasher le mot de passe selon l'algorithme actuel "bcrypt".  Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'intérieur
                            
                            $succes = executeRequete(" INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville,  statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville,  0)", 
                array(
                    ':pseudo' => $_POST['pseudo'],
                    ':mdp' => $mdp, //on prend le mot de passe hashé
                    ':nom' => $_POST['nom'],
                    ':prenom' => $_POST['prenom'],
                    ':email' => $_POST['email'],
                    ':civilite' => $_POST['civilite'],
                    ':adresse' => $_POST['adresse'],
                    ':code_postal' => $_POST['code_postal'],
                    ':ville' => $_POST['ville'],
            ));
            if ($succes) {
                $contenu .= '<div class="alert alert-success">Vous êtes inscrit <a href="02_connexion.php">Cliquez ici pour vous connecter</a></div>'; 
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur lors de l`\enregistrement !</div>';
            }//fin du if if if ($succes)
                        } /* fin du if else */

    } // fin du if empty
    

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
    <title>La boutique - INSCRIPTION</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body><?php require '../inc/navigation.inc.php'; ?>
<!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">La boutique 6 Inscrivez-vous</h1>
        <?php 
        
        echo $contenu ;
        ?> 
        <p class="lead"></p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12 ">
            <h2><span>II.</span> Formulaire</h2>

                <form action="" method="POST" class="w-50">
                    <div class="form-group">
                        <label for="prenom">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" value="">
                        <small class="bg-warning">votre mot de passe doit contenir entre 4 et 20 caractères</small>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="civilite">Civilite</label>
                        <input type="radio" name="civilite" value="m" checked> Homme 
                        <input type="radio" name="civilite" value="f"<?php if (isset($fiche['sexe']) && $fiche['sexe'] =='f') echo 'checked'?>> Femme 
                            
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="adresse">Adresse</label>
                        <textarea name="adresse" id="adresse" class="form-control"><?php echo $_POST['adresse'] ?? ''; ?></textarea>
                    </div>

                    <div class="form-group mt-2">
                        <label for="code_postal">Code postal</label>
                        <input type="text" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>" class="form-control"> 
                    </div>
                    <div class="form-group mt-2">        
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>" class="form-control"> 
                    </div>
                    <button type="submit" class="btn btn-small btn-info">Envoyer</button>
                    <button type="delete" class="btn btn-small btn-danger">Supprimer</button>
                </form>
            </div><!-- fin col -->

                
                
            </div>
            <!-- fin col -->
            <div class="col-sm-12 col-md-6">
            
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
