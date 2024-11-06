<?php
namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateurs', 'id');
    }

    public function existeUser($mail,$pass): string {
        $stmt = $this->getPdo()->prepare("SELECT * FROM utilisateurs WHERE mail = ? AND passw = ? ");
        $stmt->execute([$mail,$pass]);
        $ligne = $stmt->fetchAll(\PDO::FETCH_OBJ);
        if ($ligne){
            return $ligne[0]->mail;
        }
        else {
            return 'inconnu';
        }
        
    }

    public function updatePassId() {
        $id1 = 1; 
        $passH1 = password_hash("p1", PASSWORD_BCRYPT);
    
        $id2 = 2; 
        $passH2 = password_hash("p2", PASSWORD_BCRYPT);
        $stmt = $this->getPdo()->prepare("UPDATE utilisateurs SET passhash = ? WHERE id = ?");
        $stmt->execute([$passH1, $id1]); 
        $stmt->execute([$passH2, $id2]);
    }

    public function existeUserH($mail, $pass) {
        $stmt = $this->getPdo()->prepare("SELECT mail, passhash FROM utilisateurs WHERE mail = ?");
        $stmt->execute([$mail]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);
        
        if ($user && password_verify($pass, $user->passhash)) {
            return $user->mail;
        }
        return 'inconnu';
    }
}