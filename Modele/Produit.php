<?php
require_once 'Modele/Modele.php';
class Produit extends Modele{

//Méthode pour obtenir TOUS les produits de ma BDD
public function getProduits() {

    $sql = 'SELECT * FROM products';
    $produits = $this->executerRequete($sql);
    return $produits;
}
//Méthode pour obetnir UN seul produit par son ID de la BDD.
public function getProduit($id) {
    $bdd = obtenirBdd();
    $produit = $bdd->prepare('select * from products'
            . ' where PRODUCT_ID=?');
    $produit->execute(array($id));
    if ($produit->rowCount() == 1)
        return $produit->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun Produit ne correspond à l'identifiant '$id'");
}

//Méthode pour ajouter des produits à ma BDD
public function setProduit($produit) {

    $bdd = obtenirBdd();
    $req = $bdd->prepare('INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?, ?);'); 
    $req->execute(array($produit[nomProd], $produit[texteDesc], $produit[prix], $produit[texteDet], 1)); 

}

//Méthode pour modifier un produit de ma BDD
public function modifierProduit($id, $produit) {
    $bdd = obtenirBdd();
    
    $req = $bdd->prepare('UPDATE products SET Product_Name = ?, Product_Description = ?, Price = ?, Other_Details = ? WHERE PRODUCT_ID = ?');
    $req->execute(array($produit[nomProd], $produit[texteDesc], $produit[prix], $produit[texteDet], $id));
}

//Méthode pour enlever des produits de ma BDD
public function deleteProduit($id) {
    $bdd = obtenirBdd();
    $result = $bdd->prepare('DELETE FROM products'
            . ' WHERE PRODUCT_ID = ?');
    $result->execute(array($id));
    return $result;
}


}