<?php

class Reaction extends Model {

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
                        ( `author_id`, `message_id`, `emoji` )
                        VALUES ( ?, ?, ? )';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    $authorId,
                    $messageId,
                    $emoji
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

    public function getReaction ( $id ) {
        /*
         * Get Reaction based on its ID
         * @param integer $id The id of the Reaction to get
         * @return object The Reaction with given ID
         */

         if ( $this -> connectDB ) {
             //if connection to database was successfull
             try {
                 //define sql request with jokers ':variable'
                 $sql = 'SELECT * FROM reactions WHERE id = :id';
                 //prepare sql request
                 $pdoStmnt = $this -> connectDB -> prepare( $sql );
                 //execute prepared request while replacing jokers with variables values
                 $pdoStmnt -> execute( [
                     ':id' => $id,
                  ] );

                  //return the first Reaction with matching ID
                 return $pdoStmnt -> fetch();
             } catch ( \PDOException $e ) {
                 //if the request failed, stop request & return error message
                 return $e -> getMessage();
             }
         } else {
             //if connection to database failed
             return false;
         }
    }

    public function getAllReactionsOfMessage ( $messageId ) {
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
         *
         * DO NOT US THIS METHOD AS IT HAS BEEN DEPRECATED
         * Users just want to remove an old reaction and pick a new one
         * Not go through the struggle of editing through a form
         * This method is solely for the sake of having
         * a full CRUD methodology for the object
         *
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
                        SET author_id = ?,
                            message_id = ?,
                            emoji = ?
        				WHERE id = ?';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    $authorId,
                    $messageId,
                    $emoji,
                    $id
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

    public function deleteAllReactionsOfMessage( $id ) {
        /*
         * Delete All Reactions of Message with matching ID
         * @param integer $id The id of the Message with all Reactions to be deleted
         * @return boolean true
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'DELETE FROM reactions WHERE message_id = :id';
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

    public function deleteAllReactionsOfUser( $id ) {
        /*
         * Delete All Reactions of Message with matching ID
         * @param integer $id The id of the Author of all Reactions to be deleted
         * @return boolean true
         */

        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'DELETE FROM reactions WHERE author_id = :id';
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
