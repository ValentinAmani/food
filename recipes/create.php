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
        <title>Food - Ajouter une recette</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
                crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
                crossorigin="anonymous" defer>
        </script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>
            
            <h1>Ajouter une recette</h1>
            
            <form action="<?php echo($rootUrl . '/projects/food/recipes/post_create.php'); ?>" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
                    <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
                </div>
                
                <div class="mb-3">
                    <label for="recipe" class="form-label">Description de la recette</label>
                    <textarea class="form-control" placeholder="Ecrivez ici" id="recipe" name="recipe"></textarea>
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer</button>
            </form>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
