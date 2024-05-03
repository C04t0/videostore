<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $success = false;
    $movieService = new MovieService();
    $dvdList = $movieService->getAllDvds();

    if (isset($_GET['action']) && $_GET['action'] == "process") {
        $success = $movieService->deleteDvd((int)$_POST['idSelect']);
        include "Presentation/deleteDvdForm.php";
        exit(0);
    } else {
        include "Presentation/deleteDvdForm.php";
    }