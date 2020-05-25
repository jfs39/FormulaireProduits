<?php
require_once 'Framework/Controleur.php';

require_once 'Modele/Caracteristique.php';
require_once 'Modele/Produit.php';
require_once 'Framework/Vue.php';

class ControleurCaracteristiques extends Controleur{
    private $caracteristique;
    private $produit;

    public function __construct() {
        $this->caracteristique = new Caracteristique();
        $this->produit = new Produit();
      }

      public function ajouter(){

        
        $nomCaract = $this->requete->getParametre("nomCaract");
        $validation_ajout = !filter_var( $nomCaract, FILTER_VALIDATE_INT);
        $descCaract = $this->requete->getParametre("descCaract");
        $typeCaract = $this->requete->getParametre("typeCaract");

        if($validation_ajout && $nomCaract != '' ){
          $this->caracteristique->ajoutCaracteristique($nomCaract, $descCaract, $typeCaract);
       
          $vue = new Vue("Caracteristiques/AjoutCaracteristique");
          $vue->generer(['erreur'=>'succes']);
        } else {
          $vue = new Vue("Caracteristiques/AjoutCaracteristique");
          $vue->generer(['erreur'=>'nom']);

        }

      }

      public function modifier(){
        $nomCaract = $this->requete->getParametre("nomCaract");
        $descCaract = $this->requete->getParametre("descCaract");
        $typeCaract = $this->requete->getParametre("typeCaract");
        $id = $this->requete->getParametre("id");

        $this->caracteristique->modifierCaracteristique($id,$nomCaract, $descCaract, $typeCaract);
       
        $produits = $this->produit->getProduits();
        $caract = $this->caracteristique->getCaracts();
        $vue = new Vue("Accueil/index");
        $vue->generer(['produits'=> $produits, 'caracteristiques'=>$caract]);

      }

      public function supprimer(){
        $id = $this->requete->getParametre("id");

        $this->caracteristique->deleteCaracteristique($id);
        $produits = $this->produit->getProduits();
        $caract = $this->caracteristique->getCaracts();
        $vue = new Vue("Accueil/index");
        $vue->generer(['produits'=> $produits, 'caracteristiques'=>$caract]);

      }

      public function index(){
        
        $caracteristiques = $this->caracteristique->getCaracts();
        
        $this->genererVue(array('caracteristiques' => $caracteristiques));
      }

      public function AjoutCaracteristique(){
        $this->genererVue(array('erreur'=> 'aucun'));
      }

      public function ModifCaracteristique(){
        $id = $this->requete->getParametre("id");
        $caract = $this->caracteristique->getCaract($id);
    
        $this->genererVue(array('caract'=>$caract));
      }

      public function SupprimerCaracteristique(){
        $id = $this->requete->getParametre("id");
        $caract = $this->caracteristique->getCaract($id);
    
        $this->genererVue(array('caract'=>$caract));
      }

      


}