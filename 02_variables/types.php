<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel="stylesheet">  
    
    <link rel="stylesheet" href="../css/style.css">

    <title>Cours PHP 7 - Types de données</title>

  </head>

  <body class="bg-dark">
  <div class="container-fluid p-0 m-0">
        <!-- ========================================= -->
        <!-- Navbar -->
        <!-- ========================================= -->
        <?php require '../inc/navigation.inc.php'; ?>
    <!-- fin navbar -->
    </div><!-- fin du container fluid -->

    <!-- ========================================= -->
    <!-- Contenu principal -->
    <!-- ========================================= -->

    <div class="container bg-white p-5">
        <div class="row jumbotron bg-light">
            <div class="col-sm-12">
                <h1 class="text-center">Cours PHP 7 - Types de données</h1>
                <p class="lead text-center mt-4">Dans PHP il n'existe pas de déclaration explicite du type d'une variable lors de sa création. Même PHP 7 reste un langage pauvrement typé comparé à JAVA ou au C.</p>
            </div>
        </div><!-- fin row -->
        <!-- fin du jumbotron -->
        <hr>

        <div id="I." class="row bg-light">
            <div class="col-sm-12">
                <h2><span>I.</span> Les types de données</h2>
                <ul>
						<li>Les types de base :</li>
							<ul>
								<li>Entiers, avec le type integer, qui permet de représenter les nombres entiers dans les bases 10, 8 et 16.</li>
								<li>Flottants, avec le type double ou float, au choix, qui représentent les nombres réels, ou plutôt décimaux au sens mathématique. </li>
								<li>Chaînes de caractères, avec le type string.</li>
								<li>Booléens, avec le type boolean, qui contient les valeurs de vérité TRUE ou FALSE (soit les valeurs 1 ou 0 si on veut les afficher).</li>
							</ul>
						<li>Les types composés :</li>
							<ul>
								<li>Tableaux, avec le type array, qui peut contenir plusieurs valeurs.</li>
								<li>Objets, avec le type object.</li>
							</ul>
						<li>Les types spéciaux</li>
							<ul>
								<li>Objets, avec le type object.</li>
								<li>Type null.</li>
							</ul>
					</ul>
            </div><!-- fin col -->

            <div id="II." class="col-sm-12">
                <h2><span>II.</span> Les opérateurs numériques</h2>
                <p>PHP offre un large éventail d'opérateurs utilisables avec des nombres. Les variables ou les nombres sur lesquels agissent ces opérateurs sont appelés les opérandes.</p>

                <table class="table table-striped">
                    <caption>Les opérateurs numériques</caption>
                    <thead>
                        <tr>
                        <th scope="col">Opérateur</th>
                        <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">+</th>
                            <td>Addition</td>
                        </tr>
                        <tr>
                            <th scope="row">-</th>
                            <td>Soustraction</td>
                        </tr>
                        <tr>
                            <th scope="row">*</th>
                            <td>Multiplication</td>
                        </tr>
                        <tr>
                            <th scope="row">**</th>
                            <td>Puissance (associatif à droite)<br>
                                $a=3;<br>
                                echo $a**2; //Affiche 9<br>
                                echo $a**2**4; //Affiche 43046721 soit 3**(2**4) ou 316</td>
                        </tr>
                        <tr>
                            <th scope="row">/</th>
                            <td>Division</td>
                        </tr>
                        <tr>
                            <th scope="row">%</th>
                            <td>Modulo : reste de la division du premier opérande par le deuxième. Fonctionne aussi avec des opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chacun des opérandes.<br>
                            $var = 159;<br>
                            echo $var%7; //affiche 5 car 159=22x7 + 5.<br>
                            $var = 10.5;<br>
                            echo $var%3.5; //affiche 1et non pas 0.<br>

                            <?php  
                                $var = 159;
                                echo "<div class=\"text-success pt-4\"><strong>Dans la variable \$var j'ai rentré 159.<br>";
                                echo "Si je veux afficher le contenu de \$var le voici : \$var contient $var<br>";
                                echo "<strong>Le résultat du modulo de $var par 7 : \$var%7 est égal à " .$var%7;
                                echo "</strong></div>";
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">--</th>
                            <td>Décrémentation : soustrait une unité à la variable. Il existe deux possibilités, la prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation, qui soustrait après avoir utilisé la variable.<br>
                            $var=56;<br>
                            echo $var--; //affiche 56 puis décrémente $var.<br>
                            echo $var; //affiche 55.<br>
                            echo --$var; //décrémente $var puis affiche 54.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">++</th>
                            <td>Incrémentation : ajoute une unité à la variable. Il existe deux possibilités, la préincrémentation, qui ajoute 1 avant d'utiliser la variable, et la postincrémentation, qui ajoute 1 après avoir utilisé la variable.
                            $var=56;<br>
                            echo $var++; //affiche 56 puis incrémente $var.<br>
                            echo $var; //affiche 57.<br>
                            echo ++$var; //incrémente $var puis affiche 58. <br>
                            <?php
                                
                                $var = 56;   
                                                       
                                echo "<div class=\"text-success pt-4\"><strong>test<br>";
                                echo $var++. "<br> $var </strong></div><br>";  

                                echo "<div><strong>Autre exemple de concaténation :</strong></div>";

                                echo "<div class=\"text-success pt-4\"><strong>test<br>" .$var++. "<br>" .$var. "<br>" .++$var. "</strong></div>";                       

                            ?>
                            </td>
                        </tr>                            
                    </tbody>
                </table>

                <h3>Le type "Boolean" ou boléen</h3>
                <p>Le type booléen ne peut contenir que deux valeurs différentes TRUE ou FALSE, 1 ou 0</p>
                <?php 
                    $a = 89;
                    $b =($a<100); // dans le cas où c'est FALSE, il affichera une chaîne vide
                    echo "<div class=\"text-success\"><strong>\$b vaut $b<br></strong></div>";
                ?>

                <h3 class="pt-4 pb-3">Les opérateurs booléens</h3>
                <p>Quand ils sont associés, les opérateurs booléens servent à écrire des expressions simples ou complexes, qui sont évaluées par une valeur booléenne TRUE ou FALSE. Ils seront utilisés dans les instructions conditionnelles (dans des IF entre autres).</p>

                <table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Opérateur</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">==</th>
						<td>
						Teste l'égalité de deux valeurs. L'expression $a == $b vaut TRUE si la valeur de $a est égale à celle de $b et
						FALSE dans le cas contraire :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a==$b);<br>
						$c est un booléen qui vaut TRUE car dans un contexte de comparaison numérique, la chaîne "345" est évaluée comme le nombre 345. Si $b="345
						éléphants" nous obtenons le même résultat.
						</td>
					</tr>
					<tr>
						<th scope="row">!= ou <></th>
						<td>
						Teste l'inégalité de deux valeurs.<br>
						L'expression $a != $b vaut TRUE si la valeur de $a est différente de celle de $b et FALSE dans le cas contraire.
						</td>
					</tr>
					<tr>
						<th scope="row">===</th>
						<td>
						Teste l'identité des valeurs et des types de deux expressions.<br>
						L'expression $a === $b vaut TRUE si la valeur de $a est égale à celle de $b et que $a et $b sont du même type. Elle vaut FALSE dans le cas contraire :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a===$b);<br>
						$c est un booléen qui vaut FALSE car si les valeurs sont égales, les types sont différents (integer et string).
						</td>
					</tr>
					<tr>
						<th scope="row">!==</th>
						<td>
						Teste la non-identité de deux expressions.<br>
						L'expression $a !== $b vaut TRUE si la valeur de $a est différente de celle de $b ou si $a et $b sont d'un type différent. Dans le cas contraire, elle vaut FALSE :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a!==$b);<br>
						$c est un booléen qui vaut TRUE car si les valeurs sont égales, les types sont différents (integer et string).
						</td>
					</tr>
					<tr>
						<th scope="row"><</th>
						<td>
						Teste si le premier opérande est strictement inférieur au second.
						</td>
					</tr>
					<tr>
						<th scope="row"><=</th>
						<td>
						Teste si le premier opérande est inférieur ou égal au second.
						</td>
					</tr>
					<tr>
						<th scope="row">></th>
						<td>
						Teste si le premier opérande est strictement supérieur au second.
						</td>
					</tr>
					<tr>
						<th scope="row">>=</th>
						<td>
						Teste si le premier opérande est supérieur ou égal au second.
						</td>
					</tr>
					<tr>
						<th scope="row"><=></th>
						<td>
						Avec $a<=>$b, retourne -1, 0 ou 1 respectivement si $a<$b, $a=$b ou $a>$b ($a et $b peuvent être des chaînes).
						</td>
					</tr>
					</tbody>
                </table>
	
				<h3 class="pt-4 pb-3">Les opérateurs logiques</h3>
				<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Opérateurs</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">OR</th>
                            <td>Teste si l'un au moins des opérandes a la valeur TRUE :<br>
                            $a = true;<br>
                            $b = false;<br>
                            $c = false;<br>
                            $d = ($a OR $b);//$d vaut TRUE.<br>
                            $e = ($b OR $c); //$e vaut FALSE.</td>
                        </tr>
                        <tr>
                            <th scope="row">||</th>
                            <td>Équivaut à l'opérateur OR mais n'a pas la même priorité.</td>
                        </tr>
                        <tr>
                            <th scope="row">XOR</th>
                            <td>Teste si un et un seul des opérandes a la valeur TRUE :<br>
                            $a = true;<br>
                            $b = true;<br>
                            $c = false;<br>
                            $d = ($a XOR $b); //$d vaut FALSE.<br>
                            $e = ($b XOR $c); //$e vaut TRUE.</td>
                        </tr>
                        <tr>
                            <th scope="row">AND</th>
                            <td>Teste si les deux opérandes valent TRUE en même temps :<br>
                            $a = true;<br>
                            $b = true;<br>
                            $c = false;<br>
                            $d = ($a AND $b); //$d vaut TRUE.<br>
                            $e = ($b AND $c); //$e vaut FALSE.</td>
                        </tr>
                        <tr>
                            <th scope="row">&&</th>
                            <td>Équivaut à l'opérateur AND mais n'a pas la même priorité.</td>
                        </tr>
                        <tr>
                            <th scope="row">!</th>
                            <td>Opérateur unaire de négation, qui inverse la valeur de l'opérande :
                            $a = TRUE;<br>
                            $b = FALSE;<br>
                            $d = !$a; //$d vaut FALSE.<br>
                            $e = !$b; //$e vaut TRUE.</td>
                        </tr>
                    </tbody>
				</table>

                <p>Attention !! Une erreur classique dans l'écriture des expressions conditionnelles consiste à confondre l'opérateur de comparaison == avec l'opérateur d'affectation =. L'usage des parenthèses dans la rédaction des expressions booléennes est souvent indispensable et toujours recommandé pour éviter les problèmes liés à l'ordre d'évaluation des opérateurs.</p>

            </div><!-- fin col -->
            
        </div><!-- fin row -->


    </div> <!-- fin du container -->

    <?php require("../inc/footer.inc.php"); ?>

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
