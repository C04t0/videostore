<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $success = null;
    $movieService = new MovieService();

    if (isset($_GET['action']) && $_GET['action'] == "rent") {
        $movieService->rentDvd($_POST['id']);
        $success = "rent";
        include "Presentation/rentReturnDvdForm.php";
        /* header("Location: Presentation/rentReturnDvdForm.php?success=rent"); */
        exit(0);
    } else if (isset($_GET['action']) && $_GET['action'] == "return") {
        $movieService->returnDvd($_POST['id']);
        $success = "return";
        include "Presentation/returnReturnDvdForm.php";
        /* header("Location: Presentation/rentReturnDvdForm.php?success=return"); */
        exit(0);
    } else {
        include "Presentation/rentReturnDvdForm.php";
    }