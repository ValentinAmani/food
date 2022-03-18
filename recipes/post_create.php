<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

// Vérification du formulaire soumis
if (isset($_POST['title']) && isset($_POST['recipe'])) {
	$post = $_POST;
    $title = $post['title'];
    $recipe = $post['recipe'];

    if (!empty($title) && !empty($recipe)) {
        // Fais l'insertion en base
        $insertRecipe = $db->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
        $insertRecipe->execute([
            'title' => $title,
            'recipe' => $recipe,
            'is_enabled' => 1,
            'author' => $loggedUser['email']
        ]);
    }
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Ajouter une recette</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <!-- MESSAGE DE SUCCES -->
            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <?php if (!isset($_POST['title']) || !isset($_POST['recipe'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Il vous faut soumettre le formulaire."; ?>
                </div>
            
            <?php else : ?>
                <?php if (empty($title) || empty($recipe)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Il faut un titre et une recette pour soumettre le formulaire."; ?>
                    </div>

                <?php else : ?>
                    <h1>Recette ajoutée avec succès !</h1>
                
                    <div class="card">    
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text"><b>Email</b> : <?php echo $loggedUser['email']; ?></p>
                            <p class="card-text"><b>Recette</b> : <?php echo strip_tags($recipe); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
