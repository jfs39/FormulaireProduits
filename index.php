<?php

require 'Controlleur/Controleur.php';

try {
    if(isset($_GET['action'])){
        if ($_GET['action'] == 'ajouter') {
            $produit = $_POST;
            ajouterProduit($produit);
        }
        else if($_GET['action'] == 'modifier'){
            if (isset($_GET['PRODUCT_ID'])) {
                $produit = $_POST;
                $id = intval($_GET['PRODUCT_ID']);
                if ($id != 0) {
                    modifierUnProduit($id,$produit);
                } else

                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        }
        else if($_GET['action'] == 'supprimer'){
            if (isset($_GET['PRODUCT_ID'])) {

                $id = intval($_GET['PRODUCT_ID']);
                if ($id != 0) {
                    supprimerUnProduit($id);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        }
        else if($_GET['action'] == 'confirmer'){
            if (isset($_GET['PRODUCT_ID'])) {
 
                $id = intval($_GET['PRODUCT_ID']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        }
        else if($_GET['action'] == 'confirmerModifier'){
            if (isset($_GET['PRODUCT_ID'])) {
 
                $id = intval($_GET['PRODUCT_ID']);
                if ($id != 0) {
                    confirmerModifier($id);
                } else
                    throw new Exception("Identifiant de produit incorrect");
            } else
                throw new Exception("Aucun identifiant de produit");
        }

    } else {
        accueil();
    }

} catch (Exception $e) {
  echo  $e->getMessage();
}