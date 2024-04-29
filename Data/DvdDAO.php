<?php
    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Dvd;
    use Exceptions\DvdExistsException;
    use Exceptions\DvdNotFoundException;

    spl_autoload_register();
    $dbConn = new DbConnection();

    class DvdDAO {

        public function getAll() : ?array {
            global $dbConn;
            $list = array();
            $sql = 'select id, movie_id, rented from dvds order by id';
            $dbh = $dbConn->connect();

            $result = $dbh->query($sql);

            foreach ($result as $row) {
                $dvd = Dvd::create((int)$row["id"], (int)$row["movie_id"], (bool)$row["rented"]);
                $list[] = $dvd;
            }
            $dbh = null;

            return $list;
        }
        public function getById(int $id) : ?Dvd {
            global $dbConn;
            $sql = 'select id, movie_id, rented from dvds where id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $dbh = null;

            if (empty($row)) {
                return null;
            } else {
                return DVD::create((int)$row["id"], (int)$row["movie_id"], (bool)$row["rented"]);
            }
        }
        public function createDvd(int $id, int $movieId) : bool {
            if (!is_null($this->getById($id))) {
                throw new DvdExistsException();
            }
            global $dbConn;
            $sql = 'insert into dvds (id, movie_id, rented) values (:id, :movie_id, false)';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;

            return true;
        }
        public function deleteById(int $id) : bool {
            if (is_null($this->getById($id))) {
                throw new DvdNotFoundException();
            }
            global $dbConn;
            $sql = 'delete from dvds where id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;

            return true;
        }
        public function rentDvd(int $id) : void {
            global $dbConn;
            $sql = 'update dvds set rented = true where id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;
        }
        public function returnDvd(int $id) : void {
            global $dbConn;
            $sql = 'update dvds set rented = false where id = :id';
            $dbh = $dbConn->connect();

            $statement = $dbh->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            $dbh = null;
        }
    }