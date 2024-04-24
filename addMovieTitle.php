<?php
    declare(strict_types=1);

    use Business\MovieService;
    use Exceptions\MovieExistsException;

    $movieService = new MovieService();

    if (!empty($_POST)) {
        var_dump($_POST);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'process') {
        try {
            global $movieService;
            $movieService->addMovie($_POST['title']);
            header("location: ../addMovie.php?success=true");
            exit(0);
        } catch (MovieExistsException $e) {
            header("location: ../addMovie.php?error=movieExists");
            exit(0);
        }
    } else {
        include "Presentation/addMovie.php";
    }
