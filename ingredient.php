<html>
<body>

<form action="ajout_ingredient.php" method="post">
Nom de l'ingrédient: <input type="text" name="nom"><br>
<input type="submit">
</form>
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
#recherche dans la base de données
    $sqlQuery = "SELECT nom FROM ingredient";
    $ingredientStatement = $mysqlClient->prepare($sqlQuery);
    $ingredientStatement->execute();
    $ingredients = $ingredientStatement ->fetchAll();
#afficher la liste d'ingrédients
    foreach ($ingredients as $ingredient) {
        ?>
        <p><?php echo $ingredient['nom']; ?></p>
        <?php
    }
?>
</body>
</html> 