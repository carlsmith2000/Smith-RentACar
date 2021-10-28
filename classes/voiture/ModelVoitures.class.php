<?php
class ModelVoitures extends Connection
{
    /** 
     * Cette fonction Permet d'enregistrer 
     * des Voitures dans la table Voitures
     */
    protected function enregistrerVoitures($imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege){
    $sql = "INSERT INTO voitures VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stm = $this->getConnection()->prepare($sql);
    $stm->execute(
        [
            $imm, 
            $marque, 
            $model, 
            $annee, 
            $transmition, 
            $essence, 
            $modeFonct, 
            $prix, 
            $couleur, 
            $vitesse, 
            $disponibilite, 
            $nombrePorte, 
            $nombreSiege, 
        ]
    );
    }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les Voitures de la table Voitures
     */
    protected function getAllVoitures()
    {
        $sql = "SELECT * FROM voitures";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer une Voitures a l'aide de son id
     */
    protected function researchVoituresById($id)
    {
        $sql = "SELECT * FROM voitures WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetch();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer les Voitures
     * de meme marque.
     */
    protected function researchVoituresByMarque($marque)
    {
        $sql = "SELECT * FROM voitures WHERE marque = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$marque]);
        return $stm->fetchAll();
    }

     /** 
     * Cette fonction Permet de rechercher et recuperer les Voitures
     * de meme Model.
     */
    protected function researchVoituresByModel($model)
    {
        $sql = "SELECT * FROM voitures WHERE model = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$model]);
        return COUNT($stm->fetchAll()) > 0;
    }



    /** 
     * Cette fonction Permet de supprimer une Voitures  
     */
    protected function deleteVoituresById($id)
    {
        $sql = "DELETE voitures WHERE imm = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier une Voiture  
     */

    protected function updateVoituresById($id, $imm, $marque, $model, $annee, $transmition, $essence, $modeFonct, $prix, $couleur, $vitesse, $disponibilite, $nombrePorte, $nombreSiege)
    {
        $sql = "UPDATE voitures SET
            imm = ? 
            marque = ?, 
            model = ?, 
            annee = ?, 
            transmition = ?, 
            essence = ?,
            modeFonct = ?, 
            prix = ?, 
            couleur = ?, 
            vitesse = ?, 
            disponibilite = ?, 
            nombrePorte = ?, 
            nombreSiege = ?, 
        WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $imm, 
                $marque, 
                $model, 
                $annee, 
                $transmition, 
                $essence, 
                $modeFonct, 
                $prix, 
                $couleur, 
                $vitesse, 
                $disponibilite, 
                $nombrePorte, 
                $nombreSiege, 
                $id
            ]
        );
    }
}
