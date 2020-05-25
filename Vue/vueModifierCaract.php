<?php $titre = 'Modifier une caractéristique'; ?>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>
  <!--  &PRODUCT_ID=<?=$caract['ID_CARACTERISTIQUE']?>-->
    <form action="/TP2_MVC_JeanFrancoisSergerie/Caracteristiques/modifier/<?=$caract['ID_CARACTERISTIQUE']?>" method="post">
        <div class="principal">
			<h2>Modifier une caractéristique V1.0.0</h2>
            <p>
           
                <label for="nomCaract">Nom de caractéristique </label> : <input type="text" name="nomCaract" id="nomCaract" value="<?php echo htmlspecialchars($caract['Nom_Caracteristique']); ?>" /><br />
                <br />
                <label for="descCaract">Détails de la caractéristique</label> :  <textarea type="text" name="descCaract" id="descCaract" ><?php echo htmlspecialchars($caract['Details_Caracteristique']); ?></textarea><br />
				<br />
                <label for="typeCaract">Type de donnée</label> :  <input type="text" name="typeCaract" id="typeCaract" value="<?php echo htmlspecialchars($caract['Type_Donnees_Caracteristique']); ?>"></input><br />
                <br />
                <input type="hidden" name="ID_CARACTERISTIQUE" value="<?php echo $caract['ID_CARACTERISTIQUE']; ?>"/>
                <br />
                <input type="submit" value="Modifier la caractéristique" />
                <br />
                <input type="button" value="Annuler" onclick="history.back();"/>
                
            </p>
            </div>
        </form>
    </body>
