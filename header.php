<?php
include_once('variables.php');
?>


<header class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $rootUrl . '/projects/food/home.php'; ?>">Food</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" 
                        href="<?php echo $rootUrl . '/projects/food/home.php'; ?>">Accueil</a>
                </li>

                <?php if (!isset($loggedUser['email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" 
                            href="<?php echo $rootUrl . '/projects/food/users/create.php'; ?>">Inscription</a>
                    </li>
                <?php endif; ?>

                <?php if (!isset($loggedUser['email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" 
                            href="<?php echo $rootUrl . '/projects/food/users/login.php'; ?>">Connexion</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($loggedUser['email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" 
                            href="<?php echo $rootUrl . '/projects/food/recipes/create.php'; ?>">Ajouter une recette</a>
                    </li>
                <?php endif; ?>
        
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $rootUrl . '/projects/food/contact.php'; ?>">Contact</a>
                </li>

                <?php if (isset($loggedUser['email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" 
                            href="<?php echo $rootUrl . '/projects/food/users/logout.php'; ?>">Deconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
