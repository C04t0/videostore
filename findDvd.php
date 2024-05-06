<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\DvdNotFoundException;

    $error = null;
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();


    if (isset($_GET['action']) && $_GET['action'] == "process") {
        try {
            $dvd = $movieService->getDvd((int)$_POST['idSelect']);
            $movieList = $movieService->getMovie($dvd->getMovieId());
            include "Presentation/showAllMovies.php";
        } catch (DvdNotFoundException $e) {
            $error = "dvdNotFound";
            include "Presentation/findDvdForm.php";
        }
    } else {
        include "Presentation/findDvdForm.php";
    }