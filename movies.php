<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $movieService = new MovieService();

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "showAllMovies":
                $movieList = $movieService->getAllMovies();
                include "Presentation/showAllMovies.php";
                break;
            case "addMovie":
                include "Presentation/addMovie.php";
                break;
            case "findMovie":
                include "Presentation/findMovie.php";
                break;
            case "addDvd":
                include "Presentation/addDvd.php";
                break;
            case "deleteMovie":
                include "Presentation/deleteMovie.php";
                break;
            case "deleteDvd":
                include "Presentation/deleteDvd.php";
                break;
            case "rentDvd":
                include "Presentation/rentDvd.php";
                break;
            case "returnDvd":
                include "Presentation/returnDvd.php";
                break;
            default:
                include "Presentation/home.php";
                break;
        }
    } else {
        include "Presentation/home.php";
    }
