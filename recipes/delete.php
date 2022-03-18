<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Supprimer une recette</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>
            
            <h1>Supprimer la recette ?</h1>
            
            <form action="<?php echo $rootUrl . '/projects/food/recipes/post_delete.php'; ?>" method="post">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">Identifiant de la recette</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id']; ?>">
                </div>
                
                <button type="submit" class="btn btn-danger">La suppression est définitive</button>
            </form>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
