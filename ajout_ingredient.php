<?php
#créer connexion à la base de donnée
    try
    {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=projet_recettes;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    #créer un nouvel élément dans la base de données
    $sqlQuery = "INSERT INTO ingredient (nom) VALUES (:ingredient)";
    $ingredientStatement = $mysqlClient->prepare($sqlQuery);
    $ingredientStatement->execute([
        'ingredient'=>$_POST["nom"]
    ]);
?>