<?php

require_once 'Modele/Produit.php';
require_once 'Framework/Vue.php';

class ControleurProduit {

  private $produit;

  public function __construct() {
    $this->produit = new Produit();
  }

 
  public function produit($idProduit) {
    $produit = $this->produit->getProduit($idProduit);
   // $vue = new Vue("Accueil");
  //  $vue->generer(array('produit' => $produit));
    return $produit;

  }

  public function ajouterProduit($produit){
    
    $validation_ajout = !filter_var( $produit['nomProd'], FILTER_VALIDATE_INT);
    $vue = new Vue("Ajouter");
    $produits = $this->produit->getProduits();

    if($validation_ajout && $produit['nomProd'] != '' ){

        $this->produit->setProduit($produit);
        $vue->generer(array('produits' => $produits,'erreur'=> 'succes'));

    } else {

        $vue->generer(array('produits' => $produits,'erreur' => 'nom'));
    }

}

  public function ajoutDeProduit(){
  $vue = new Vue("Ajouter");
  $produits = $this->produit->getProduits();

  $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));

  }

  public function supprimerUnProduit($id){
      $this->produit->deleteProduit($id);
      $vue = new Vue("Accueil");
      $produits = $this->produit->getProduits();
      $vue->generer(array('produits' => $produits));
      
    }

    public function confirmer($id) {

     $produit= $this->produit->getProduit($id);
      $vue = new Vue("Supprimer");
      $vue->generer(array('produit' => $produit));
  }

  public function modifierUnProduit($id, $produit){
      $this->produit->modifierProduit($id, $produit);
      $vue = new Vue("Accueil");
      $produits = $this->produit->getProduits();
      $vue->generer(array('produits' => $produits));
      
    }

   public function confirmerModifier($id){
      $produit = $this->produit->getProduit($id);
      $vue = new Vue("Modifier");
      $vue->generer(array('produit' => $produit));  
  }

    public function accueil() {
      $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
      $vue = new Vue("Accueil");
      $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));
  }
}