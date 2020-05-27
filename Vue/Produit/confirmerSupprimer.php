<?php $titre = 'Supprimer un produit'; ?>
    <body>
    <div class="principal">
        <form action="Produit/SupprimerUnProduit/<?=$produit['PRODUCT_ID']?>" method="post">

            <div id="contenuInput">
                <h1>Supprimer un produit v0.1.0</h1>
                <br/>
                <p>
                <label for="nomProd">Nom du produit</label> : <input type="text" id="nomProd" value="<?= $this->nettoyer($produit['Product_Name']) ?>" disabled /><br />
                </p>
                <p>
                <label for="prix">Prix du produit</label> :  <input type="text" name="prix" id="prix" value="<?= $this->nettoyer($produit['Price']) ?>$" disabled /><br />
                </p>
                <p>
                <label for="id">Identifiant du produit</label> :  <input type="text" id="id"value="<?= $this->nettoyer($produit['PRODUCT_ID']) ?>" disabled /> <br />
                </p>
                <br/>
            </div>
            <input type="submit" value="Supprimer le produit" id="submit" />
            <br/>
            <input type="button" value="Annuler" onclick="history.back();"/>
        
        </form>
    </div>

