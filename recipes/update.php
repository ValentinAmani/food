<?php
session_start();
    
include_once('./../config/mysql.php');
include_once('./../variables.php');

//$get = $_GET;

if (!isset($_GET['id']) && is_numeric($_GET['id'])) {
	echo "Il faut un identifiant de recette pour le modifier.";
    return;
}
else {
    $get = $_GET;

    $retrieveRecipeStatement = $db->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute([
    'id' => $get['id']
]);

$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);;
}
?>


<!DOCTYPE html>

<html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Edition de recette</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <h1>Mettre à jour <?php echo $recipe['title']; ?></h1>

            <form action="<?php echo($rootUrl . '/projects/food/recipes/post_update.php'); ?>" method="post">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">Identifiant de la recette</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $get['id']; ?>">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" 
                            value="<?php echo $recipe['title']; ?>">
                    <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
                </div>

                <div class="mb-3">
                    <label for="recipe" class="form-label">Description de la recette</label>
                    <textarea class="form-control" placeholder="Ecrivez ici" id="recipe" name="recipe">
                        <?php echo strip_tags($recipe['recipe']); ?>
                    </textarea>
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer</button>
            </form>
            <br />
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
