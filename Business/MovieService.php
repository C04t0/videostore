<?php

    declare(strict_types = 1);

    namespace Business;
    use Data\DvdDAO;
    use Data\MovieDAO;

    $movieDAO = new MovieDAO();
    $dvdDAO = new DvdDAO();

    class MovieService {

        public function getAllMovies(): ?array {
            global $movieDAO;
            return $movieDAO->getAll();
        }

        public function getAllDvds() : ?array {
            global $dvdDAO;
            return $dvdDAO->getAll();
        }
    }