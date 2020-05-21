<?php

require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur {

  
  private $action;

  
  protected $requete;

  
  public function setRequete(Requete $requete) {
    $this->requete = $requete;
  }

  
  public function executerAction($action) {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->{$this->action}();
    }
    else {
      $classeControleur = get_class($this);
      throw new Exception("Action '$action' non définie dans la classe $classeControleur");
    }
  }


  public abstract function index();


  protected function genererVue($donneesVue = array()) {

    $classeControleur = get_class($this);
    $controleur = str_replace("Controleur", "", $classeControleur);
    
    $vue = new Vue($this->action, $controleur);
    $vue->generer($donneesVue);
  }
}









