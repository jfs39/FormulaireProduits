<?php
require_once 'Framework/Modele.php';

class Produit extends Modele{


//Méthode pour obtenir TOUS les produits de ma BDD
public function getProduits() {

    $sql = 'SELECT * FROM products';
    $produits = $this->executerRequete($sql);
    return $produits;
}
//Méthode pour obetnir UN seul produit par son ID de la BDD.
public function getProduit($id) {
    $sql = 'select * from products'
    . ' where PRODUCT_ID=?';
    $produit = $this->executerRequete($sql,array($id));
    if ($produit->rowCount() == 1)
        return $produit->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun Produit ne correspond à l'identifiant '$id'");
}

//Méthode pour ajouter des produits à ma BDD
public function setProduit($produit) {

    $sql = 'INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?, ?);';
    $produit = $this->executerRequete($sql,array($produit['nomProd'], $produit['texteDesc'], $produit['prix'], $produit['texteDet'], 1));

}

public function ajoutProduit($nomProd,$texteDesc,$prix,$texteDet){

    $sql = 'INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?, ?);';
    $produit = $this->executerRequete($sql,array($nomProd, $texteDesc, $prix, $texteDet, 1));
}

//Méthode pour modifier un produit de ma BDD
public function modifierProduit($id, $produit) {

    $sql='UPDATE products SET Product_Name = ?, Product_Description = ?, Price = ?, Other_Details = ? WHERE PRODUCT_ID = ?';
    $produit = $this->executerRequete($sql,array($produit['nomProd'], $produit['texteDesc'], $produit['prix'], $produit['texteDet'], $id));
}

//Méthode pour enlever des produits de ma BDD
public function deleteProduit($id) {
    $sql= 'DELETE FROM products WHERE PRODUCT_ID = ?';
    $result = $this->executerRequete($sql,array($id));
    
}

public function assignerProduit($idProd,$idCaract){
    $sql= 'INSERT INTO produits_caracteristiques(ID_PRODUIT,ID_CARACTERISTIQUE) VALUES(?,?);';
    $result = $this->executerRequete($sql,array($idProd,$idCaract));

}




}