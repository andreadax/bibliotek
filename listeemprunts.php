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
                        <a class="nav-link" aria-current="page"  href="listemembres.php">Nos membres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="listeemprunts.php">Emprunts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="m-3">
        <form class="row" action="#" method="POST">
            <div class="col-auto">
                <input type="text" class="form-control" id="codemembre" name="codemembre" placeholder="code membre">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="nomembre" name="nommembre" placeholder="nom membre">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="codelivre" name="codelivre" placeholder="code livre">
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" id="titrelivre" name="titrelivre" placeholder="titre livre">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary"> Rechercher </button>
            </div>
            
            <div class="col-auto">
                <a href="addempruntsform.php" class="btn btn-outline-success"> Nouveau </a>
            </div>
        </form>
        <?php
            if( isset($_POST["codemembre"]) || isset($_POST["nommembre"]) || isset($_POST["codelivre"]) || isset($_POST["titrelivre"])){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>code membre</th>
                    <th>nom</th>
                    <th>code livre</th>
                    <th>titre</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $requete = "SELECT * FROM lib.livres AS l INNER JOIN lib.emprunts AS e ON l.code_livre = e.code_livre INNER JOIN lib.membres AS m ON e.code_membre = m.code_membre WHERE titre LIKE '%".$_POST["titrelivre"]."%' AND nom LIKE '%".$_POST["nommembre"]."%'";
                if($_POST["codemembre"] != ""){
                    $requete = $requete ."AND e.code_membre = ".$_POST["codemembre"];
                }
                if($_POST["codelivre"] != ""){
                    $requete = $requete ."AND e.code_livre = ".$_POST["codelivre"];
                }
                $requete = $requete.";";
                $reponse = $conn->query($requete);
                while($donnee = $reponse->fetch()){
                ?>
                <tr>
                    <td><?=$donnee["code_membre"]?></td>
                    <td><?=$donnee["nom"]?></td>
                    <td><?=$donnee["code_livre"] ?></td>
                    <td><?=$donnee["titre"] ?></td>
                </tr>
                <?php
                }
                ?>
                <!-- Ajouter des lignes supplémentaires si nécessaire -->
            </tbody>
        </table>
        <?php
        }else{
            echo'Veuillez entrer votre recherche!';
        }
        ?>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>