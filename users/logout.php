<?php
session_start();
session_destroy();

header('Location: /projects/food/home.php');
