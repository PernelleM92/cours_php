<?php require_once '../inc/functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>03 exo formulaire</title>
  </head>
  <body>
        <!-- ========================================= -->
        <!-- Navbar -->
        <!-- ========================================= -->
        <?php require("../inc/navigation.inc.php"); ?>
        <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Exo Formulaire</h1>
        <a class="btn btn-primary btn-lg" href="../01_intro/infos.php" role="button">PHP Version 7.2.19</a>
    </div>
    <h1>Exo form</h1>

    <div class="row">
    <div class="col-sm-12 col-md-6">
    <!-- 1 Exo faire un formulaire avec les champs prenom, nom, email, adresse code postale et ville -->
    <!-- 2 Puis récuperer dans une page 03_form traitement.php. Les informations de $_POST -->
    <!-- 3 Puis on fabriquera ensemble un fichier . txt pour stocker les informations du form -->
    
    <form method="POST" action="03_form_traitement.php" class="p-2">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="nom">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="nom">Adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" required>
                </div>
                <div class="form-group">
                    <label for="nom">Code postal</label>
                    <input type="text" class="form-control" name="codepostal" id="codepostal" required>
                </div>
                <div class="form-group">
                    <label for="nom">Ville</label>
                    <input type="text" class="form-control" name="ville" id="ville" required>
                </div>
               
                <button type="submit" class="btn btn-small btn-primary">Envoyer</button>
                </form>
    
    </form>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>