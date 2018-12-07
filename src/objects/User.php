<?php
class User extends Model{

    function createUser($pseudo, $nom, $prenom, $email, $pass){
        if($this->connectDB){
        try{
            $sql = "INSERT INTO users (`pseudo`, `nom`, `prenom`, `mail`, `password`) VALUES('$pseudo', '$nom', '$prenom', '$email', '$pass')";
            $result = $this->connectDB->query($sql);
        }

        catch (PDOException $error){
            return $error->getMessage();
        }

    }
    else {
        return false;
    }
}
    function connect($psw, $pseudo){

        if(!empty($psw) AND !empty($pseudo)){
        $req= $this->connectDB->prepare("SELECT id, password FROM users WHERE pseudo = ?");
        $req->execute(array($pseudo));
        $resultat= $req->fetch();
        $isPasswordCorrect= password_verify($psw, $resultat['password']);

        if(!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe!';
        }
        else{
            if($isPasswordCorrect){
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;

            }
            else {
                echo 'Mauvais identifiant ou mot de passe';
            }
        }
        }

    }
    function edit($id, $pseudo, $nom, $prenom, $email, $pass){
        $insertnew= $this->connectDB->prepare("UPDATE users SET pseudo = ?, prenom = ?, nom = ?, mail=?, password=? WHERE id=?");
        $insertnew->execute(array($pseudo, $prenom, $nom, $email, $pass, $id));
    }
    function disconnect(){
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

    }
    function erase($id){
        try{
        $req="DELETE FROM users WHERE id='$id'";
        $delete=$this->connectDB->query($req);
        }
        catch (PDOException $error){
            die($error->getMessage());
        }
    }

    function addUserToConversation ( $userId, $conversationId ) {
        if ( $this -> connectDB ) {
            //if connection to database was successfull
            try {
                //define sql request with jokers ':variable'
                $sql = 'INSERT INTO users_conversations
                        ( `user_id`, `conversation_id` )
                        VALUES ( ?, ? )';
                //prepare sql request
                $pdoStmnt = $this -> connectDB -> prepare( $sql );
                //execute prepared request while replacing jokers with variables values
                $pdoStmnt -> execute( [
                    $userId, $conversationId
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

    function getUserByMail( $email ) {
        if ( $this -> connectDB ) {
            try{
                $sql = "SELECT id FROM users WHERE mail = ?";
                $request = $this -> connectDB -> prepare( $sql );
                $request -> execute( [
                    $email
                ] );
                return $request -> fetch();
            } catch ( PDOException $error ) {
                return $error -> getMessage();
            }
        } else {
            return false;
        }
    }
    function getAllUsersByConversation($id){
        try{
            $req= "SELECT users.pseudo, users.id FROM users
                JOIN users_conversations ON users.id = users_conversations.user_id
                WHERE users_conversations.conversation_id='$id'
                ORDER BY users.pseudo";
        $exec= $this->connectDB->query($req);
        return $exec->fetchAll();
    }
        catch(PDOException $error){
            return $error -> getMessage();
        }

    }
    function getUser($id){
        $req= "SELECT pseudo, avatar, id, nom, prenom, mail FROM users WHERE id='$id'";
        $exec= $this->connectDB->query($req);
        return $exec->fetch();
    }
}
