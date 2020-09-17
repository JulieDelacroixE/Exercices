<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou accueil</title>
</head>

<body>

<?php


$name = $prenom = $sexe = $ddn= $cp = $email = $question = $valider = "";
$nameErr = $prenomErr = $sexeErr = $ddnErr = $cpErr = $emailErr = $questionErr = $validerErr = "";

if (!empty($_POST["submit"])) {

    if (empty($_POST['name']) || !preg_match("#[ a-zA-Z '-]+#", $_POST['name'])) {
        $nameErr = "Entrez un nom valide";
    } else {
        $name = htmlentities($_POST['name']);
    }

    if (empty($_POST['prenom']) || !preg_match("#[ a-zA-Z '-]+#", $_POST['prenom'])) {
        $prenomErr = "Entrez un prenom valide";
    } else {
        $prenom = htmlentities($_POST['prenom']);
    }

    if (empty($_POST['sexe'])) {
        $sexeErr = "Selectionnez votre sexe";
    } else {
        $sexe = htmlentities($_POST['sexe']);
    }

    if (empty($_POST['ddn']) || !preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST['ddn'])) {
        $ddnErr = "Entrez une date de naissance valide";
    } else {
        $ddn = htmlentities($_POST['ddn']);
    }

    if (empty($_POST['cp']) || !preg_match("#[0-9]{5}#", $_POST['cp'])) {
        $cpErr = "Entrez un code postal valide";
    } else {
        $cp = htmlentities($_POST['cp']);
    }

    if (empty($_POST['email']) || !preg_match("#[_a-z0-9-]+(.[_a-z0-9-]+)+@[a-z]+.[a-z]{2,3}#", $_POST['email'])) {
        $emailErr = "Entrez un email valide";
    } else {
        $email = htmlentities($_POST['email']);
    }

    if (empty($_POST['question'])) {
        $questionErr = "Entrez une question";
    } else {
        $question = htmlentities($_POST['question']);
    }

    if (empty($_POST['valider'])) {
        $validerErr = "Veuillez accepter le traitement";
    } else {
        $valider = htmlentities($_POST['valider']);
    }
}
?>




    <div class="container">
        <header>
            <div class="row justify-content-between align-self-start">
                <div class="col-4">
                    <img class="img-fluid" src="public/images/jarditou_logo.jpg" alt="jarditoulogo" width="200" height="auto">
                </div>
                <div class="col-4">
                    <p class="h2 ml-5 pt-3 d-none d-lg-block">Tout le jardin</p>
                </div>
            </div>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <a class="navbar-brand" href="#">Jarditou.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Tableau.html">Tableau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formulaire.php">Formulaire</a>
                </li>
            </ul>
        </div>
        <form class="form-inline d-none d-lg-block">
            <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>
    </nav>
    
    <div class="row">
        <div class="col-12">
            <img class="img-fluid" src="public/images/promotion.jpg" alt="Jarditou promotion">
        </div>
    </div>
</header>

<form id="form2" name="form2" method="POST" action="/Contact.php"><br>

    <p>* Ces zones sont obligatoires</p>

    <fieldset>

        <legend class="h2">Vos Coordonnées</legend>
    <div class="form-group">
        <label for="name">Nom*</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Veuillez saisir votre nom">
            <span class="bg-danger text-white" id="alerte-nom"><?php echo $nameErr;?></span><br>
        <label for="prenom">Votre prénom*</label>
            <input type="text" class="form-control" id="prenom" name ="prenom" placeholder="Veuillez saisir votre prénom">
            <span class="bg-danger text-white" id="alerte-prenom"><?php echo $prenomErr;?></span>
            <input type="hidden" name="secret" value="valeur cachée">
    </div>
    <div class="form-group">
    <label for="sexe">Sexe*</label><br>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sexe" id="sexe1" value="option1">
            <label for="sexe1" class="form-check-label">Féminin</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sexe" id="sexe2" value="option2">
            <label for="sexe2" class="form-check-label">Masculin</label>
        </div><br>
        <span class ="bg-danger text-white" id="alerte-sexe"><?php echo $sexeErr;?></span>
    </div>
    <div class="form-group">
        <label for="date">Date de naissance*</label>
        <input type="text" class="form-control" name="ddn" id="date" value="">
        <span class="bg-danger text-white" id="alerte-date"><?php echo $ddnErr;?></span>
    </div>
    <div class="form-group">
        <label for="codepostal">Code postal*</label>
        <input type="text" class="form-control" id="codepostal" name="cp">
        <span class="bg-danger text-white" id="alerte-cp"><?php echo $cpErr;?></span>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse">
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
    </div>
    <div class="form-group">
        <label for="email">Email*</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="dave.loper@afpa.fr">
        <span class="bg-danger text-white" id="alerte-email"><?php echo $emailErr;?></span>
    </div>
    </fieldset>

    <fieldset>
        <legend class="h2">Votre demande</legend>
            <div class="form-group">
                <label for="sujet">Sujet</label>
                <select class="form-control" id="sujet" name="sujet">
                    <option value="" disabled selected>Veuillez séléctionner un sujet</option>
                    <option value="mes commandes">Mes commandes</option>
                    <option value="Question sur un produit">Question sur un produit</option>
                    <option value="réclamation">Réclamation</option>
                    <option value="autres">Autres</option>
                </select>
                <span class="bg-danger text-white" id="alerte-sujet"></span>
            </div>
            <div class="form-group">
                <label for="question">Votre question* :</label>
                <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                <span class="bg-danger text-white" id="alerte-question"><?php echo $questionErr;?></span>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="valider" name="valider">
                <label for="valider">J'accepte le traitement informatique de ce formulaire</label><br>
                <span class="bg-danger text-white" id="alerte-valider"><?php echo $validerErr;?></span>
            </div>
            <input type="submit" class="btn btn-dark" name="submit" value="envoyer"></input>
            <input type="reset" class="btn btn-dark" name="reset" value="reset"></input>
    </fieldset>

</form>

<footer>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark mt-3 rounded">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Mentions légales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Horaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Plan du site</a>
                </li>
            </ul>
        </div>
    </nav>
</footer>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>