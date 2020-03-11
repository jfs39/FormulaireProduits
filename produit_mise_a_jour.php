<?php

try {
   $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$prive = (isset($_POST['prive'])) ? 1 : 0;

$req = $bdd->prepare('UPDATE products SET Product_Name = ?, Product_Description = ?, Price = ?, Other_Details = ? WHERE PRODUCT_ID = ?');
$req->execute(array($_POST['nomProd'], $_POST['texteDesc'], $_POST['prix'], $_POST['texteDet'], $_POST['PRODUCT_ID']));


header('Location: index.php');
?>

<html>
    <body>
		<h2>Mettre à jour un Produit V0.0.4</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>
