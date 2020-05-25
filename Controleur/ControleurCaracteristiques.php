<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Caracteristique.php';
require_once 'Framework/Vue.php';

class ControleurCaracteristiques extends Controleur{
    private $caracteristique;

    public function __construct() {
        $this->caracteristique = new Caracteristique();
      }

      public function ajouter(){

        $nomCaract = $this->requete->getParametre("nomCaract");
        $descCaract = $this->requete->getParametre("descCaract");
        $typeCaract = $this->requete->getParametre("typeCaract");
        
        $this->caracteristique->ajoutCaracteristique($nomCaract, $descCaract, $typeCaract);
       
        $this->executerAction("index");
      }

      public function modifier(){
        $nomCaract = $this->requete->getParametre("nomCaract");
        $descCaract = $this->requete->getParametre("descCaract");
        $typeCaract = $this->requete->getParametre("typeCaract");
        $id = $this->requete->getParametre("id");

        $this->caracteristique->modifierCaracteristique($id,$nomCaract, $descCaract, $typeCaract);
       
        $this->executerAction("index");

      }

      public function supprimer(){
        $id = $this->requete->getParametre("id");

        $this->caracteristique->deleteCaracteristique($id);
       
        $this->executerAction("index");

      }

      public function index(){
        
        $caracteristiques = $this->caracteristique->getCaracts();
        
        $this->genererVue(array('caracteristiques' => $caracteristiques));
      }

      public function chargerAjoutCaracteristique(){

        $vue = new Vue("vueAjouterCaract");
    
        $vue->generer(array('erreur'=> 'aucun'));
      }

      public function chargerModifCaracteristique(){
        $id = $this->requete->getParametre("id");
        $caract = $this->caracteristique->getCaract($id);
        
        $vue = new Vue("vueModifierCaract");
    
        $vue->generer(array('caract'=>$caract));
      }

      public function chargerSupprimeCaracteristique(){
        $id = $this->requete->getParametre("id");
        $caract = $this->caracteristique->getCaract($id);
        
        $vue = new Vue("vueSupprimerCaract");
    
        $vue->generer(array('caract'=>$caract));
      }


}