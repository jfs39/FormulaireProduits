<?php

require 'Modele/Modele.php';

function accueil() {
    require 'Vue/vueAccueil.php';
}

function ajouterProduit($produit){
    setProduit($produit);
    header('Location: index.php');
}

function supprimerUnProduit($id){
deleteProduit($id);
header('Location: index.php');
}

function confirmer($id) {
    $produit = getProduit($id);
    require 'Vue/vueSupprimer.php';
}
function confirmerModifier($id){
    $produit = getProduit($id);
    require 'Vue/vueModifier.php';
}

function modifierUnProduit($id, $produit){
    modifierProduit($id, $produit);
    header('Location: index.php');
    }

