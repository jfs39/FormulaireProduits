<?php $this->titre = "Gestion de produits - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce programme comporte <?= $this->nettoyer($nbProduits) ?> produit(s) et <?= $this->nettoyer($nbCaracteristiques) ?> caracteristique(s).
<br>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>