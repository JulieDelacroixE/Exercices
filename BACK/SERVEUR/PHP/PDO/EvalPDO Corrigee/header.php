<body>
    <div class="container">
        <header>
            <div class="row justify-content-between align-self-start">
                <div class="col-4">
                    <img class="img-fluid" src="src/jarditou_photos/jarditou_logo.jpg" alt="jarditoulogo" width="200" height="auto">
                </div>
                <div class="col-4">
                    <p class="h2 ml-5 pt-3 d-none d-lg-block">Tout le jardin</p>
                </div>
            </div>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <a class="navbar-brand" href="Index.php">Jarditou.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Tableau.php">Tableau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formulaire.php">Formulaire</a>
                </li>
            </ul>
        </div>
        <form class="form-inline d-none d-lg-block" method="POST" action="recherche.php">
            <div class="form-group">
            <label for="search"></label>
            <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion" name="search" id="search">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="rechercher">
            </div>
        </form>
    </nav>

    <div class="row">
        <div class="col-12">
            <img class="img-fluid" src="src/jarditou_photos/promotion.jpg" alt="Jarditou promotion">
        </div>
    </div>
</header>