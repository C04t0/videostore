<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $success = false;
    $movieService = new MovieService();
    $movieList = $movieService->getAllMovies();

    if (isset($_GET['action']) && $_GET['action'] == "process") {
        $success = $movieService->deleteMovie($_POST['titleSelect']);
        header("Refresh: 10, url=deleteMovie.php");
        include "Presentation/deleteMovieForm.php";
        exit(0);
    } else {
        include "Presentation/deleteMovieForm.php";
    }
