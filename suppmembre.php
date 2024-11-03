<?php
    try{
        $conn = new PDO('pgsql:host=localhost;dbname=bibliotek','postgres','postgres');
    }catch(Exception $e){
        echo'Error';
        die('Error :'.$e->getMessage());
    }
    
    $conn-> query ("DELETE FROM lib.membres WHERE code_membre = ".$_GET["code_membre"].";");
    
    header('location:listemembres.php');
?>  