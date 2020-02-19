<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=produitscaracteristiques;charset=utf8', 'root', 'maman28222' ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO products(Product_Name, Product_Description, Price, Other_Details,USER_ID) VALUES( ?, ?, ?, ?,?);'); 
$req->execute(array($_POST['nomProd'], $_POST['texteDesc'], $_POST['prix'], $_POST['texteDet'], $_POST['userid']));

//header('Location: index.php');
?>
<html>
    <body>
		<h2>Envoyer un produit V0.0.1</h2>
	     *** Pour déboguage ***<br />
		Voici le contenu de $_POST envoyé par le formulaire d'envoi et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        <?php  print_r($_POST); // décommentez pour comparer avec var_dump ?>
        <form action="index.php">
            <input type="submit" value="Continuer">
        </form>
    </body>
</html> 