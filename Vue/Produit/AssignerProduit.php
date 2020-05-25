<?php $titre = 'Assigner un produit'; ?>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>

    <form action="Produit/assigner" method="post">
        <div class="principal">
			<h2>Assigner un produit V1.0.0</h2>
            <p>
                <select name="produit" id="produit">
                <?php foreach ($produits as $produit):?> 
                <option value="<?=$produit['PRODUCT_ID']?>" ><?=$produit['PRODUCT_ID']?> : <?=$produit['Product_Name']?></option>
                <?php endforeach; ?>
                </select>

                <br/><br/>

                <select name="caract" id="caract">
                <?php foreach ($caract as $caractCourant):?> 
                <option value="<?=$caractCourant['ID_CARACTERISTIQUE']?>"><?=$caractCourant['ID_CARACTERISTIQUE']?> : <?=$caractCourant['Nom_Caracteristique']?></option>
                <?php endforeach; ?>

                </select>
                
                <br/><br/>

                <input type="submit" value="Assigner le produit" />

                <br /><br/>

                <input type="button" value="Annuler" onclick="history.back();"/>
                
            </p>
            </div>
        </form>
    </body>

