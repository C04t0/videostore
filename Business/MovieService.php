<?php

    declare(strict_types = 1);

    namespace Business;

    use Data\DvdDAO;
    use Data\MovieDAO;

    $dvdDAO = new DvdDAO();
    $movieDAO = new MovieDAO();

    class MovieService {

        public function getAllMovies() : ?array {
            global $movieDAO;
            return $movieDAO->getAll();
        }
        public function getDvdsByMovieId(int $id) : ?array {
            global $dvdDAO;
            return $dvdDAO->findDvdsByMovieId($id);
        }
        public function getAvailableCopies() : int {
            global $movieDAO;
            global $dvdDAO;
            $movieList = $movieDAO->getAll();
            $available = 0;

            foreach ($movieList as $movie) {
                $dvdList = $dvdDAO->findDvdsByMovieId($movie->getId());
                foreach ($dvdList as $dvd) {
                    if (!$dvd->isRented()) {
                        $available++;
                    }
                }
            }

            return $available;
        }
        public function addMovie(string $title) : void {
            global $movieDAO;
            $movieDAO->addMovie($title);
        }
    }