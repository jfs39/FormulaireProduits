
    <div class="principal">
            <form action="Caracteristiques/Ajouter/" method="post">
                <div id="contenuInput">
                    <h1>Ajouter une caractéristique v0.1.0</h1>
                    <br/>
                    <p>
                    <label for="nomCaract">Nom de caractéristique</label> : <input type="text" name="nomCaract" id="nomCaract"/><br />
                    <?= ($erreur == 'nom') ? '<span style="color : red;">Entrez un nom de caractéristique valide s.v.p.</span>' : '' ?>
                    </p>
                    <br/>
                    <p>
                    <label for="descCaract">Description de la caractéristique</label> :  <textarea type="text" name="descCaract" id="descCaract" >Entrez la description du produit ici</textarea><br />
                    </p>
                    <br/>
                    <p>
                    <label for="typeCaract">Type de caractéristique</label> :  <input type="text" name="typeCaract" id="typeCaract" /><br />
                    </p>
                    <br/>

                </div>
                <input type="submit" value="Soumettre la caractéristique" id="submit" />
            
                <br/>
                <br/>

                
            </form>

            <a href="Caracteristiques/index"><button>Retour à l'accueil</button></a>
            <br/>
            <br/>
            <?= ($erreur == 'succes') ? '<span style="color : green;">Votre caractéristique a été généré avec succès</span>' : '' ?>
        </div>