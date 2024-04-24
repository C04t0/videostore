<?php

    declare(strict_types=1);
    namespace Entities;

    class Dvd {
        private int $id;
        private Movie $movie ;
        private bool $rented;

        public function __construct(int $id, Movie $movie, bool $rented) {
            $this->id = $id;
            $this->movie = $movie;
            $this->rented = $rented;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getMovie(): Movie {
            return $this->movie;
        }
        public function isRented(): bool {
            return $this->rented;
        }
        public function setId(int $id) : void {
            $this->id = $id;
        }
        public function setRented(bool $rented) : void {
            $this->rented = $rented;
        }
        public function setMovie(Movie $movie) : void {
            $this->movie = $movie;
        }
    }