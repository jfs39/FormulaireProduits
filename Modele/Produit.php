<?php
require_once 'Framework/Modele.php';

class Produit extends Modele{


//Méthode pour obtenir TOUS les produits de ma BDD
public function getProduits() {

    $sql = 'SELECT * FROM products INNER JOIN utilisateurs ON USER_ID=id;';
    $produits = $this->executerRequete($sql);
    return $produits;
}

public function getProduitsAdmin($id){
    $sql = 'SELECT * FROM products INNER JOIN utilisateurs ON USER_ID=id WHERE USER_ID = ?;';
    $produits = $this->executerRequete($sql,[$id]);
    return $produits;
}

public function getProduitsCaracteristiques(){

    $sql = 'SELECT * FROM products CROSS JOIN produits_caracteristiques ON PRODUCT_ID=ID_PRODUIT CROSS JOIN caracteristiques ON caracteristiques.ID_CARACTERISTIQUE = produits_caracteristiques.ID_CARACTERISTIQUE';
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

public function ajoutProduit($nomProd,$texteDesc,$prix,$texteDet){
    $sql = 'INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?, ?);';
    if(isset($_SESSION['id'])){
        $produit = $this->executerRequete($sql,array($nomProd, $texteDesc, $prix, $texteDet, $_SESSION['id']));
    } else {
        $produit = $this->executerRequete($sql,array($nomProd, $texteDesc, $prix, $texteDet, 1));
    }

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
//Méthode pour compter le nombre de produits
public function getNombreProduits(){
    $sql = 'SELECT count(*) as nbProduits FROM products';
    $resultat = $this->executerRequete($sql);
    $ligne = $resultat->fetch();
    return $ligne['nbProduits'];
}







}