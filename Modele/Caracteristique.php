<?php
require_once 'Framework/Modele.php';

class Caracteristique extends Modele{

    public function getCaracts() {

        $sql = 'SELECT * FROM caracteristiques';
        $produits = $this->executerRequete($sql);
        return $produits;
    }

    public function getCaract($id) {
        $sql = 'select * from caracteristiques'
        . ' where ID_CARACTERISTIQUE=?';
        $caract = $this->executerRequete($sql,array($id));
        if ($caract->rowCount() == 1)
            return $caract->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune caractéristique ne correspond à l'identifiant '$id'");
    }

    public function ajoutCaracteristique($nomProd,$texteDesc,$prix){

        $sql = 'INSERT INTO caracteristiques(Nom_Caracteristique, Details_Caracteristique, Type_Donnees_Caracteristique) VALUES( ?, ?, ?);';
        $caract = $this->executerRequete($sql,array($nomProd, $texteDesc, $prix));
    }

    //Méthode pour modifier une caracteristique de ma BDD
    public function modifierCaracteristique($id, $nomCaract, $descCaract, $typeCaract) {

        $sql='UPDATE caracteristiques SET Nom_Caracteristique = ?, Details_Caracteristique = ?, Type_Donnees_Caracteristique = ? WHERE ID_CARACTERISTIQUE = ?';
        $caract = $this->executerRequete($sql,array( $nomCaract, $descCaract, $typeCaract ,$id));
    }

    //Méthode pour enlever une caractéristique de ma BDD
    public function deleteCaracteristique($id) {
        $sql= 'DELETE FROM caracteristiques WHERE ID_CARACTERISTIQUE = ?';
        $result = $this->executerRequete($sql,array($id));
        
    }

    public function getNombreCaracteristiques(){
        $sql = 'SELECT count(*) as nbCaracts FROM caracteristiques';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbCaracts'];
    }


}