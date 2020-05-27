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


  protected function genererVue($donneesVue = array(), $action = null)
  {
      // Utilisation de l'action actuelle par défaut
      $actionVue = $this->action;
      if ($action != null) {
          // Utilisation de l'action passée en paramètre
          $actionVue = $action;
      }
      // Utilisation du nom du contrôleur actuel
      $classeControleur = get_class($this);
      $controleurVue = str_replace("Controleur", "", $classeControleur);

      // Instanciation et génération de la vue
      $vue = new Vue($actionVue, $controleurVue);
      $vue->generer($donneesVue);
  }

  protected function rediriger($controleur, $action = null)
  {
      $racineWeb = Configuration::get("racineWeb", "/");
      header("Location:" . $racineWeb . $controleur . "/" . $action);
  }
}









