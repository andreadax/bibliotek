<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo'Error';
        die('Error :'.$e->getMessage());
    }
    $req = $conn->prepare("INSERT INTO lib.emprunts(code_membre,code_livre) VALUES (:code_membre, :code_livre);");
    $req->execute(array(
        'code_membre' => $_POST["codemembre"],
        'code_livre' => $_POST["codelivre"]
    ));
    header('location:listeemprunts.php');
?>