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
        header("Refresh: 10; url=addDvd.php");
        try {
            $success = $movieService->addDvd((int)$_POST['dvdId'], (int)$_POST['movieId']);
            include "Presentation/addDvdForm.php";
            /* header("Location: /Presentation/addDvdForm.php?success=true"); */
            exit(0);
        } catch (DvdExistsException $e) {
            $error = "dvdIdExists";
            include "Presentation/addDvdForm.php";
            /* header("Location: /Presentation/addDvdForm.php?error=dvdIdExists"); */
            exit(0);
        } catch (PDOException $e) {
            $error = "dvdMovieIdInvalid";
            include "Presentation/addDvdForm.php";
        }
    } else {
        include "Presentation/addDvdForm.php";
    }