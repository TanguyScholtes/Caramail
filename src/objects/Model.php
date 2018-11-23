<?php

class Model {
    /*
     * Model Class
     * Model is the common "base" class used by all other classes of the app
     * It is used for all things these classes have in common (ie. database connection)
     */

    protected $connectDB = null;

    public function __construct () {
        /*
         * Connection to database
         * @param none
         * @return A PDO object representing a connection to database in $connectDB if successfull, else throw error message
         */

        //get database configuration in db.ini
        $dbConfig = parse_ini_file( DATABASE_CONFIG );

        $pdoDsn = $dbConfig[ 'driver' ] . ':dbname=' . $dbConfig[ 'dbname' ] . ';host=' . $dbConfig[ 'host' ];
        $pdoUsername = $dbConfig[ 'username' ];
        $pdoPassword = $dbConfig[ 'password' ];
        $pdoOptions = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        //connection to database
        try {
            //connect to database with given configuration & options
            $this -> connectDB = new \PDO( $pdoDsn, $pdoUsername, $pdoPassword, $pdoOptions );
            $this -> connectDB -> exec( 'SET CHARACTER SET utf8mb4' );
            $this -> connectDB -> exec( 'SET NAMES utf8mb4' );
        } catch ( \PDOException $e ) {
            //if connection fails, stop process & return error message
            die( $e -> getMessage() );
        }
    }
}
