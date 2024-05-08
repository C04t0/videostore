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
            case 'findDvd':
                include "findDvd.php";
                break;
            case 'addMovie':
                include "addMovie.php";
                break;
            case 'addDvd':
                include "addDvd.php";
                break;
            case 'deleteMovie':
                include "deleteMovie.php";
                break;
            case 'deleteDvd':
                include "deleteDvd.php";
                break;
            case 'rentDvd':
                include "rentDvd.php";
                break;
            case 'returnDvd':
                include "returnDvd.php";
                break;
            default:
                include "Presentation/home.php";
                break;
        }
    } else {
        include "Presentation/home.php";
    }