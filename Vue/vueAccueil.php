
<?php $titre = 'Insertion de produits'; ?>
    <body>
    <div class="principal">
        <form action="index.php?action=ajouter" method="post">
            <div id="contenuInput">
                <h1>Ajouter un produit v0.1.0</h1>
                <br/>
                <p>
                <label for="nomProd">Nom du produit</label> : <input type="text" name="nomProd" id="nomProd" onkeyup="gerer()"/><br />
                <?= ($erreur == 'nom') ? '<span style="color : red;">Entrez un nom de produit valide s.v.p.</span>' : '' ?>
                </p>
                <br/>
                <p>
                <label for="texte">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" >Entrez la description du produit ici</textarea><br />
                </p>
                <br/>
                <p>
                <label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix" onkeyup="gerer()"/><br />
                </p>
                <br/>
                <p>
                <label for="texte">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" >Entrez les autres détails ici</textarea><br />
                </p>
                <br/>
                <br/>
            </div>
            <input type="submit" value="Envoyer le produit" id="submit" />
        
        </form>
    </div>

    <?php
    include_once 'Controlleur/Controleur.php';
    function afficherProduits(){

        $produits = getProduits();
        
        echo '<table align="center">';
        
        foreach ($produits as $produit) {
        
           echo ' <tr>';
        
            echo '<td><a href="index.php?action=confirmerModifier&PRODUCT_ID=' . $produit['PRODUCT_ID'] .
             '">[modifier]</a> <strong></td>'. '<td><a href="index.php?action=confirmer&PRODUCT_ID=' .
              $produit['PRODUCT_ID'] . ' "\'>[supprimer]</a> <strong></td>' .'<td> Nom du Produit : '. '</strong> ' . '<em>'. $produit['Product_Name'].'</em> </td>' . '<td> Description : <em>' . 
                htmlspecialchars($produit['Product_Description']) . '</em>  </td><td>' . 
                htmlspecialchars($produit['Price']) .'<em> $</em></td>' . 
                '<td> (Autre détails : ' . htmlspecialchars($produit['Other_Details']) . 
                ')</td></th>';
        
              echo '</tr>';
            }
        
        echo '</table>';
        
        }
     afficherProduits();
    ?>
        </body>

    <script type="text/javascript">
   /* function gerer(){
        var bouton = document.getElementById('submit');
        var texte = document.getElementById('nomProd');
        var prix = document.getElementById('prix');

        if(texte.value != '' && prix.value != 0){
            bouton.disabled = false;
        } else {
            bouton.disabled = true;
        }

    }*/
    </script>
    <?php require 'Vue/gabarit.php'; ?>