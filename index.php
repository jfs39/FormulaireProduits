<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Insertion de produits</title>
    </head>
    <body>
    <div class="principal">
        <form action="produit_envoyer.php" method="post" >
            <div id="contenuInput">
                <h1>Ajouter un produit v0.0.5</h1>
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
                <br/>
            </div>
            <input type="submit" value="Envoyer le produit" />
        
        
        </form>
    </div>
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
    echo '<table align="center">';
    while ($donnees = $reponse->fetch())
    {
        echo ' <tr>';
        
        echo
            '<td><a href="produit_modifier.php?PRODUCT_ID=' . $donnees['PRODUCT_ID'] . '">[modifier]</a> <strong></td>'. 
            '<td><a href="produit_supprimer.php?PRODUCT_ID=' . $donnees['PRODUCT_ID'] . ' "onClick=\'javascript:return confirm("Êtes-vous certain de vouloir supprimer cette donnée?");\'>[supprimer]</a> <strong></td>' ,'<td> Nom du Produit : '. //Revoir les données et adapter pour faire beau
            '</strong> ' . 
           '<em>'. $donnees['Product_Name'].'</em> </td>' . '<td> Description : <em>' . 
            htmlspecialchars($donnees['Product_Description']) . '</em> , </td><td>' . 
            htmlspecialchars($donnees['Price']) ,'<em> $</em></td>' . 
            '<td> (Autre détails : ' . htmlspecialchars($donnees['Other_Details']) . 
            ')</td></th>';
        echo '</tr>';
        }
    echo '</table>';

    $reponse->closeCursor();
    ?>
    <div class="aPropos"><a href="apropos.html">à propos</a></div>
    </body>
</html>