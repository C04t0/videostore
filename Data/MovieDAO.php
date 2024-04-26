<?php
    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Movie;
    use Exceptions\MovieExistsException;

    spl_autoload_register();
    $dbConn = new DbConnection();

    class MovieDAO {

        public function getAll() : ?array {
            global $dbConn;
            $list = array();
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
            $dbh = null;

            if (empty($row)) {
                return null;
            } else {
                return Movie::create((int)$row['id'], $row['title']);

            }
        }
        public function getByTitle(string $title) : ?Movie {
            global $dbConn;
            $sql = 'select id, title from movies WHERE title = :title';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if (empty($row)) {
                return null;
            } else {
                $movie = Movie::create((int)$dbh->lastInsertId(), $row['title']);
                $dbh = null;
                return $movie;
            }
        }
        public function createMovie(string $title) : void {
            if (!is_null($this->getByTitle($title))) {
                throw new MovieExistsException();
            }
            global $dbConn;
            $sql = 'insert into movies (title) values (:title)';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->execute();

            $dbh = null;
        }
    }