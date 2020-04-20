<?php

require 'Modele/Modele.php';

function accueil() {
    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
    require 'Vue/vueAccueil.php';
}

function ajouterProduit($produit){
    $validation_ajout = !filter_var($produit[nomProd], FILTER_VALIDATE_INT);
    if($validation_ajout && $produit[nomProd] != '' ){
        setProduit($produit);
        header('Location: index.php');

    } else{
        header('Location: index.php?erreur=nom');
       
    }

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

