<?php $titre = 'Supprimer une caractéristique'; ?>
    <body>
    <div class="principal">
        <form action="Caracteristiques/supprimer/<?=$caract['ID_CARACTERISTIQUE']?>" method="post">

            <div id="contenuInput">
                <h1>Supprimer une caractéristique v0.1.0</h1>
                <br/>
                <p>
                <label for="nomCaract">Nom de la caractéristique</label> : <input type="text" id="nomCaract" value="<?= $caract['Nom_Caracteristique'] ?>" disabled /><br />
                </p>
                <p>
                <label for="descCaract">Description de la caractéristique</label> :  <input type="text" name="descCaract" id="descCaract" value="<?= $caract['Details_Caracteristique'] ?>$" disabled /><br />
                </p>
                <p>
                <label for="ID_CARACTERISTIQUE">Identifiant de la caractéristique</label> :  <input type="text" id="ID_CARACTERISTIQUE" value="<?= $caract['ID_CARACTERISTIQUE'] ?>" disabled /> <br />
                </p>
                <br/>
            </div>
            <input type="submit" value="Supprimer la caractéristique" id="submit" />
            <br/>
            <input type="button" value="Annuler" onclick="history.back();"/>
        
        </form>
    </div>