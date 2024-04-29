<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\MovieExistsException;

    $error = null;
    $success = false;
    $movieService = new MovieService();

    if (isset($_GET['action']) && $_GET['action'] == 'process') {
        try {
            $success = $movieService->addMovie($_POST['title']);
            include "Presentation/addMovieForm.php";
            /* header("Location: /Presentation/addMovieForm.php?success=true"); */
            exit(0);
        } catch (MovieExistsException $e) {
            $error = "movieExists";
            include "Presentation/addMovieForm.php";
            /* header('Location: /Presentation/addMovieForm.php?error=movieExists'); */
            exit(0);
        }
    } else {
        $dvdList = $movieService->getAllDvds();
        include "Presentation/addMovieForm.php";
    }