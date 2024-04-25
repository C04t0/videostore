<?php

    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $movieService = new MovieService();

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'showAll':
                $movieList = $movieService->getAllMovies();
                $dvdList = $movieService->getAllDvds();
                include "Presentation/showAllMovies.php";
                break;
        }
    } else {
        include "Presentation/home.php";
    }