<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotek</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class = "container-fluid">
            <a class= "navbar-brand" href="#">Bibliotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarSupportedContent" arial-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="listelivres.php">Nos livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"  href="listemembres.php">Nos membres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"  href="listeemprunts.php">Emprunts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <form method="POST" class="row" action="addlivre.php">
            <div class="col-auto">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="titre">
            </div>
            <div class="col-auto">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" placeholder="auteur">
            </div>
            <div class="col-auto">
                <label for="editeur" class="form-label">Editeur</label>
                <input type="text" class="form-control" id="editeur" name="editeur" placeholder="editeur">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary"> valider </button>
            </div>
        </form>

    </div>

        <script src="js/bootstrap.min.js"></script>
</body>
</html>