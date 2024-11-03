<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo'Error';
        die('Error :'.$e->getMessage());
    }
    $req = $conn->prepare("INSERT INTO lib.livres(titre,auteur,editeur) VALUES (:titre, :auteur, :editeur);");
    $req->execute(array(
        'titre' => $_POST["titre"],
        'auteur' => $_POST["auteur"],
        'editeur' => $_POST["editeur"]
    ));
    header('location:listelivres.php');
?>