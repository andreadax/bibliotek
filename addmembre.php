<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo'Error';
        die('Error :'.$e->getMessage());
    }
    $req = $conn->prepare("INSERT INTO lib.membres(nom,adresse) VALUES (:nom, :adresse);");
    $req->execute(array(
        'nom' => $_POST["nom"],
        'adresse' => $_POST["adresse"]
    ));
    header('location:listemembres.php');
?>