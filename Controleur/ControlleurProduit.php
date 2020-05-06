<?php

require_once 'Modele/Produit.php';
require_once 'Vue/Vue.php';

class ControlleurProduit {

  private $produit;

  public function __construct() {
    $this->produit = new Produit();

  }

  // Affiche les détails sur un billet
  public function produit($idProduit) {
    $produit = $this->produit->getProduit($idProduit);
    $vue = new Vue("Accueil");
    $vue->generer(array('produit' => $produit));
  }

  public function ajouterProduit($produit){
    $validation_ajout = !filter_var($produit['nomProd'], FILTER_VALIDATE_INT);
    $vue = new Vue("Accueil");
    $produits =$this->produit->getProduits();
    if($validation_ajout && $produit['nomProd'] != '' ){
        $this->produit->setProduit($produit);
        $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));

    } else {
        $vue->generer(array('produits' => $produits,'erreur' => 'nom'));
       
    }

}

  public function supprimerUnProduit($id){
    deleteProduit($id);
    header('Location: index.php');
    }

    public function confirmer($id) {
      $produit = getProduit($id);
      require 'Vue/vueSupprimer.php';
  }

  public function modifierUnProduit($id, $produit){
    modifierProduit($id, $produit);
    header('Location: index.php');
    }

   public function confirmerModifier($id){
      $produit = getProduit($id);
      require 'Vue/vueModifier.php';
  }

  public function accueil() {
    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
    require 'Vue/vueAccueil.php';
}
}