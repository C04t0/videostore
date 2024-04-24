<?php

    declare(strict_types=1);

    namespace Entities;

    class Movie {
        private int $id;
        private string $title;
        private static array $idMap = array();

        private function __construct(int $id, string $title) {
            $this->id = $id;
            $this->title = $title;
        }
        public static function create(int $id, string $title) : Movie {
            if (!isset(self::$idMap[$id])) {
                self::$idMap[$id] = new self($id, $title);
            }
            return self::$idMap[$id];
        }
        public function getId() : int {
            return $this->id;
        }
        public function getTitle() : string {
            return $this->title;
        }
        public function setId(int $id) : void {
            $this->id = $id;
        }
        public function setTitle(string $title) : void {
            $this->title = $title;
        }
    }