<?php

require_once 'Controleur/ControlleurAccueil.php';
require_once 'Controleur/ControlleurProduit.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControlleurAccueil();
    $this->ctrlProduit = new ControlleurProduit();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if(isset($_GET['action'])){
        if ($_GET['action'] == 'ajouter') {
          
          $produit_id = intval($this->getParametre($_POST, 'PRODUCT_ID'));
        } 
        
    } else {  // aucune action définie : affichage de l'accueil
      $this->ctrlAccueil->accueil();
   }

  }catch (Exception $e) {
    echo($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
  //  $vue = new Vue("Erreur");
  //  $vue->generer(array('msgErreur' => $msgErreur));
  }
}