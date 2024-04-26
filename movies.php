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
                $dvdList = $movieService->getAllDvds();
                include "Presentation/findDvdForm.php";
                break;
            case 'addMovie':
                include "Presentation/addMovieForm.php";
                break;
            case 'addDvd':
                $movieList = $movieService->getAllMovies();
                include "Presentation/addDvdForm.php";
                break;
        }
    } else {
        include "Presentation/home.php";
    }