<?php
    declare(strict_types=1);

    namespace Data;
    use Entities\Movie;

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
    }