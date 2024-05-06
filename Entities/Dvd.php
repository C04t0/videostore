<?php

    declare(strict_types=1);
    namespace Entities;

    class Dvd {
        private int $id;
        private int $movieId;
        private bool $rented;
        private static array $idMap = array();

        private function __construct(int $id, int $movieId, bool $rented) {
            $this->id = $id;
            $this->movieId = $movieId;
            $this->rented = $rented;
        }
        public static function create(int $id, int $movieId, bool $rented): Dvd {
            if (!isset(self::$idMap[$id])) {
                self::$idMap[$id] = new self($id, $movieId, $rented);
            }
            return self::$idMap[$id];
        }
        public function getId(): int {
            return $this->id;
        }
        public function getMovieId() : int {
            return $this->movieId;
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
        public function setMovie(int $movieId) : void {
            $this->movieId = $movieId;
        }
    }


