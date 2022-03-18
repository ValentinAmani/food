<?php
session_start();

include_once('config/mysql.php');
include_once('variables.php');
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Accueil</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <!-- Header -->
            <?php include_once('header.php'); ?>

            <div class="mb-4">
                <h1>Food</h1>
                <p>Site de partage de recettes de tous origines</p>
            </div>

            <?php if (isset($loggedUser['email'])) : ?>
                <div class="alert alert-success" role="alert">
                    Bienvenue <?php echo($loggedUser['email']); ?> !
                </div>
            <?php endif; ?>

            <!-- Affiche les recettes -->
            <?php foreach ($recipes as $recipe) : ?>
                <article class="mb-3">
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo $recipe['author']; ?></i>
                    <?php if (isset($loggedUser['email']) && $recipe['author'] === $loggedUser['email']) : ?>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <a class="link-warning" 
                                href="./recipes/update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="link-danger" 
                                href="./recipes/delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article
                                </a>
                            </li>
                            <!-- comments -->
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    
        <?php include_once('footer.php') ?>
    </body>
</html>
