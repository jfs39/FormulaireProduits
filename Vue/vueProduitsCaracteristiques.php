<h1>Liste des produits qui ont une caractéristique assignée.</h1>

<table align="center">

    <?php foreach ($produits as $produit):?> 
        
         <tr>
        
            <strong> <td> Nom du Produit : </strong> <em> <?= $this->nettoyer($produit['Product_Name'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($produit['Product_Description']) ?> </em>  </td>
            <td> <?= $this->nettoyer(($produit['Price'])) ?><em> $</em></td> 
            <td> (Autre détails :  <?= $this->nettoyer(($produit['Other_Details'])) ?>)</td></th>
            <td> (Caractéristique :  <?= $this->nettoyer(($produit['Nom_Caracteristique'])) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>


    <br /><br/>

<input type="button" value="Annuler" onclick="history.back();"/>