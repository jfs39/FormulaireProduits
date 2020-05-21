
<?php $titre = 'Insertion de produits'; ?>
    <body>
    <div id="contenuInput">
        <h1>Ajouter un produit v0.1.0</h1>

        <br/>

        <a href="index.php?action=ajout"><button>Ajoutez un produit à la liste</button></a>

    </div>

    <table align="center">

    <?php foreach ($produits as $produit):?> 
        
         <tr>
        
            <td><a href="<?="index.php?action=confirmerModifier&PRODUCT_ID=" . $produit['PRODUCT_ID']?>" >[modifier]</a> <strong> </td> 
            <td><a href="<?="index.php?action=confirmer&PRODUCT_ID=" . $produit['PRODUCT_ID'] ?>">[supprimer]</a></td>
            <strong> <td> Nom du Produit : </strong> <em> <?= $produit['Product_Name']?> </em> </td>
            <td> Description : <em> <?= htmlspecialchars($produit['Product_Description']) ?> </em>  </td>
            <td> <?= htmlspecialchars($produit['Price']) ?><em> $</em></td> 
            <td> (Autre détails :  <?= htmlspecialchars($produit['Other_Details']) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>
    
    </table>
        
    <br/>
    <br/>
    <p><a href="Tests.php">Tests de produits</a></p>
        </body>