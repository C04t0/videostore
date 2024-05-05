<?php

    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\DvdExistsException;

    $error = null;
    $success = false;
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();
    $movieList = $movieService->getAllMovies();

    if (isset($_GET['action']) && $_GET['action'] == "process") {
        try {
            $success = $movieService->addDvd((int)$_POST['dvdId'], (int)$_POST['movieId']);
            header("Refresh: 10; url=addDvd.php");
            include "Presentation/addDvdForm.php";
            /* header("Location: /Presentation/addDvdForm.php?success=true"); */
            exit(0);
        } catch (DvdExistsException $e) {
            $error = "dvdIdExists";
            header("Refresh: 10; url=addDvd.php");
            include "Presentation/addDvdForm.php";
            /* header("Location: /Presentation/addDvdForm.php?error=dvdIdExists"); */
            exit(0);
        }
    } else {
        include "Presentation/addDvdForm.php";
    }