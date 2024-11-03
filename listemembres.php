<?php
try{
    $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
}catch(Exception $e){
    echo 'Error';
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
        <div class = "container">
            <a class= "navbar-brand" href="#">Bibliotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="navbarSupportedContent" arial-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"  href="listelivres.php">Nos livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="listemembres.php">Nos membres</a>
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
            <div class="col-auto">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary"> Rechercher </button>
            </div>
            <div class="col-auto">
                <a href="addmembresform.php" class="btn btn-outline-success"> Nouveau </a>
            </div>
        </form>
        <?php
            if(isset($_POST["nom"])){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>code</th>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>action</th>                  
                </tr>
            </thead>
            <tbody>
                <?php
                    $reponse = $conn->query("SELECT*FROM lib.membres WHERE nom LIKE '%".$_POST["nom"]."%'  ;");
                    while($donnee = $reponse->fetch()){
                ?>
                <tr>
                    <td><?= $donnee["code_membre"]?></td>
                    <td><?= $donnee["nom"]?></td>
                    <td><?= $donnee["adresse"]?></td>
                    
                    <td>
                        <!-- <button class="btn btn-warning btn-sm">Modifier</button> -->
                        <a href="suppmembre.php?code_membre=<?=$donnee['code_membre'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
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