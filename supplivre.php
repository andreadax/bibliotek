<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo'Error';
        die('Error :'.$e->getMessage());
    }
    
    $conn-> query ("DELETE FROM lib.livres WHERE code_livre = ".$_GET["code_livre"].";");
    
    header('location:listelivres.php');
?>  