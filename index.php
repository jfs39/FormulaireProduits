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
        
    }
    </style>
    <body>
    <form action="produit_envoyer.php" method="post">
		<h1>Ajouter un produit v0.0.1</h1>
        <br/>
        <p>
        <label for="nomProd">Nom du produit</label> : <input type="text" name="nomProd" id="nomProd" /><br />
        </p>
        <p>
        <label for="texte">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" >Entrez la description du produit ici</textarea><br />
        </p>
        <br/>
        <p>
        <label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix"/><br />
        </p>
        <p>
		<label for="texte">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" >Entrez les autres détails ici</textarea><br />
        </p>
        <p>
        <label for="userid">Code d'utilisateur</label> :  <input type="number" name="userid" id="userid"/><br />
        </p>
        <input type="submit" value="Envoyer le produit" />
	
    </form>

    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM products ORDER BY ID DESC LIMIT 0, 10');

    while ($donnees = $reponse->fetch())
    {
        echo '<p><a href="produit_modifier.php?id=' . $donnees['id'] . '">[modifier]</a> <strong>' . 
            htmlspecialchars($donnees['auteur']) . 
            '</strong> (' . 
            $donnees['date'] . ') : <em>' . 
            htmlspecialchars($donnees['titre']) . '</em>, ' . 
            htmlspecialchars($donnees['texte']) . 
            ' (privé : ' . htmlspecialchars($donnees['prive']) . 
            ')</p>';
    }

    $reponse->closeCursor();
    ?>

    </body>
</html>