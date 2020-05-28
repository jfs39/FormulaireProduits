<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Modele/ProduitCaracteristique.php';
require_once 'Modele/Caracteristique.php';
require_once 'Framework/Vue.php';

class ControleurProduitCaracteristiques extends Controleur{
    private $produit;
    private $caracteristique;
    private $produitCaracteristique;

    public function __construct() {
        $this->produit = new Produit();
        $this->caracteristique = new Caracteristique();
        $this->produitCaracteristique = new ProduitCaracteristique();
      }
    public function AssignerProduit(){
   
        $produits = $this->produit->getProduits();
        $caract = $this->caracteristique->getCaracts();
        $this->genererVue(array('produits' => $produits,'caract'=> $caract));
      }
    
      public function assigner(){
        $idProd = $_POST["produit"]; 
        $idCaract =  $_POST["caract"];
        $this->produitCaracteristique->assignerProduit($idProd,$idCaract);
       // $vue = new Vue("Accueil/index");
        $produits = $this->produit->getProduits();
        $caracts = $this->caracteristique->getCaracts();
       // $vue->generer(array('produits' => $produits, 'caracteristiques' => $caracts));
       $this->genererVue(['produits'=> $produits, 'caracteristiques'=>$caract],"index");
    
      }
    
      public function ProduitsCaracteristiques(){
        $produits = $this->produit->getProduitsCaracteristiques();
        $this->genererVue(array('produits' => $produits));
    
      }

      public function index(){
        $vue = new Vue("AjoutDeProduit");
      
      $this->genererVue(array('erreur' => 'succes'));
    }



}