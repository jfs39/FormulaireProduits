<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Caracteristique.php';
require_once 'Framework/Vue.php';

class ControleurProduit extends Controleur{

  private $produit;
  private $caracteristique;

  public function __construct() {
    $this->produit = new Produit();
    $this->caracteristique = new Caracteristique();
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

public function ajouter(){

  $nomProd = $this->requete->getParametre("nomProd");
  $texteDesc = $this->requete->getParametre("texteDesc");
  $prix = $this->requete->getParametre("prix");
  $texteDet = $this->requete->getParametre("texteDet");
  
  $this->produit->ajoutProduit($nomProd, $texteDesc, $prix, $texteDet);
 
  $this->executerAction("index");
}

  public function ajoutDeProduit(){
  $vue = new Vue("vueAjouter");
  $produits = $this->produit->getProduits();
  $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));

  }

  public function chargerSupprimer(){
    $id= $this->requete->getParametre("id");
    $produit= $this->produit->getProduit($id);
  $vue = new Vue("vueSupprimer");
  $vue->generer(array('produit'=>$produit));

  }

  public function supprimerUnProduit(){
    $id= $this->requete->getParametre("id");
      $this->produit->deleteProduit($id);
      $vue = new Vue("Accueil/index");
      $produits = $this->produit->getProduits();
      $vue->generer(array('produits' => $produits));
      
    }

    public function confirmer($id) {

     $produit= $this->produit->getProduit($id);
      $vue = new Vue("Supprimer");
      $vue->generer(array('produit' => $produit));
  }

  public function modifierUnProduit(){
      $id = $this->requete->getParametre("id");
      $produit = $_POST;
      $this->produit->modifierProduit($id, $produit);
      $vue = new Vue("Accueil/index");
      $produits = $this->produit->getProduits();
      $vue->generer(array('produits' => $produits));
      
    }

   public function confirmerModifier(){
     $id = $this->requete->getParametre("id");
      $produit = $this->produit->getProduit($id);
      $vue = new Vue("vueModifier");
      $vue->generer(array('produit' => $produit));  
  }

    public function accueil() {
      $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
      $vue = new Vue("Accueil");
      $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));
  }
  public function index(){
        
    $produits = $this->produit->getProduits();
    
    $this->genererVue(array('produits' => $produits));
  }

  public function chargerVueAssigner(){
   
    $produits = $this->produit->getProduits();
    $caract = $this->caracteristique->getCaracts();
    $vue = new Vue("vueAssignerProduit");
    $vue->generer(array('produits' => $produits,'caract'=> $caract));
  }

  public function assigner(){
    $idProd = $_POST["produit"]; 
    $idCaract =  $_POST["caract"];
    $this->produit->assignerProduit($idProd,$idCaract);
    index();

  }
}