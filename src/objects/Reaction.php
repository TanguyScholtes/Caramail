<?php

class Reaction {
    /*
     * Reaction Class
     * Reactions are emojis used by users as reactions to other users' messages
     */

    protected $connectDB = null;

    public function __construct () {
        /*
         * Connection to database
         * @param none
         * @return A connection to database in $connectDB if successfull, else throw error message
         */

        //get database configuration in db.ini
        $dbConfig = parse_ini_file( 'db.ini' );

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
            $this -> connectDB -> exec( 'SET CHARACTER SET UTF8' );
            $this -> connectDB -> exec( 'SET NAMES UTF8' );
        } catch ( \PDOException $e ) {
            //if connection fails, stop process & return error message
            die( $e -> getMessage() );
        }
    }

    public function createReaction ( $authorId, $messageId, $emoji ) {
        /*
         * Creates a Reaction and save it in database
         * @param integer $authorId The id of the user who created this Reaction
         * @param integer $messageId The id of the message to which the user reacted
         * @param integer $emoji The Reaction's emoji to display
         * @return boolean true
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'INSERT INTO reactions
                        ( `id`, `author_id`, `message_id`, `emoji` )
                        VALUES ( NULL, :authorId, :messageId, :emoji )';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    ':author_id' => $authorId,
                    ':message_id' => $messageId,
                    ':emoji' => $emoji
                 ] );

                 //return true to inform the creation went well
                return true;
            } catch ( \PDOException $e ) {
                //if the request failed, stop request & return error message
                return $e -> getMessage();
            }
        } else {
            //if connection to database failed
            return false;
        }
    }

    public function getMessageAllReactions ( $messageId ) {
        /*
         * Get all Reactions from Message, based on Message ID
         * @param integer $messageId The id of the message whose Reaction this is
         * @return array An array of Reaction objects
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'SELECT * FROM reactions WHERE message_id = :messageId';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    ':messageId' => $messageId,
                 ] );

                 //return an array of all matching Reactions
                return $pdoStmnt -> fetchAll();
            } catch ( \PDOException $e ) {
                //if the request failed, stop request & return error message
                return $e -> getMessage();
            }
        } else {
            //if connection to database failed
            return false;
        }
    }

    public function updateReaction ( $id, $authorId, $messageId, $emoji ) {
        /*
         * Update Reaction with matching ID
         * @param integer $id The id of the Reaction to update
         * @param integer $authorId The id of the author of the Reaction
         * @param integer $messageId The id of the message whose Reaction this is
         * @param integer $emoji The Reaction's emoji to display
         * @return boolean true
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'UPDATE reactions
                        SET author_id = :authorId,
                            message_id = :messageId,
                            emoji = :emoji
        				WHERE id = :id';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    ':id' => $id,
                    ':author_id' => $authorId,
                    ':message_id' => $messageId,
                    ':emoji' => $emoji
                 ] );

                 //return true to inform the update went well
                return true;
            } catch ( \PDOException $e ) {
                //if the request failed, stop request & return error message
                return $e -> getMessage();
            }
        } else {
            //if connection to database failed
            return false;
        }
    }

    public function deleteReaction ( $id ) {
        /*
         * Delete Reaction with matching ID
         * @param integer $id The id of the Reaction to delete
         * @return boolean true
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'DELETE FROM reactions WHERE id = :id';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    ':id' => $id
                 ] );

                 //return true to inform the deletion went well
                return true;
            } catch ( \PDOException $e ) {
                //if the request failed, stop request & return error message
                return $e -> getMessage();
            }
        } else {
            //if connection to database failed
            return false;
        }
    }
}
