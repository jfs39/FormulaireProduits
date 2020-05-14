
<?php

require_once 'Modele/Produit.php';

$testProduit = new Produit;
$produits = $testProduit->getProduits();

var_dump($produits->rowCount());

$produit =  $testProduit->getProduit(44);

var_dump($produit);