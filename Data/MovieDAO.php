<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Movie;
    use Exceptions\MovieExistsException;

    $dbConn = new DbConnection();

    class MovieDAO {

        public function getAll() : ?array {
            $list = array();
            global $dbConn;
            $sql = 'select id, title from movies order by title';
            $dbh = $dbConn->connect();

            $result = $dbh->query($sql);

            foreach ($result as $row) {
                $movie = Movie::create((int)$row['id'], $row['title']);
                $list[] = $movie;
            }
            $dbh = null;

            return $list;
        }
        public function getById(int $id) : ?Movie {
            global $dbConn;
            $sql = 'select id, title from movies WHERE id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $movie = Movie::create((int)$row['id'], $row['title']);
            $dbh = null;

            return $movie;
        }
        public function getMovieByTitle(string $title) : ?Movie {
            global $dbConn;
            $sql = 'select id, title from movies WHERE title = :title';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $movie = Movie::create((int)$row['id'], $row['title']);
            $dbh = null;

            return $movie;
        }
        public function removeMovie(string $title) : bool {
            global $dbConn;
            $movie = $this->getMovieByTitle($title);
            $dvdDAO = new DvdDAO();

            $dbh = $dbConn->connect();
            $sql = 'delete from movies where title = :title';

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->execute();

            $dvdDAO->deleteDvdsByMovieId($movie->getId());
            $dbh = null;

            if (is_null($this->getMovieByTitle($title))) {
                return true;
            }
            return false;
        }
        public function addMovie(string $title) : bool {
            global $dbConn;

            if (!is_null($this->getMovieByTitle($title))) {
                throw new MovieExistsException();
            }

            $dbh = $dbConn->connect();
            $sql = 'insert into movies (title) values (:title)';
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->execute();
            $dbh = null;

            if (is_null($this->getMovieByTitle($title))) {
                return false;
            }
            return true;
        }
    }