<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;
    use Exceptions\MovieExistsException;

    $movieService = new MovieService();

    if (isset($_GET['action']) && $_GET['action'] == 'process') {
        try {
            $movieService->addMovie($_POST['title']);
            header("Location: Presentation/addMovieForm.php?success=true");
            exit(0);
        } catch (MovieExistsException $e) {
            header('Location: Presentation/addMovieForm.php?error=movieExists');
            exit(0);
        }
    } else {
        header( 'Location: Presentation/addMovieForm.php');
        exit(0);
    }