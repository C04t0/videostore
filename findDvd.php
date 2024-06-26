<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\DvdNotFoundException;

    $error = null;
    $movie = null;
    $success = null;
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();


    if (isset($_GET['action']) && $_GET['action'] == "process") {
        try {
            $dvdSelect = $movieService->getDvd((int)$_POST['idSelect']);
            $movie = $movieService->getMovie($dvdSelect->getMovieId());
            $success = true;
            if (is_null($movie)) {
                $success = false;
                $error = "invalidId";
            }
            include "Presentation/findDvdForm.php";
        } catch (DvdNotFoundException $e) {
            $error = "dvdNotFound";
            include "Presentation/findDvdForm.php";
        }
    } else {
        include "Presentation/findDvdForm.php";
    }