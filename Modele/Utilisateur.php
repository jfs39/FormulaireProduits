
<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele {


    public function connecter($login, $mdp)
    {
        $sql = "select identifiant,id from utilisateurs where nom=? and mot_de_passe=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    public function getUtilisateur($login, $mdp)
    {
        $sql = "select identifiant as idUtilisateur, nom as login, mot_de_passe as mdp, id 
            from utilisateurs where nom=? and mot_de_passe=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1){
         $utilisateurCourant = $utilisateur->fetch();
         $_SESSION['id'] = $utilisateurCourant['id'];
            return $utilisateurCourant;  // Accès à la première ligne de résultat
        }else{
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
}

}