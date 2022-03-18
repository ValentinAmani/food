<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['recipe'])) {
    $post = $_POST;

    $id = $post['id'];
    $title = $post['title'];
    $recipe = $post['recipe'];

    $insertRecipeStatement = $db->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');
    $insertRecipeStatement->execute([
        'title' => $title,
        'recipe' => $recipe,
        'id' => $id
    ]);
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Modification de recette</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <?php if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['recipe'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Il vous faut soumettre le formulaire."; ?>
                </div>
            
            <?php else : ?>
                <?php if (empty($title) || empty($recipe)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Il manque des informations pour permettre l\'édition du formulaire."; ?>
                    </div>

                <?php else : ?>
                    <h1>Recette modifiée avec succès !</h1>
                    
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
