<?php
    declare(strict_types=1);

    namespace Data;
    use Entities\Dvd;

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

    }