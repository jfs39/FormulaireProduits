<?php $titre = 'Modifier un produit'; ?>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>
  <!--  &PRODUCT_ID=<?=$produit['PRODUCT_ID']?>-->
    <form action="Produit/modifierUnProduit/<?=$produit['PRODUCT_ID']?>" method="post">
        <div class="principal">
			<h2>Modifier un Produit V0.0.3</h2>
            <p>
           
                <label for="nomProd">Nom du produit </label> : <input type="text" name="nomProd" id="nomProd" value="<?php $this->nettoyer($produit['Product_Name']); ?>" /><br />
                <br />
                <label for="texteDesc">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" ><?php $this->nettoyer($produit['Product_Description']); ?></textarea><br />
				<br />
                <label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix" value="<?php $this->nettoyer($produit['Price']); ?>"></input><br />
                <br />
                <label for="texteDet">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" ><?php $this->nettoyer($produit['Other_Details']); ?></textarea><br />
                <br />
                <input type="hidden" name="PRODUCT_ID" value="<?php echo $produit['PRODUCT_ID']; ?>"/>
                <br />
                <input type="submit" value="Modifier" />
                <br />
                <input type="button" value="Annuler" onclick="history.back();"/>
                
            </p>
            </div>
        </form>
    </body>
