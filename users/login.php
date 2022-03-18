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
        <title>Food - Connexion</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <form action="<?php echo($rootUrl . '/projects/food/users/post_login.php'); ?>" method="post">
                <h1>Connexion</h1>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" 
                        placeholder="you@exemple.com">
                    <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer</button>
            </form>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
