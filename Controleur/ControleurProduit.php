<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Utilisateur.php';
require_once 'Modele/Caracteristique.php';
require_once 'Framework/Vue.php';

class ControleurProduit extends Controleur{

  private $produit;
  private $caracteristique;
  private $utilisateur;

  public function __construct() {
    $this->produit = new Produit();
    $this->caracteristique = new Caracteristique();
    $this->utilisateur = new Utilisateur();
  }
 
  public function produit($idProduit) {
    $produit = $this->produit->getProduit($idProduit);
   // $vue = new Vue("Accueil");
  //  $vue->generer(array('produit' => $produit));
    return $produit;

  }

public function ajouter(){
  
  $nomProd = $this->requete->getParametre("nomProd");
  $validation_ajout = !filter_var( $nomProd, FILTER_VALIDATE_INT);
  $texteDesc = $this->requete->getParametre("texteDesc");
  $prix = $this->requete->getParametre("prix");
  $texteDet = $this->requete->getParametre("texteDet");

  if($validation_ajout && $nomProd != '' ){

  $this->produit->ajoutProduit($nomProd, $texteDesc, $prix, $texteDet);
  
  $vue = new Vue("Produit/ajoutDeProduit");
  $vue->generer(array('erreur' => 'succes'));
  } else {
        $vue = new Vue("Produit/ajoutDeProduit");
      $vue->generer(array('erreur' => 'nom'));
  }
}

  public function ajoutDeProduit(){
  $this->genererVue(array('erreur'=> 'aucun'));

  }

  public function confirmerSupprimer(){
    $id= $this->requete->getParametre("id");
    $produit= $this->produit->getProduit($id);
  $this->genererVue(array('produit'=>$produit));

  }

  public function supprimerUnProduit(){
    $id= $this->requete->getParametre("id");
      $this->produit->deleteProduit($id);
      $produits = $this->produit->getProduits();
      $caract = $this->caracteristique->getCaracts();
      $vue = new Vue("Accueil/index");
      $vue->generer(['produits'=> $produits, 'caracteristiques'=>$caract]);
      
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
      $caract = $this->caracteristique->getCaracts();
      $vue->generer(array('produits' => $produits, 'caracteristiques' => $caract));
      
    }

   public function confirmerModifier(){
     $id = $this->requete->getParametre("id");
      $produit = $this->produit->getProduit($id);
      $this->genererVue(array('produit' => $produit));  
  }

    public function accueil() {
      $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
      $vue = new Vue("Accueil");
      $vue->generer(array('produits' => $produits,'erreur'=> 'aucun'));
  }
  public function index(){
      $vue = new Vue("AjoutDeProduit");
    
    $this->genererVue(array('erreur' => 'succes'));
  }


}