<h1>Voici la liste de tous vos produits</h1>
<br/>
<br/>
    <table align="center">

    <?php foreach ($produits as $produit):?> 
            
            <tr>
        
            <td><a href="<?="Produit/confirmerModifier/" .$this->nettoyer($produit['PRODUCT_ID']) ?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="Produit/confirmerSupprimer/" .$this->nettoyer($produit['PRODUCT_ID']) ?>">[supprimer]</a></td>
            <strong> <td> Nom du Produit : </strong> <em> <?= $this->nettoyer($produit['Product_Name'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($produit['Product_Description']) ?> </em>  </td>
            <td> <?= $this->nettoyer(($produit['Price'])) ?><em> $</em></td> 
            <td> (Autre détails :  <?= $this->nettoyer(($produit['Other_Details'])) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>
    </table>
    <br/>
    <br/>

    <button onclick="history.back()">Retour au menu</button>