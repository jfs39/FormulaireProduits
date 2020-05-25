<?php $titre = 'Insertion de produits'; ?>
    <body>
    <div id="contenuInput">
        <h1>Ajouter un produit v0.1.0</h1>
        <br/>
        <a href="/TP2_MVC_JeanFrancoisSergerie/Produit/AjoutDeProduit/"><button>Ajoutez un produit à la liste</button></a>
        <a href="/TP2_MVC_JeanFrancoisSergerie/Caracteristiques/chargerAjoutCaracteristique/"><button>Ajoutez une caractéristique à la liste</button></a>
        <br/>
        <br/>
        <a href="/TP2_MVC_JeanFrancoisSergerie/Produit/chargerVueAssigner/"><button>Assignez une caractéristique à un produit</button></a>

    </div>

    <table align="center">

    <?php foreach ($produits as $produit):?> 
        
         <tr>
        
            <td><a href="<?="/TP2_MVC_JeanFrancoisSergerie/Produit/confirmerModifier/" .$this->nettoyer($produit['PRODUCT_ID']) ?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="/TP2_MVC_JeanFrancoisSergerie/Produit/chargerSupprimer/" .$this->nettoyer($produit['PRODUCT_ID']) ?>">[supprimer]</a></td>
            <strong> <td> Nom du Produit : </strong> <em> <?= $this->nettoyer($produit['Product_Name'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($produit['Product_Description']) ?> </em>  </td>
            <td> <?= $this->nettoyer(($produit['Price'])) ?><em> $</em></td> 
            <td> (Autre détails :  <?= $this->nettoyer(($produit['Other_Details'])) ?>)</td></th>
            <td> (Caractéristique :  <?= $this->nettoyer(($produit['Nom_Caracteristique'])) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>
    
    </table>

    <table align="center">

    <?php foreach ($caracteristiques as $caract):?> 
        
         <tr>
        
            <td><a href="<?="/TP2_MVC_JeanFrancoisSergerie/Caracteristiques/chargerModifCaracteristique/" .$this->nettoyer($caract['ID_CARACTERISTIQUE']) ?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="/TP2_MVC_JeanFrancoisSergerie/Caracteristiques/chargerSupprimeCaracteristique/" .$this->nettoyer($caract['ID_CARACTERISTIQUE']) ?>">[supprimer]</a></td>
            <strong> <td> Nom de la caractéristique : </strong> <em> <?= $this->nettoyer($caract['Nom_Caracteristique'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($caract['Details_Caracteristique']) ?> </em>  </td>
            <td> Type de données : <em> <?= $this->nettoyer(($caract['Type_Donnees_Caracteristique'])) ?></em></td> 

        </tr>
        
    <?php endforeach; ?>
    
    </table>
        
    <br/>
    <br/>
    <p><a href="Tests.php">Tests de produits</a></p>
</body>