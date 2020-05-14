<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleProduit') {
        require 'Tests/Modeles/testProduit.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/vueErreur.php';
    }
}
?>


<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleProduit">Produit</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>

