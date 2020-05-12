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
          
          $produit_id = intval($this->ctrlProduit->ajouterProduit($_POST));

        } else if ($_GET['action'] == 'confirmerModifier') {
          $id = intval($this->getParametre($_GET, 'PRODUCT_ID'));
          $this->ctrlProduit->confirmerModifier($id);

        } else if ($_GET['action'] == 'confirmer') {
          $id = intval($this->getParametre($_GET, 'PRODUCT_ID'));
          $this->ctrlProduit->confirmer($id);

        }else if ($_GET['action'] == 'supprimer') {
          $id = intval($this->getParametre($_GET, 'PRODUCT_ID'));
          $this->ctrlProduit->supprimerUnProduit($id);

        }else if ($_GET['action'] == 'modifier') {
          $id = intval($this->getParametre($_GET, 'PRODUCT_ID'));
          $produitCourant = $this->ctrlProduit->produit($id);
          $this->ctrlProduit->modifierUnProduit($id,$produitCourant);
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

  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
        return $tableau[$nom];
    } else
        throw new Exception("Paramètre '$nom' absent");
}
}