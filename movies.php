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
                header("Location: findDvd.php");
                break;
            case 'addMovie':
                header("Location: addMovie.php");
                break;
            case 'addDvd':
                header("Location: addDvd.php");
                break;
            case 'deleteMovie':
                header("Location: deleteMovie.php");
                break;
            case 'deleteDvd':
                header("Location: deleteDvd.php");
                break;
            case 'returnDvd':
            case 'rentDvd':
                header("Location: rentReturnDvd.php");
                break;
        }
    } else {
        include "Presentation/home.php";
    }