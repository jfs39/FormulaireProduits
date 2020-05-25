<?php
require_once 'Framework/Modele.php';

class ProduitCaracteristique extends Modele{

    public function assignerProduit($idProd,$idCaract){
        $sql= 'INSERT INTO produits_caracteristiques(ID_PRODUIT,ID_CARACTERISTIQUE) VALUES(?,?);';
        $result = $this->executerRequete($sql,array($idProd,$idCaract));
    
    }

    public function enleverAssignation($idProd,$idCaract){
        $sql= 'DELETE FROM produits_caracteristiques WHERE ID_PRODUIT=? AND ID_CARACTERISTIQUE=?;';
        $result = $this->executerRequete($sql,array($idProd,$idCaract));

    }
}