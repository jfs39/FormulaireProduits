<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un Produit V0.0.3</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>


        <?php
// Connexion à la bdd
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération du produit à modifier

        $reponse = $bdd->prepare('SELECT * FROM products WHERE PRODUCT_ID = ' . $_GET['PRODUCT_ID']);
        $reponse->execute(array($_GET['PRODUCT_ID']));
// Affichage du produit à modifer 
        $donnees = $reponse->fetch();
        $reponse->closeCursor();
        ?>


        <form action="produit_mise_a_jour.php" method="post">
			<h2>Modifier un Produit V0.0.3</h2>
            <p>
           
                <label for="nomProd">Nom du produit </label> : <input type="text" name="nomProd" id="nomProd" value="<?php echo htmlspecialchars($donnees['Product_Name']); ?>" /><br />
                <label for="texteDesc">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" ><?php echo htmlspecialchars($donnees['Product_Description']); ?></textarea><br />
				<label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix" value="<?php echo htmlspecialchars($donnees['Price']); ?>"></input><br />
                <label for="texteDet">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" ><?php echo htmlspecialchars($donnees['Other_Details']); ?></textarea><br />
                <input type="hidden" name="PRODUCT_ID" value="<?php echo $donnees['PRODUCT_ID']; ?>"/>
                <input type="submit" value="Modifier" />
                <input type="button" value="Annuler" onclick="history.back();"/>
            </p>
        </form>
    </body>
</html>