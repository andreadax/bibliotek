<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo 'Erreur';
        die('Erreur :'.$e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotek</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary clean-navbar navbar-light navbar navbar-expand-lg">
        <div class = "container" class="collapse navbar-collapse">
            <a class= "navbar-brand" href="#">Bibliotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarSupportedContent" arial-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" >
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
    <div class="m-3">
        <form class="row" action="#" method="POST">
            <div class="col-auto" >
                <input type="text" class="form-control" id="titre" name="titres" placeholder="titre">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="auteur" name="auteurs" placeholder="auteur">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary"> Rechercher </button>
            </div>
            <div class="col-auto">
                <a href="addlivresform.php" class="btn btn-outline-success"> Nouveau </a>
            </div>
        </form>
        <?php
            if(isset($_POST["titres"]) || isset($_POST["auteurs"])){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>code</th>
                    <th>titre</th>
                    <th>auteur</th>
                    <th>editeur</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $reponse = $conn->query("SELECT * FROM lib.livres WHERE titre LIKE '%".$_POST["titres"]."%' AND auteur LIKE '%".$_POST["auteurs"]."%';");
                while($donnee = $reponse->fetch()){
                ?>
                <tr>
                    <td><?=$donnee["code_livre"] ?></td>
                    <td><?=$donnee["titre"] ?></td>
                    <td><?=$donnee["auteur"] ?></td>
                    <td><?=$donnee["editeur"] ?></td>
                    <td>
                        <!-- <button class="btn btn-warning btn-sm">Modifier</button> -->
                        <a href="supplivre.php?code_livre=<?=$donnee['code_livre'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <?php
                }
                ?>
                
                <!-- Ajouter des lignes supplémentaires si nécessaire -->
            </tbody>
        </table>
        <?php
            }else{
                echo 'Veuillez faire votre recherche!';
            }
        ?>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>