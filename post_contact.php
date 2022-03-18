<?php
session_start();

include_once('variables.php');

if (isset($_POST['email']) || isset($_POST['message'])) {
    $post = $_POST;
    $email = $post['email'];
    $message = $post['message'];

    $errorMessage = "Il faut un email et un message pour soumettre le formulaire.";
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Contact</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">

            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <?php if (!isset($_POST['email']) && !isset($_POST['message'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Il faut un email et un message pour soumettre le formulaire."; ?>
                </div>
            
            <?php else : ?>
                <?php if (empty($email) || empty($message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
            
                <?php else : ?>
                    <h2>Message bien reçu !</h2>
                
                    <div class="card">    
                        <div class="card-body">
                            <h5 class="card-title mb-3">Rappel de vos informations</h5>
                            <p class="card-text"><b>Email</b> : <?php echo $email; ?></p>
                            <p class="card-text"><b>Message</b> : <?php echo strip_tags($message); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
