<?php
require_once 'Configuration.php';
//Méthode qui essaie de se connecter à la BDD et montre un message d'erreur si le tout échoue
abstract class Modele{

    private static $bdd;

    private function obtenirBdd() {
      if (self::$bdd === null) {
        // Récupération des paramètres de configuration BD
        $dsn = Configuration::get("dsn");
        $login = Configuration::get("login");
        $mdp = Configuration::get("mdp");
        // Création de la connexion
        self::$bdd = new PDO($dsn, $login, $mdp, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return self::$bdd;
}
    
    function searchType($term) {
        $conn = getBdd();
        $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
        $stmt->execute(array('term' => '%' . $term . '%'));
    
        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['type'];
        }
    
        /* Toss back results as json encoded array. */
        return json_encode($return_arr);
    }

    
    protected function executerRequete($sql, $params = null) {
      if ($params == null) {
          $resultat = self::obtenirBdd()->query($sql);   // exécution directe
      }
      else {
          $resultat = self::obtenirBdd()->prepare($sql); // requête préparée
          $resultat->execute($params);
      }
      return $resultat;
  }
}







