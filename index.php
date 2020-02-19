<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Insertion de produits</title>
    </head>
    <style type="text/css">
    body{
        text-align:center;
        background-color:#cad3e3;
    }
    input[type=submit]{
        width:400px;
        height:50px;
        border: 2px solid black;
        background-color: #e4f5e4;
    }
    input[type=submit]:hover{
        border: 2px solid #6bbd68;
        background-color: #a0e39d;
    }
    </style>
    <body>
    <form action="produit_envoyer.php" method="post">
		<h1>Ajouter un produit v0.0.2</h1>
        <br/>
        <p>
        <label for="nomProd">Nom du produit</label> : <input type="text" name="nomProd" id="nomProd" /><br />
        </p>
        <br/>
        <p>
        <label for="texte">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" >Entrez la description du produit ici</textarea><br />
        </p>
        <br/>
        <p>
        <label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix"/><br />
        </p>
        <br/>
        <p>
		<label for="texte">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" >Entrez les autres détails ici</textarea><br />
        </p>
        <br/>
        <p>
        <label for="userid">Code d'utilisateur</label> :  <input type="number" name="userid" id="userid"/><br />
        </p>
        <br/>
        <input type="submit" value="Envoyer le produit" />
	
    </form>

    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM products');

    while ($donnees = $reponse->fetch())
    {
        echo '<p><a href="produit_modifier.php?id=' . $donnees['USER_ID'] . '">[modifier]</a> <strong>' . //Revoir les données et adapter pour faire beau
            htmlspecialchars($donnees['PRODUCT_ID']) . 
            '</strong> (' . 
            $donnees['Product_Name'] . ') : <em>' . 
            htmlspecialchars($donnees['Product_Description']) . '</em>, ' . 
            htmlspecialchars($donnees['Price']) . 
            ' (privé : ' . htmlspecialchars($donnees['Other_Details']) . 
            ')</p>';
    }

    $reponse->closeCursor();
    ?>

    </body>
</html>