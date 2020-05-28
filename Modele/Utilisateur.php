
<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele {


    public function connecter($login, $mdp)
    {
        $sql = "select identifiant from utilisateurs where nom=? and mot_de_passe=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }



    public function getUtilisateur($login, $mdp)
    {
        $sql = "select identifiant as idUtilisateur, nom as login, mot_de_passe as mdp 
            from utilisateurs where nom=? and mot_de_passe=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

}