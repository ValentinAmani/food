<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

if (isset($_POST['full_name']) || isset($_POST['email']) || isset($_POST['age']) || isset($_POST['password'])) {
    $post = $_POST;

    $fullName = $post['full_name'];
    $email = $post['email'];
    $age = $post['age'];
    $password = $post['password'];

    $errorMessage = "Vos informations ne sont pas valides.";

    if (!empty($fullName) && !empty($email) && !empty($age) && !empty($password)) {
            // Fais l'insertion en base
            $insertUserStatement = $db->prepare('INSERT INTO users (full_name, email, age, password) 
                                                VALUES (:full_name, :email, :age, :password)');
            $insertUserStatement->execute([
                'full_name' => $fullName,
                'email' => $email,
                'age' => $age,
                'password' => $password
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
        <title>Food - Inscription</title>

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
            <!-- MESSAGE DE SUCCES -->
            <?php include_once($rootPath . '/projects/food/header.php'); ?>

            <?php if (!isset($_POST['full_name']) && !isset($_POST['email']) && !isset($_POST['age']) && 
                        !isset($_POST['password'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Il vous faut soumettre le formulaire."; ?>
                </div>
            
            <?php else : ?>
                <?php if (empty($fullName) || empty($email) || empty($age) || empty($password)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>

                <?php else : ?>
                    <h1>Inscription réussie !</h1>
                
                    <div class="card">    
                        <div class="card-body">
                            <h5 class="card-title mb-3">Rappel de vos informations</h5>
                            <p class="card-text"><b>Nom</b> : <?php echo $fullName; ?></p>
                            <p class="card-text"><b>Email</b> : <?php echo strip_tags($email); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php include_once($rootPath . '/projects/food/footer.php'); ?>
    </body>
</html>
