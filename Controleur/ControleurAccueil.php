<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Caracteristique.php';
require_once 'Framework/Vue.php';

class ControleurAccueil extends Controleur{

    private $produit;
  
    public function __construct() {
      $this->produit = new Produit();
      $this->caracteristique = new Caracteristique();
    }
  
    // Affiche la liste de tous les billets du blog
    public function index() {
      $produits = $this->produit->getProduits();
      $caracteristiques = $this->caracteristique->getCaracts();
      $this->genererVue(array('produits' => $produits, 'caracteristiques' => $caracteristiques));
    }
  }