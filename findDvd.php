<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $movieService = new MovieService();

    if (isset($_GET['action']) && $_GET['action'] == "process") {
        $dvd = $movieService->getDvd((int)$_POST['idSelect']);
        $movieList = $movieService->getMovie($dvd->getMovieId());
        $dvdList = $movieService->getAllDvds();
        include "Presentation/showAllMovies.php";
    } else {
        $dvdList = $movieService->getAllDvds();
        include "Presentation/findDvdForm.php";
    }