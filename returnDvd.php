<?php
    declare(strict_types=1);
    spl_autoload_register();

    use Business\MovieService;

    $success = false;
    $movieService = new MovieService();

    foreach ($movieService->getAllDvds() as $dvd) {
        if ($dvd->isRented()) {
            $dvdReturnList[] = $dvd;
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'process') {
        $success = $movieService->returnDvd((int)$_POST['dvdSelect']);
        header("Refresh: 10, url=returnDvd.php");
        include "Presentation/returnDvdForm.php";
        /* header("Location: Presentation/rentDvdForm.php?success=return"); */
        exit(0);
    } else {
        include "Presentation/returnDvdForm.php";
    }