<?php
require 'Model.php';

class messages extends Model {

  public function createMessage ($pseudo_id, $conversation_id, $message) {

if ( $this -> connectDB ) {
    try {
        $sql = 'INSERT INTO messages
                (`pseudo_id`, `conversation_id`, `message`)
                VALUES ( ?, ?, ?)';
        $pdoStmnt = $this -> connectDB -> prepare( $sql );
        $pdoStmnt -> execute( [
            $pseudo_id,
            $conversation_id,
            $message,

         ] );

        return true;
    } catch ( \PDOException $e ) {
        return $e -> getMessage();
    }
} else {
    return false;
}
}

public function getMessage ( $id ) {

     if ( $this -> connectDB ) {
         try {
             $sql = 'SELECT * FROM messages WHERE id = :id';
             $pdoStmnt = $this -> connectDB -> prepare( $sql );
             $pdoStmnt -> execute( [
                 ':id' => $id,
              ] );
             return $pdoStmnt -> fetch();
         } catch ( \PDOException $e ) {
             return $e -> getMessage();
         }
     } else {
         return false;
     }
}
public function getAllMessagesOfConversation ($conversation_id ) {

    if ( $this -> connectDB ) {
        try {
            $sql = 'SELECT * FROM messages WHERE conversation_id = :conversation_id';
            $pdoStmnt = $this -> connectDB -> prepare( $sql );
            $pdoStmnt -> execute( [
                ':conversation_id' => $conversation_id,
             ] );

            return $pdoStmnt -> fetchAll();
        } catch ( \PDOException $e ) {
            return $e -> getMessage();
        }
    } else {
        return false;
    }
}

public function updateMessage ($id, $message, $date ) {

    if ( $this -> connectDB ) {
        try {
            $sql = 'UPDATE messages
                    SET message = ?,
                        date = ?
            WHERE id = ?';
            $pdoStmnt = $this -> connectDB -> prepare( $sql );
            $pdoStmnt -> execute( [
              $message,
              $date,
              $id
             ] );

            return true;
        } catch ( \PDOException $e ) {
            return $e -> getMessage();
        }
    } else {
        return false;
    }
}

public function deleteAllMessageOfConversation($conversation_id) {

    if ( $this -> connectDB ) {
        try {
            $sql = 'DELETE FROM messages WHERE conversation_id = :conversation_id';
            $pdoStmnt = $this -> connectDB -> prepare( $sql );
            $pdoStmnt -> execute( [
                ':conversation_id' => $conversation_id
             ] );
            return true;
        } catch ( \PDOException $e ) {
            return $e -> getMessage();
        }
    } else {
        return false;
    }
}

public function deleteAllMessagesOfUser($pseudo_id) {
    if ( $this -> connectDB ) {
        try {
            $sql = 'DELETE FROM messages WHERE pseudo_id = :pseudo_id';
            $pdoStmnt = $this -> connectDB -> prepare( $sql );
            $pdoStmnt -> execute( [
                ':pseudo_id' => $pseudo_id
             ] );

            return true;
        } catch ( \PDOException $e ) {
            return $e -> getMessage();
        }
    } else {
        return false;
    }
}

public function deleteMessage ( $id ) {

    if ( $this -> connectDB ) {
        try {
            $sql = 'DELETE FROM messages WHERE id = :id';
            $pdoStmnt = $this -> connectDB -> prepare( $sql );
            $pdoStmnt -> execute( [
                ':id' => $id
             ] );

            return true;
        } catch ( \PDOException $e ) {
            return $e -> getMessage();
        }
    } else {
        return false;
    }
}

}

?>
