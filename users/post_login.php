<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $post = $_POST;
    $email = $post['email'];
    $password = $post['password'];
    
    // Selectionne dans la base
    $receiveUsers = $db->prepare('SELECT email, password FROM users');
    $receiveUsers->execute();
    $users = $receiveUsers->fetchAll();

    foreach ($users as $user) {
        if (!empty($email) && !empty($password) && $user['email'] === $email && $user['password'] === $password) {
            $loggedUser = [
                'email' => $user['email']
            ];

            $_SESSION['LOGGED_USER'] = $loggedUser['email'];

            // Cookie qui expire dans un an
            setcookie(
                'LOGGED_USER',
                $loggedUser['email'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );   
        }
        else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                                    $_POST['email'],
                                    $_POST['password']
                            );
        }
    }
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food - Vos recettes</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/bootstrap.bundle.min.js" defer></script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <!-- Header -->
            <?php include_once($rootPath . '/projects/food/header.php'); ?>
            
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>

            <?php if (!isset($_POST['email']) || !isset($_POST['password'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Il vous faut soumettre le formulaire."; ?>
                </div>

            <?php else : ?>
                <!-- Affiche les recettes -->
                <?php if (isset($loggedUser['email'])) : ?>
                    <?php header('Location: ' . $rootUrl . '/projects/food/home.php'); ?>
                <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Vos informations ne figurent pas dans la base de données."; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    
        <?php include_once($rootPath . '/projects/food/footer.php') ?>
    </body>
</html>
