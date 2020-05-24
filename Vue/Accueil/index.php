<?php $titre = 'Insertion de produits'; ?>
    <body>
    <div id="contenuInput">
        <h1>Ajouter un produit v0.1.0</h1>
        <br/>
        <a href="/TP2_MVC_JeanFrancoisSergerie/Produit/AjoutDeProduit/"><button>Ajoutez un produit à la liste</button></a>
        <a href="/TP2_MVC_JeanFrancoisSergerie/Caracteristiques/chargerAjoutCaracteristique/"><button>Ajoutez une caractéristique à la liste</button></a>

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

        </tr>
        
    <?php endforeach; ?>
    
    </table>
        
    <br/>
    <br/>
    <p><a href="Tests.php">Tests de produits</a></p>
</body>