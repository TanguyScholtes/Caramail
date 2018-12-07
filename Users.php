<?php
class User {
    public $bdd=null;
    function __construct(){
        try {
            $this->bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8mb4', 'messenger', 'messenger');
        }
        catch (PDOException $error){
            die($error->getMessage());
        }
    }
    function createUser($pseudo, $nom, $prenom, $email, $pass){
        if($this->bdd){
        try{
            $sql = "INSERT INTO users (`pseudo`, `nom`, `prenom`, `mail`, `password`) VALUES('$pseudo', '$nom', '$prenom', '$email', '$pass')";
            $result = $this->bdd->query($sql);
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
        $req= $this->bdd->prepare("SELECT id, password FROM users WHERE pseudo = ?");
        $req->execute(array($pseudo));
        $resultat= $req->fetch();
        $isPasswordCorrect= password_verify($psw, $resultat['password']);
    
        if(!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe!';
        }
        else{
            if($isPasswordCorrect){
                session_start();
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
        $insertnew= $this->bdd->prepare("UPDATE users SET pseudo = ?, prenom = ?, nom = ?, mail=?, password=? WHERE id=?");
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
        $delete=$this->bdd->query($req);
        }
        catch (PDOException $error){
            die($error->getMessage());
        }
    }
}