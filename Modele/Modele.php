<?php

//Méthode qui essaie de se connecter à la BDD et montre un message d'erreur si le tout échoue

function obtenirBdd() {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
       die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}

//Méthode pour obtenir TOUS les produits de ma BDD
function getProduits() {

    $bdd = obtenirBdd();
    $produits = $bdd->query('SELECT * FROM products');
    return $produits;
}
//Méthode pour obetnir UN seul produit par son ID de la BDD.
function getProduit($id) {
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
function setProduit($produit) {

    $bdd = obtenirBdd();
    $req = $bdd->prepare('INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?, ?);'); 
    $req->execute(array($produit[nomProd], $produit[texteDesc], $produit[prix], $produit[texteDet], 1)); 

}

//Méthode pour modifier un produit de ma BDD
function modifierProduit($id, $produit) {
    $bdd = obtenirBdd();
    
    $req = $bdd->prepare('UPDATE products SET Product_Name = ?, Product_Description = ?, Price = ?, Other_Details = ? WHERE PRODUCT_ID = ?');
    $req->execute(array($produit[nomProd], $produit[texteDesc], $produit[prix], $produit[texteDet], $id));
}

//Méthode pour enlever des produits de ma BDD
function deleteProduit($id) {
    $bdd = obtenirBdd();
    $result = $bdd->prepare('DELETE FROM products'
            . ' WHERE PRODUCT_ID = ?');
    $result->execute(array($id));
    return $result;
}

function searchType($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['type'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}





