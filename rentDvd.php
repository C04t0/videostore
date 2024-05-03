<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $success = null;
    $dvdRentList = array();
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();
    $movieList = $movieService->getAllMovies();

    foreach ($movieService->getAllDvds() as $dvd) {
        if (!$dvd->isRented()) {
            $dvdRentList[] = $dvd;
        }
    }
    if (isset($_GET['action']) && $_GET['action'] == 'rent') {
        $movieService->rentDvd((int)$_POST['dvdRentSelect']);
        $success = "true";
        include "Presentation/rentDvdForm.php";
        /* header("Location: Presentation/rentDvdForm.php?success=rent"); */
        exit(0);
    } else {
        include "Presentation/rentDvdForm.php";
    }
