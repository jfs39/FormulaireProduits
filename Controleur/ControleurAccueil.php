<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Framework/Vue.php';

class ControleurAccueil extends Controleur{

    private $produit;
  
    public function __construct() {
      $this->produit = new Produit();
    }
  
    // Affiche la liste de tous les billets du blog
    public function index() {
      $produits = $this->produit->getProduits();
      $this->genererVue(array('produits' => $produits));
    }
  }