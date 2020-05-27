<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Caracteristique.php';

class ControleurAdmin extends ControleurSecurise
{
    private $produit;
    private $caracteristique;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->produit = new Produit();
        $this->caracteristique = new Caracteristique();
    }

    public function index()
    {
        $nbProduits = $this->produit->getNombreProduits();
        $nbCaracteristiques = $this->caracteristique->getNombreCaracteristiques();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbProduits' => $nbProduits, 'nbCaracteristiques' => $nbCaracteristiques, 'login' => $login));
    }

}