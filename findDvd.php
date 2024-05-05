<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\DvdNotFoundException;

    $error = null;
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();


    if (isset($_GET['action']) && $_GET['action'] == "process") {
        $dvd = $movieService->getDvd((int)$_POST['idSelect']);
        if (is_null($dvd)) {
            $error = "dvdNotFound";
            include "Presentation/findDvdForm.php";
        } else {
            $movieList = $movieService->getMovie($dvd->getMovieId());
            include "Presentation/showAllMovies.php";
        }
    } else {
        include "Presentation/findDvdForm.php";
    }