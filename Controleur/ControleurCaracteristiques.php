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

      public function AjoutCaracteristique(){
        $this->genererVue(array('erreur'=> 'aucun'));
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