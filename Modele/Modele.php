<?php

//Méthode qui essaie de se connecter à la BDD et montre un message d'erreur si le tout échoue
abstract class Modele{

    private $bdd;

    private function obtenirBdd() {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
           die('Erreur : '.$e->getMessage());
        }
        return $bdd;
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
      $resultat = $this->obtenirBdd()->query($sql);    // exécution directe
    }
    else {
      $resultat = $this->obtenirBdd()->prepare($sql);  // requête préparée
      $resultat->execute($params);
    }
    return $resultat;
  }

}






