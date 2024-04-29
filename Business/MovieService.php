<?php

    declare(strict_types = 1);

    namespace Business;
    use Data\DvdDAO;
    use Data\MovieDAO;
    use Entities\Dvd;
    use Entities\Movie;

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
        public function getMovie(int $id): ?Movie {
            global $movieDAO;
            return $movieDAO->getById($id);
        }
        public function getDvd(int $id) : ?Dvd {
            global $dvdDAO;
            return $dvdDAO->getById($id);
        }
        public function addMovie(string $title) : bool {
            global $movieDAO;
            return $movieDAO->createMovie($title);
        }
        public function addDvd(int $id, int $movieId) : bool {
            global $dvdDAO;
            return $dvdDAO->createDvd($id, $movieId);
        }
        public function deleteMovie(int $id) : void {
            global $movieDAO;
            $movieDAO->deleteById($id);
        }
        public function deleteDvd(int $id) : void {
            global $dvdDAO;
            $dvdDAO->deleteById($id);
        }
        public function rentDvd($id) {
            global $dvdDAO;
            $dvdDAO->rentDvd($id);
        }
        public function returnDvd($id) {
            global $dvdDAO;
            $dvdDAO->returnDvd($id);
        }
    }