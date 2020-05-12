<body>
    <div class="principal">
            <form action="index.php?action=ajouter" method="post">
                <div id="contenuInput">
                    <h1>Ajouter un produit v0.1.0</h1>
                    <br/>
                    <p>
                    <label for="nomProd">Nom du produit</label> : <input type="text" name="nomProd" id="nomProd"/><br />
                    <?= ($erreur == 'nom') ? '<span style="color : red;">Entrez un nom de produit valide s.v.p.</span>' : '' ?>
                    </p>
                    <br/>
                    <p>
                    <label for="texte">Description du produit</label> :  <textarea type="text" name="texteDesc" id="texteDesc" >Entrez la description du produit ici</textarea><br />
                    </p>
                    <br/>
                    <p>
                    <label for="prix">Prix du produit</label> :  <input type="number" name="prix" id="prix" /><br />
                    </p>
                    <br/>
                    <p>
                    <label for="texte">Autres détails</label> :  <textarea type="text" name="texteDet" id="texteDet" >Entrez les autres détails ici</textarea><br />
                    </p>
                    <br/>
                    <br/>
                </div>
                <input type="submit" value="Envoyer le produit" id="submit" />
            
                <br/>
                
            </form>

            <a href="index.php"><button>Retour à l'accueil</button></a>
        </div>