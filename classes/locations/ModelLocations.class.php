<?php
class ModelLocations extends Connection
{
    /** 
     * Cette fonction Permet d'enregistrer 
     * un Locations de la table Locations
     */
    protected function enregistrerLocations($id, $idLocataire, $imm, $dateDebut, $dateFin)
    {
        $sql = "INSERT INTO locations VALUES(NULL, ?, ?, ?, ?)";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $id,
                $idLocataire,
                $imm,
                $dateDebut,
                $dateFin
            ]
        );
    }

    /** 
     * Cette fonction Permet de recuperer toutes 
     * les Locations de la table Locations
     */
    protected function getAllLocations()
    {
        $sql = "SELECT * FROM locations";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    /** 
     * Cette fonction Permet de rechercher et recuperer une Locations  
     */
    protected function researchLocationsById($id)
    {
        $sql = "SELECT * FROM locations WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
        return COUNT($stm->fetchAll()) > 0;
    }

    /** 
     * Cette fonction Permet de supprimer une Locations  
     */
    protected function deleteLocationsById($id)
    {
        $sql = "DELETE locations WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$id]);
    }

    /** 
     * Cette fonction Permet de Modifier un utilisateurs  
     */

    protected function updateLocationsById($id, $idLocataire, $imm, $dateDebut, $dateFin)
    {
        $sql = "UPDATE utilisateurs SET
            idLocataire = ?, 
            imm = ?,
            dateDebut = ?,
            dateFin = ?
        WHERE id = ? ";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute(
            [
                $idLocataire,
                $imm,
                $dateDebut,
                $dateFin,
                $id
            ]
        );
    }
}
