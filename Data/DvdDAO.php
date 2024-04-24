<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Dvd;
    use Exceptions\DvdExistsException;

    $dbConn = new DbConnection();
    $movieDAO = new MovieDAO();

    class DvdDAO {

        public function getById(int $id) : ?Dvd {
           global $dbConn;
           global $movieDAO;
           $sql = 'select id, movie_id, rented from dvds where id = :id';
           $dbh = $dbConn->connect();

           $statement = $dbh->prepare($sql);
           $statement->bindParam(':id', $id, PDO::PARAM_INT);
           $statement->execute();
           $row = $statement->fetch(PDO::FETCH_ASSOC);

           $dvd = new Dvd((int)$row['id'], $movieDAO->getById($row['movie_id']), $row['rented']);
           $dbh = null;

           return $dvd;
        }
        public function findDvdsByMovieId(int $id) : ?array {
            global $dbConn;
            global $movieDAO;
            $list = array();
            $sql = 'select id, movie_id, rented
                    from dvds
                    where movie_id = :movie_id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':movie_id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $dvd = new Dvd((int)$row['id'], $movieDAO->getById((int)$row['movie_id']), (bool)$row['rented']);
                $list[] = $dvd;
            }
            $dbh = null;

            return $list;
        }
        public function addDvd(int $id, int $movieId) {
            global $dbConn;

            if (!is_null($this->getById($id))) {
                throw new DvdExistsException();
            }

            $dbh = $dbConn->connect();
            $sql = 'insert into dvds (id, movie_id, rented) values (:id, :movie_id, false)';
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
            $statement->execute();
            $dbh = null;

            if (is_null($this->getById($id))) {
                return false;
            }
            return true;
        }
        public function deleteDvdsByMovieId(int $id) : bool {
            global $dbConn;
            $sql = 'delete from dvds where movie_id = :movie_id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':movie_id', $id, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;

            if (is_null($this->findDvdsByMovieId($id))) {
                return true;
            }
            return false;
        }
        public function deleteDvdById(int $id) : bool {
            global $dbConn;
            $sql = 'delete from dvds where id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;

            if (is_null($this->getById($id))) {
                return true;
            }
            return false;
        }
    }