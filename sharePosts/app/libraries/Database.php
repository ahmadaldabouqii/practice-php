<?php
/*
 * PDO Database Class
 * Connect to database
 * Create Prepared statements
 * Bind values
 * Return rows and results
*/

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $pdo;
    private $statement;
    private $error;

    public function __construct() {
        // Set DSN (Data Source Name)
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $options = array (PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->pdo = new PDO ($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $err) {
            $this->error = $err->getMessage();
            echo $this->error;
        }
    }

    // prepare statement with query
    public function query($sql) {
        $this->statement = $this->pdo->prepare($sql);
    }

    // Bind Values
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value): $type = PDO::PARAM_INT;
                    break;
                case is_bool($value): $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): $type = PDO::PARAM_NULL;
                    break;
                default: $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->statement->execute();
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount() {
        return $this->statement->rowCount();
    }
}
