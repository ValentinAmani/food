<?php
session_start();

include_once('./../variables.php');
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Inscription</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>
            
            <h1>Inscription</h1>
            
            <form action="<?php echo($rootUrl . '/projects/food/users/post_create.php'); ?>" method="post">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Votre nom</label>
                    <input type="text" class="form-control" id="full_name" name="full_name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Votre email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@exemple.com">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Votre age</label>
                    <input type="text" class="form-control" id="age" name="age">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Choisissez un mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer</button>
            </form>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
