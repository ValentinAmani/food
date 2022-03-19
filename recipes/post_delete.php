<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

if (!isset($_POST['id'])) {
	echo 'Il faut un identifiant valide pour supprimer une recette.';
    return;
}
else {
    $id = $_POST['id'];

    $deleteRecipeStatement = $db->prepare('DELETE FROM recipes WHERE recipe_id = :id');
    $deleteRecipeStatement->execute([
        'id' => $id,
    ]);

    // Effectue une redirection vers la page d'accueil, vue que post_delete n'existe plus
    header('Location: ' . $rootUrl . '/projects/food/home.php');
}
