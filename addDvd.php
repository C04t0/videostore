<?php

    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\DvdExistsException;

    $movieService = new MovieService();

    if (isset($_GET['action']) && $_GET['action'] == "process") {
        try {
            $movieService->addDvd($_POST['dvdId'], $_POST['movieId']);
            header("Location: /Presentation/addDvdForm.php?success=true");
            exit(0);
        } catch (DvdExistsException $e) {
            header("Location: /Presentation/addDvdForm.php?error=dvdIdExists");
            exit(0);
        }
    } else {
        $movieList = $movieService->getAllMovies();
        include "Presentation/addDvdForm.php";
    }