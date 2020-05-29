<?php $this->titre = "Gestion de produits - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce programme comporte <?= $this->nettoyer($nbProduits) ?> produit(s) et <?= $this->nettoyer($nbCaracteristiques) ?> caracteristique(s).
<br/>
<a href="admin/consulterAdmin">Consultez vos produits</a><br/>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a><br/>
<h1>Voici la liste de tous les produits</h1>
    <table align="center">

    <?php foreach ($produits as $produit):?> 
            
        <tr>
        
            <td><a href="<?="Produit/confirmerModifier/" .$this->nettoyer($produit['PRODUCT_ID']) ?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="Produit/confirmerSupprimer/" .$this->nettoyer($produit['PRODUCT_ID']) ?>">[supprimer]</a></td>
            <strong> <td> Nom du Produit : </strong> <em> <?= $this->nettoyer($produit['Product_Name'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($produit['Product_Description']) ?> </em>  </td>
            <td> <?= $this->nettoyer(($produit['Price'])) ?><em> $</em></td> 
            <td> (Autre détails :  <?= $this->nettoyer(($produit['Other_Details'])) ?>)</td></th>
            <td> (Créé par :  <?= $this->nettoyer(($produit['nom'])) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>
    </table>
        <br/>
        <h1>Voici une liste de toutes les caractéristiques</h1>
    <table align="center">

    <?php foreach ($caracteristiques as $caract):?> 
        
         <tr>
        
            <td><a href="<?="Caracteristiques/ModifCaracteristique/" .$this->nettoyer($caract['ID_CARACTERISTIQUE']) ?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="Caracteristiques/SupprimerCaracteristique/" .$this->nettoyer($caract['ID_CARACTERISTIQUE']) ?>">[supprimer]</a></td>
            <strong> <td> Nom de la caractéristique : </strong> <em> <?= $this->nettoyer($caract['Nom_Caracteristique'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($caract['Details_Caracteristique']) ?> </em>  </td>
            <td> Type de données : <em> <?= $this->nettoyer(($caract['Type_Donnees_Caracteristique'])) ?></em></td> 

        </tr>
        
    <?php endforeach; ?>
    
    </table>
    <br/>
    <h2>Liste des choses à faire en tant qu'utilisateur</h2>
    <br/>
    <a href="Produit/AjoutDeProduit/">Ajoutez un produit à la liste</a>
    <br/>
    <a href="Caracteristiques/AjoutCaracteristique/">Ajoutez une caractéristique à la liste</a>
    <br/>
    <a href="ProduitCaracteristiques/AssignerProduit/">Assignez une caractéristique à un produit</a>
    <br/>
    <a href="ProduitCaracteristiques/ProduitsCaracteristiques/">Voir les produits qui ont des caractéristiques</a>
    <br/><br/>

<footer>Ceci est une page Web créée dans le contexte du cours Web et Bases de données.<br/>
     <a href="Accueil/Apropos">À propos de moi</a>
</footer>