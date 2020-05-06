<?php

require_once 'Modele/Produit.php';
require_once 'Vue/Vue.php';

class ControlleurAccueil {

    private $produit;
  
    public function __construct() {
      $this->produit = new Produit();
    }
  
    // Affiche la liste de tous les billets du blog
    public function accueil() {
      $produits = $this->produit->getProduits();
      $vue = new Vue("Accueil");
      $vue->generer(array('produits' => $produits,'erreur'=>'aucun'));
    }
  }