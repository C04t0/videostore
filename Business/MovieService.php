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
        public function getMovieByTitle(string $title) : ?Movie {
            global $movieDAO;
            return $movieDAO->getByTitle($title);
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
        public function deleteMovie(string $title) : bool {
            global $dvdDAO;
          global $movieDAO;
          $movie = $movieDAO->getByTitle($title);
          foreach ($dvdDAO->getByMovieId($movie->getId()) as $dvd) {
              $dvdDAO->deleteById($dvd->getId());
          }
          return $movieDAO->deleteMovieByTitle($title);
        }
        public function deleteDvd(int $id) : bool {
            global $dvdDAO;
            return $dvdDAO->deleteById($id);
        }
        public function rentDvd($id) : bool {
            global $dvdDAO;
            return $dvdDAO->rentDvd($id);
        }
        public function returnDvd($id) : bool {
            global $dvdDAO;
            return $dvdDAO->returnDvd($id);
        }
    }