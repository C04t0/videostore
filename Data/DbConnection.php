<?php

    declare(strict_types=1);

    namespace Data;

    use PDO;
    use PDOException;

    class DbConnection {
        private string $dsn = 'mysql:host=localhost;port=3306;dbname=cursusphp;charset=utf8';
        private string $username = 'root';
        private string $password = '';

        public function connect() : ?PDO {
            try {
                return new PDO($this->dsn, $this->username, $this->password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return null;
        }
    }