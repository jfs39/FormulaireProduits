<?php $titre = 'Insertion de produits'; ?>
    
    <div id="contenuInput">
        <h1>Gestion de produits v1.1.0</h1>
        <br/>
        <a href="Produit/AjoutDeProduit/"><button>Ajoutez un produit à la liste</button></a>
        <a href="Connexion/index/"><button>Se connecter</button></a>

    </div>

    <table align="center">

    <?php foreach ($produits as $produit):?> 
        
         <tr>
        
            <strong> <td> Nom du Produit : </strong> <em> <?= $this->nettoyer($produit['Product_Name'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($produit['Product_Description']) ?> </em>  </td>
            <td> <?= $this->nettoyer(($produit['Price'])) ?><em> $</em></td> 
            <td> (Autre détails :  <?= $this->nettoyer(($produit['Other_Details'])) ?>)</td></th>
            <td> (Créé par :  <?= $this->nettoyer(($produit['nom'])) ?>)</td></th>

        </tr>
        
    <?php endforeach; ?>
    
    </table>

    <table align="center">

    <?php foreach ($caracteristiques as $caract):?> 
        
         <tr>
        
            <strong> <td> Nom de la caractéristique : </strong> <em> <?= $this->nettoyer($caract['Nom_Caracteristique'])?> </em> </td>
            <td> Description : <em> <?= $this->nettoyer($caract['Details_Caracteristique']) ?> </em>  </td>
            <td> Type de données : <em> <?= $this->nettoyer(($caract['Type_Donnees_Caracteristique'])) ?></em></td> 

        </tr>
        
    <?php endforeach; ?>
    
    </table>
        
    <br/>
    <br/>
    <p><a href="Tests.php">Tests de produits</a></p>
